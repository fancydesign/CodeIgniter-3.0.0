<?php

class M_reg extends CI_Model {
function __construct(){
parent::__construct();
$this->load->database();
}
public function set_Admin()
{
// $this->load->helper('url');

//$slug = url_title($this->input->post('title'), 'dash', TRUE);

$data = array(
    'user_name' => $this->input->post('user_name'),
    'user_pass' => $this->input->post('user_pass'),
    'email' => $this->input->post('email'),

);

return $this->db->insert('gs_users', $data);
}

}
?>









