<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('user','',True);
    }

    function index()
    {
    }

    function addBooks(){
        $data = $this->input->post();
        $this->user->addBooks($data);
    }
    function deleteBooks(){
        $data = $this->input->post();
        $this->user->deleteBooks($data);
    }
    function updateBooks(){
        $data = $this->input->post();
        $this->user->updateBooks($data);
    }


}

?>


