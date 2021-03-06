<div id="AdminMenu">
    <ul>
        <li class="caption first">个人信息管理		
            <ol>
                <li class="inbox outbox"><a href="admin/inbox">站内留言(0/1)</a></li>
                <li class="profile"><a href="admin/profile">编辑个人资料</a></li>
                <li class="change_pwd"><a href="user/change_pwd">修改登录密码</a></li>
                <li class="user_settings"><a href="admin/user_settings">网页个性设置</a></li>
            </ol>
        </li>		
    </ul>
    <ul>
        <li class="caption second">博客管理	
            <ol>
                <li class="new_blog"><a href="admin/new_blog">发表博客</a></li>
                <li class="blog_catalogs"><a href="admin/blog_catalogs/<?php echo $user->user_id?>">博客设置/分类管理</a></li>
                <li class="blogs"><a href="admin/blogs">文章管理</a></li>
                <li class="blog_comments"><a href="comment/blog_comments/<?php echo $user->user_id?>">博客评论管理</a></li>
            </ol>
        </li>
    </ul>
</div>

<script src="js/jquery-3.2.1.js"></script>
<script>
$(function(){
    var arr = location.href.split('/');
    var str = arr.pop();
	$("." + str).addClass('current');
    if(arr.length > 3){
	    $("." + arr.pop()).addClass('current');        
    }
});
</script>