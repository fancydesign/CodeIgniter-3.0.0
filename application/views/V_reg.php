<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head><title>注册界面</title></head>
<body>
<form method="post" accept-charset="utf-8" action="reg"/>

<label for="user_name">用户名：</label>

<!--<input type="input" name="user_name" />-->

<input type="input" name="user_name" value="<?php echo set_value('user_name'); ?>"/>
<div><?php echo form_error('user_name'); ?></div><br />

<label for="user_pass">设置密码</label>


<input type="password" name="user_pass" value="<?php echo set_value('user_pass'); ?>"/>
<div><?php echo form_error('user_pass'); ?></div><br />



<label for="user_pass2">重复密码</label>
<input type="password" name="user_pass2" /><br />


<label for="email">电子邮箱</label>
<input type="input" name="email" /><br />



<input type="submit" name="submit" value="提交" />

</form>
</body>
</html>