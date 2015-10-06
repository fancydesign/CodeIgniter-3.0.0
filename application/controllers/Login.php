<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("test");
        $this->load->database();
    }



    public function index()
    {
        $this->load->view('login');
    }

    public function checklogin(){

//        $user = $this->test->user_select($_POST['uname']);
        $a=$_POST['uname'];
        echo $a;
        $user = $this->db->query("SELECT * FROM gs_users WHERE user_name = '$a'");


        if ($user->num_rows() > 0)
        {
            foreach ($user->result() as $row)
            {
                echo $row->user_name;
//                echo $row->name;
//                echo $row->body;
            }
        }



        if($user){
            if($row->user_pass == $_POST['upass']){
                echo '密码正确！';
                $this->load->library('session');
                $arr = array("uid" => $row->uid);
                $this->session->set_userdata($arr);
                echo "<br />";
                echo $this->session->userdata('uid');
            }
            else{
                echo '密码不正确！';
            }
        }
        else{
            echo '用户名不存在';
        }
    }

    public function checksession(){
        $this->load->library('session');
        if($this->session->userdata('uid')){
            echo '已经登录。';
        }
        else{
            echo '没有登录。';
        }
    }

    public function loginout(){
        $this->load->library('session');
        $this->session->unset_userdata('uid');
    }
}