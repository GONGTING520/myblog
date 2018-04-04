<?php include 'load_session.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title><?php echo $user->username?>的博客 - 个人博客</title>
  <base href="<?php echo site_url()?>">
  <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
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
        <a href="welcome/logined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">管理首页</span>
    </div>
    <?php include 'admin_memu.php'?>
    <div id="AdminContent"><div class="MainForm">
<form id="style_form" action="" method="POST">
<h2 class="title">网页个性化设置</h2>
<table>
	<tbody>
		<tr>
		<th>我的心情</th>		
		<td>
			<input name="signature" size="40" maxlength="40" class="TEXT" value="<?php echo $user->signature==''?'今天心情很好！':$user->signature?>" type="text">
		</td>
	</tr>
	<tr><th></th><td></td></tr>
	<tr class="submit">
		<th></th>	
		<td>
		<input value="保存修改" id="sub" class="BUTTON SUBMIT" type="button">		
		<span id="error_msg" style="display:none"></span>
		</td>
	</tr>
</tbody></table>
</form>
</div>
</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer"></div>
</div>

<script>
	$(function(){
		$('#sub').on('click', function(){
			$.post('user/update_signature', {
				signature : $('input[name=signature]').val(),
				user_id : <?php echo $user->user_id?>
			}, function(res){
				if(res == "success"){
					alert('修改成功！');
				}else{
					alert('修改失败！');					
				}
			}, 'text');
		});
	});
</script>
</body></html>