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
		#OSC_Screen .page a{
			margin: 0 10px;
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
        <a href="welcome/logined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">管理首页</span>
    </div>
    
		<?php include 'admin_memu.php'?>
    <div id="AdminContent">
<div class="MainForm BlogCommentManage">
  <h3>共有 <?php echo $count?> 篇博客评论，每页显示 3 个，共 <?php echo ceil($count/3)?> 页</h3>
  <ul>
		<?php foreach($comments as $comment){?>
			<li id="cmt_24027_154693_261665734" class="row_1">
				<span class="portrait"><a href="#" target="_blank"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
				<span class="comment">
				<div class="user"><b><?php echo $comment->username?></b> 评论了 <a href="admin/blog_detail?blogId=<?php echo $comment->blog_id?>" target="_blank"><?php echo $comment->title?></a></div>
				<div class="content"><p><?php echo $comment->content?></p></div>
				<div class="opts">
					<span style="float:right;">
					<a class="delete_one" href="comment/delete_comment?commentId=<?php echo $comment->comment_id?>">删除</a> |
					<a class="delete_all" href="comment/delete_one_all_comments">删除此人所有评论</a>
					</span>			
					<?php $comment->post_time?>
				</div>
				</span>
				<div class="clear"></div>
			</li>
		<?php }?>
	</ul>
	<?php echo $link?>
</div>

</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer"></div>
</div>

<script>
	$('.delete_one').on('click', function(){
		if(confirm("您确认要删除此篇评论？")){
			$.get(this.href, {}, function(res){
				if(res == 'success'){
					alert('删除成功！');
					location.href = location.href;
				}else{
					alert('删除失败！');
				}
			}, 'text');
		}
		return false;
	});
	// function delete_c_by_user(uid){
	// 	if(confirm("您确认要删除此人发表的所有评论？")){
	// 		var args = "user="+uid;
	// 		ajax_post("/action/blog/delete_blog_comments_by_user?space=154693",args,function(){location.reload();});
	// 	}
	// }
</script>
</body></html>