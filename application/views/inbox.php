<?php include 'load_session.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>我的留言箱 <?php echo $user->username;?>的博客 - 个人博客</title>
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
    	<span id="AdminTitle">我的留言箱</span>
    </div>
    <?php include 'admin_memu.php'?>
    <div id="AdminContent">
<ul class="tabnav"> 
	<li class="tab1 current"><a href="admin/inbox">所有留言<em>(<?php echo count($comments)?>)</em></a></li> 
	<li class="tab4"><a href="admin/outbox">已发送留言<em>(<?php echo $send_num?>)</em></a></li>
    </ul>
<div class="MsgList">
<ul>
	<?php foreach($comments as $comment){?>
    <li id="msg_186720">
			<span class="sender"><a href="#"><img src="images/12_50.jpg" alt="红薯" title="红薯" class="SmallPortrait" user="12" align="absmiddle"></a></span>
			<span class="msg">
				<div class="outline">
				<a href="#" target="user"><?php echo $comment->username?></a>
				发送于 (<?php echo $comment->post_time?>)				
				&nbsp;&nbsp;<a href="javascript:delete_in_msg(186720)">删除</a>
				</div>
				<div class="content">
					<div class="c"><?php echo $comment->content?></div></div>
				<div class="opts">
					<a href="javascript:sendmsg(12,186720)">回复留言</a>
				</div>
			</span>
			<div class="clear"></div>
		</li>
	<?php }?>
  </ul>
</div>
</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer"></div>
</div>

</body></html>