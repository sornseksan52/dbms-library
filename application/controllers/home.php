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
        $data['username'] = $username;
        $data['query'] = $this->user->Listbooks($username);
        $this->load->view('books_view',$data);
    }

    function searchBooks(){
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $this->load->view('search_books',$data);
    }

    function queryResult(){
        //$criteria = $this->input->post('criteria');
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $data['username'] = $username;
        $criteria = 'bookname';
        $query = $this->input->post('search');
        $data['query'] = $this->user->queryBooks($criteria,$query);
        $this->load->view('query_books',$data);

    }



    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

}

?>

