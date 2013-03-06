<?php
class library extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $this->load->view('table');
    }
}
?>
