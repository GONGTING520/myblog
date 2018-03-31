<?php include 'load_session.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>博客设置/分类管理 <?php echo $user->username?>的博客 - 个人博客</title>
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
        <a href="index_logined.htm">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle"d>博客设置/分类管理</span>
    </div>
	<?php include 'admin_memu.php'?>
    <div id="AdminContent">
<div class="MainForm BlogCatalogManage">
<form id="CatalogForm" action="" method="post">
    <h3> 添加博客分类 </h3>
    <div id="error_msg" class="error_msg" style="display:none;"></div>
    <label>分类名称:</label><input id="txt_link_name" name="name" size="15" tabindex="1" type="text">
    <label>排序值:</label><input id="order_num" name="sort_order" value="0" size="3" type="text">
    <span class="submit">
        <input value="添加&nbsp;»" tabindex="3" id="sub" class="BUTTON SUBMIT" type="button">
    </span>
</form>
<form class="BlogCatalogs">
<h3>博客分类 <span>(点击分类名编辑)</span></h3>
<table cellpadding="1" cellspacing="1">
	<tbody><tr>
		<th>序号</th>
		<th>分类名</th>
		<th>文章</th>
		<th>操作</th>
	</tr>
	<?php foreach($blog_types as $key=>$blog_type){?>
		<tr id="catalog_92334">
			<td class="idx"><?php echo $key+1?></td>
			<td class="name"><a href="editCatalog.htm" title="点击修改博客分类"><?php echo $blog_type->type_name?></a></td>
			<td class="num"><?php echo $blog_type->num?></td>
			<td class="opts">
				<a href="editCatalog.htm" title="点击修改博客分类">修改</a>
				<a href="admin/delete_blog_type/<?php echo $blog_type->type_id?>">删除</a>
			</td>
		</tr>
	<?php }?>
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
		$("#sub").on('click', function(){
			$.post("admin/save_blog_catalogs", {
				"type_name": $("#txt_link_name").val(),
				"user_id": <?php echo $user->user_id?>,
				"order_num": $("#order_num").val(),
			}, function(res){
				if(res == "success"){
					alert("添加成功！");
					location.href = "admin/blog_catalogs/<?php echo $user->user_id?>";
				}else{
					alert("添加失败！");
				}
			});
		});
	});
</script>
</body></html>