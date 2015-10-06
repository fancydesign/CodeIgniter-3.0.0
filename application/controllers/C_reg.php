<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_reg extends CI_Controller{

public function __construct()
{
parent::__construct();
$this->load->model('M_reg');
}


public function reg(){
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation');

    //$data['title'] = '注册';

    $this->form_validation->set_rules('user_name', 'Username', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('user_pass', 'Password', 'required|matches[user_pass2]');
    $this->form_validation->set_rules('user_pass2', 'Confirmation', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');



    if ($this->form_validation->run() == FALSE) {

        $this->load->view('V_reg');



    } else {
            $this->M_reg->set_Admin();
    }
    }

}
?>
