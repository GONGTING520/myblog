<?php include 'load_session.php'?>

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
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="adminIndex.htm"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $user->username;?>的博客</strong>
		<div><a href="index_logined.htm">TA的博客列表</a>&nbsp;|
			<a href="sendMsg.htm">发送留言</a>&nbsp;|
			<a href="admin/index">个人管理</a></div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
<ul>
	<?php foreach($blogs as $blog){?>
		<li class="Blog" id="blog_24027">
			<h2 class="BlogAccess_true BlogTop_0"><a href="viewPost_comment.htm"><?php echo $blog->title?></a></h2>
			<div class="outline">
				<span class="time">发表于 <?php echo $blog->post_time?></span>
				<span class="catalog">分类: <a href="#"><?php echo $blog->type_name?></a></span>
				<span class="stat">统计: 1评/4阅</span>
				<span class="blog_admin">( <a href="newBlog.htm">修改</a> | <a class="delete_blogs" href="admin/delete_blog/<?php echo $blog->blog_id?>">删除</a> )</span>	  
			</div>
			<div class="TextContent" id="blog_content_24027">
				<?php echo $blog->content?>
				<div class="fullcontent"><a href="viewPost_comment.htm">阅读全文...</a></div>
			</div>
		</li>
	<?php }?>
</ul>
<div class="clear"></div>
	</div>
<div class="BlogMenu"><div class="admin SpaceModule">
  <strong>博客管理</strong>
  <ul class="LinkLine">
	<li><a href="newBlog.htm">发表博客</a></li>
			<li><a href="blogCatalogs.htm">博客分类管理</a></li>
	<li><a href="blogs.htm">文章管理</a></li>
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
</div>
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
  </div></div>
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
	$('.delete_blogs').on('click', function(){
		if(confirm("确认删除此条博客吗?")){
			$.post(this.href, {}, function(res){
				if(res == "success"){
					alert("删除成功！");
					location.href = 'welcome/logined';
				}else{
					alert("删除失败！");
				}
			});
		}
		return false;
	});
</script>
</body></html>