<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.&nbsp; User redirected to login page
            $this->load->view('login_view');
        }
        else
        {
            //Go to private area
            redirect('home', 'refresh');
        }

    }

    function check_database($password)
    {
        //Field validation succeeded.&nbsp; Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password,'users');
        $manager = False;

        if($result)
        {
            $power = $this->user->login($username,$password,'managers');
            if($power){
                $manager = True;
            }
            $sess_array = array();
            foreach($result as $row)
            {
                if($manager == True){
                    $sess_array = array(
                        'username' => $row->username,
                        'manager' => True
                    );
                }else{
                    $sess_array = array(
                        'username' => $row->username,
                        'manager' => False
                    );
                }
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', '錯誤的使用者名稱或密碼');
            return false;
        }
    }
}
?>
