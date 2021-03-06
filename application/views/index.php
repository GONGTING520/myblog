<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>个人博客</title>
	<base href="<?php echo site_url()?>">
  <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
		body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
		#OSC_Screen .page a{
			margin: 0 10px;
		}
		.TextContent{
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
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
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon">All Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
				游客 [ <a href="welcome/login">登录</a> | <a href="welcome/regist">注册</a> ]
  </div>
		<div id="SearchBar">
    		<form action="Search">
					<input name="user" value="154693" type="hidden">
					<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
					<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
	<div class="clear"></div>
<div class="BlogList">
<ul>
	<?php foreach($blogs as $blog){?>
  <li class='Blog' id='blog_24027'>
	<h2 class='BlogAccess_true BlogTop_0'><a href="welcome/blog_detail?blogId=<?php echo $blog->blog_id?>&userId=<?php echo $blog->user_id?>"><?php echo $blog->title?> --<?php echo $blog->username?></a></h2>
	<div class='outline'>
	  <span class='time'>发表于 <?php echo $blog->post_time?></span>
	  <span class='catalog'>分类: <a href="?catalog=92334"><?php $blog->type_name?></a></span>
	  <span class='stat'>统计: 0评/0阅</span>
	</div>
	<div class='TextContent' id='blog_content_24027'>
		<?php echo $blog->content?>
		<div class='fullcontent'>
			<a href="welcome/blog_detail?blogId=<?php echo $blog->blog_id?>&userId=<?php echo $blog->user_id?>">阅读全文...</a>
		</div>
	</div>
	</li>
	<?php }?>
</ul>
<?php echo $link?>
<div class="clear"></div>
	</div>
</body></html>