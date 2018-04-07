<?php //if(!$user){redirect('welcome/index');}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title><?php echo $user->username;?>的博客 - 个人博客</title>
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
<div id="OSC_Screen">
		<!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon">All Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem -->
<div id="OSC_Topbar">
    <div id="VisitorInfo">
    当前访客身份：
    游客 [ <a href="welcome/login">登录</a> | <a href="welcome/regist">注册</a> ]
	</div>
	<div id="SearchBar">
    <form action="#">
        <input name="user" value="154693" type="hidden">																	<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
        <input class="SUBMIT" value="搜索" type="submit">
    </form>
</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="adminIndex.htm"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $user->username;?>的博客</strong>
		<div>
			<a href="welcome/blogs/<?php echo $user->user_id?>">TA的博客列表</a>&nbsp;|
			<a href="#" class="send_msg">发送留言</a>&nbsp;|
			<a href="welcome/index">返回所有博客列表</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
<ul>
	<?php foreach($blogs as $blog){?>
		<li class="Blog" id="blog_24027">
			<h2 class="BlogAccess_true BlogTop_0"><a href="welcome/blog_detail?blogId=<?php echo $blog->blog_id?>&userId=<?php echo $user->user_id?>"><?php echo $blog->title?></a></h2>
			<div class="outline">
				<span class="time">发表于 <?php echo $blog->post_time?></span>
				<span class="catalog">分类: <a href="#"><?php echo $blog->type_name?></a></span>
				<span class="stat">统计: 1评/4阅</span>
			</div>
			<div class="TextContent" id="blog_content_24027">
				<?php echo $blog->content?>
				<div class="fullcontent"><a href="welcome/blog_detail?blogId=<?php echo $blog->blog_id?>&userId=<?php echo $user->user_id?>">阅读全文...</a></div>
			</div>
		</li>
	<?php }?>
</ul>
<?php echo $link?>
<div class="clear"></div>
	</div>
<div class="BlogMenu">
	<!-- <div class="admin SpaceModule">
		<strong>博客管理</strong>
		<ul class="LinkLine">
		<li><a href="admin/new_blog">发表博客</a></li>
				<li><a href="">博客分类管理</a></li>
		<li><a href="admin/blogs">文章管理</a></li>
		<li><a href="blogComments.htm">网友评论管理</a></li>
		</ul>
	</div>
	<div class="catalogs SpaceModule">
		<strong>博客分类</strong>
		<ul class="LinkLine">
				<li><a href="#">工作日志(3)</a></li>
			<li><a href="#">日常记录(0)</a></li>
			<li><a href="#">转贴的文章(0)</a></li>
			</ul>
	</div> -->
	<div class="comments SpaceModule">
		<strong>最新网友评论</strong>
				<ul>
			<li>
			<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
			<span class="c">hoho
				<span class="t">发布于 11分钟前 <a href="viewPost_comment.htm">查看»</a></span>
			</span>
			<div class="clear"></div>
		</li>
			<li>
			<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
			<span class="c">测试评论111
				<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
			</span>
			<div class="clear"></div>
		</li>
			<li>
			<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
			<span class="c">测试评论
				<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
			</span>
			<div class="clear"></div>
		</li>
			</ul>
		</div>
</div>
<div class="clear"></div>
<script type="text/javascript" src="js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">

</div>
	<div class="clear"></div>
</div>
</div>

<script src="js/jquery-3.2.1.js"></script>
<script>
	$('.send_msg').on('click', function(){
		alert('请先登陆！');
		location.href = 'welcome/login';
		return false;
	});
</script>
</body></html>