/**
     * 添加用户session数据,设置用户在线状态
     * @param string $username
     */
    function login($username)
    {
        $data = array('username'=>$username, 'logged_in'=>TRUE);
        $this->session->set_userdata($data);                    //添加session数据
        }
    /**
     * 通过用户名获得用户记录
     * @param string $username
     */
    function get_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        //return $query->row();                            //不判断获得什么直接返回
        if ($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * 用户名不存在时,返回false
     * 用户名存在时，验证密码是否正确
     */
    function password_check($username, $password)
    {                
        if($user = $this->get_by_username($username))
        {
            return $user->password == $password ? TRUE : FALSE;
        }
        return FALSE;                                    //当用户名不存在时
    }