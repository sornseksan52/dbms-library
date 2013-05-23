<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('user','',True);
    }

    function index()
    {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('authorization_view', $data);
        }else{
            $this->load->view('login_view');
            //redirect('login', 'refresh');
        }
    }
    function register()
    {
        $this->load->view('signin');
    }

    function successRegister(){
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirm', 'required');
         $this->form_validation->set_message('matches', '密碼不一致');
         $this->form_validation->set_message('required', '%s欄位不得為空');
         $this->form_validation->set_message('valid_email', '無效的電子郵件地址');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('signin');
		}
		else
		{
            $data = $this->input->post();
            $this->user->adduser($data['username'],$data['password'],$data['email']);

            $this->session->set_userdata('logged_in',array('username' =>$data['username'],'manager' =>False));
            redirect('home', 'refresh');
		}
    }
    function username_check($username){
       //Field validation succeeded.&nbsp; Validate against database
       //$username = $this->input->post('username');

       //query the database
       $result = $this->user->register($username);
       if($result)
       {
         $this->form_validation->set_message('username_check', '已經存在的使用者名稱');
         return FALSE;
       }
       else
       {
           return True;
       }

    }

}

?>

