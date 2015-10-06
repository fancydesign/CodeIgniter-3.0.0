<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head><title>denglu界面</title></head>
<body>
<form method="post" accept-charset="utf-8" action="login/checklogin"/>

<label for="uname">用户名：</label>

<input type="input" name="uname" /><br />

<label for="upass">设置密码</label>

<input type="password" name="upass" /><br />


<input type="submit" name="submit" value="提交" />

</form>
</body>
</html>