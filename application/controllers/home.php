<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //load model/user.php
        $this->load->helper(array('form'));
        $this->load->model('user','',TRUE);
    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['manager'] = $session_data['manager'];
            $this->load->view('authorization_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function Listbooks(){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $manager = $session_data['manager'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $data['query'] = $this->user->Listbooks($username);
        $this->load->view('books_view',$data);
    }

    function searchBooks(){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $manager = $session_data['manager'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $data['query'] = $this->user->queryBooks('','');
        $borrowed_result = $this->user->Listbooks($username);
        $i = 0;
        $borrowed_number = array();
        if(is_array($borrowed_result)){
            foreach($borrowed_result as $row){
                $borrowed_number[$i] = $row->number;
                $i++;
            }
        }
        $data['borrowed'] = $borrowed_number;
        $this->load->view('search_books',$data);
    }

    function returnBooks(){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $booknumbers = $this->input->post('borrow_books');
        $this->user->returnBooks($booknumbers);
        $this->Listbooks();

    }

    function queryResult($delete = "default"){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $post = $this->input->post();
        $data['query'] = $this->user->queryBooks($post['criteria'],$post['search']);
        if($delete ==  'delete'){
            $i = 0;
            $borrowed_number = array();
            $borrowed_result = $this->user->NonAvailableBooks();
            if(is_array($borrowed_result)){
                foreach($borrowed_result as $row){
                    $borrowed_number[$i] = $row->number;
                    $i++;
                }
            }
            $data['nonava'] = $borrowed_number;
            $this->load->view('delete_books',$data);
        }
        elseif($delete == 'update'){
            $this->load->view('update_books',$data);
        }
        else{
            //$this->load->view('search_books',$data);
            $borrowed_result = $this->user->Listbooks($username);
            $i = 0;
            $borrowed_number = array();
            if(is_array($borrowed_result)){
                foreach($borrowed_result as $row){
                    $borrowed_number[$i] = $row->number;
                    $i++;
                }
            }
            $data['borrowed'] = $borrowed_number;
            $this->load->view('search_books',$data);
        }

    }

    function borrowBooks(){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $booknumbers = $this->input->post('borrow_books');
        $this->user->borrowBooks($username,$booknumbers);
        //$this->load->view('test',$data);
        $this->searchBooks();
    }

    function manager($action){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        if($action == 'add'){
            $this->load->view('add_books',$data);
        }
        elseif($action == 'update'){
            $data['query'] = $this->user->queryBooks('','');
            $this->load->view('update_books',$data);
        }elseif($action == 'delete'){
            $data['query'] = $this->user->queryBooks('','');
            $i = 0;
            $borrowed_number = array();
            $borrowed_result = $this->user->NonAvailableBooks();
            if(is_array($borrowed_result)){
                foreach($borrowed_result as $row){
                    $borrowed_number[$i] = $row->number;
                    $i++;
                }
            }
            $data['nonava'] = $borrowed_number;
            $this->load->view('delete_books',$data);
        }
    }

    function leaveMessage($action = 'show'){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $data['manager'] = $session_data['manager'];
        $update = False;
        if($action == 'message'){
            $content = $this->input->post('message');
            if(trim($content," \t\n") != ""){
                $this->user->leaveMessage($username,$content);
                $update = True;
            }
        }
        $data['messages'] = $this->user->listMessage();
        $this->load->view('guestbooks',$data);

    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

}

?>

