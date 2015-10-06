/**
     * 接收、验证登录表单
     * 表单规则在配置文件:/config/form_validation.php
        'account/login'=>array(                        //登录表单的规则
            array(
                'field'=>'username',
                'label'=>'用户名',
                'rules'=>'trim|required|xss_clean|callback_username_check'
            ),
            array(
                'field'=>'password',
                'label'=>'密码',
                'rules'=>'trim|required|xss_clean|callback_password_check'
            )
        )
     * 错误提示信息在文件：/system/language/english/form_validation.php
     */
    function login()
    {
        //设置错误定界符
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        $this->_username = $this->input->post('username');                //用户名
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('account/login');
        }
        else 
        {
            //注册session,设定登录状态
            $this->MAccount->login($this->_username);
            $data['message'] = $this->session->userdata('username').' You are logged in! Now take a look at the '
                                .anchor('account/dashboard', 'Dashboard');
            $this->load->view('account/note', $data);
        }
        }

//登录表单验证时自定义的函数
/**
     * 提示用户名是不存在的登录
     * @param string $username
     * @return bool 
     */
    function username_check($username)
    {
        if ($this->MAccount->get_by_username($username))
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('username_check', '用户名不存在');
            return FALSE;
        }
    }
    /**
     * 检查用户的密码正确性
     */
    function password_check($password)
    {
        $password = md5($this->salt.$password);
        if ($this->MAccount->password_check($this->_username, $password))
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('password_check', '用户名或密码不正确');
            return FALSE;
        }
    }