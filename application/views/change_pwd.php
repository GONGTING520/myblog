<?php include 'load_session.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>修改登录密码 <?php echo $user->username?>的博客 - 个人博客</title>
  <base href="<?php echo site_url()?>">
  <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
	#error_msg{
		color: red;
	}
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen">
	<?php include 'admin_header.php'?>
	<div class="clear"></div>
</div>
<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="index_logined.htm">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">修改登录密码</span>
    </div>
    <?php include 'admin_memu.php'?>
    <div id="AdminContent">

<div class="MainForm">
<form class="AutoCommitJSONForm" action="" method="POST">
<h2>修改我的登录密码</h2>
<table width="100%">
	<tbody><tr>
		<th width="110">旧的登录密码</th>		
		<td>
			<input name="pwd" class="pwd" size="20" class="TEXT" tabindex="1" type="password">&nbsp;&nbsp;&nbsp;&nbsp;		
			<a href="#" target="_blank">忘记登录密码</a>
		</td>    		
	</tr>
	<tr>
		<th>新密码</th>		
		<td><input name="newpwd" class="new_pwd" size="20" class="TEXT" tabindex="2" type="password"></td>    		
	</tr>
	<tr>
		<th>再次输入新密码</th>		
		<td>
			<input name="newpwd2" class="new_pwd2" size="20" class="TEXT" tabindex="3" type="password">
			<span id="error_msg" style="display:none">两次密码不一致</span>
		</td>    		
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="修改密码" class="BUTTON SUBMIT" tabindex="4" type="button" id="sub">
		
		</td>
	</tr>
</tbody></table>
</form>
</div></div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer"></div>
</div>

<script>
$(function(){
	var bFlag=false;

	$('.new_pwd2').on('keyup', function(){
		if($(this).val()!=$('.new_pwd').val()){
			$("#error_msg").show('fast');
			bFlag = false;			
		}else{
			$("#error_msg").hide('fast');
			bFlag = true;
		}
	});
	$('#sub').on('click', function(){
		if(bFlag){
			$.post('user/update_pwd', {
				"user_id": <?php echo $user->user_id?>,
				"pwd": $('.new_pwd').val(),
				"old_pwd": $('.pwd').val()
			}, function(res){
				if(res == 'success'){
					alert('修改密码成功！');
				}else if(res == 'fail'){
					alert('修改密码失败！');					
				}else if(res =='old_pwd_error'){
					alert('旧密码输入错误！');
				}
			}, 'text');
		}
	});
});
</script>
</body></html>