<div id="AdminMenu">
    <ul>
        <li class="caption first">个人信息管理		
            <ol>
                <li class="inbox"><a href="admin/inbox">站内留言(0/1)</a></li>
                <li class="profile"><a href="admin/profile">编辑个人资料</a></li>
                <li class=""><a href="chpwd.htm">修改登录密码</a></li>
                <li class=""><a href="userSettings.htm">网页个性设置</a></li>
            </ol>
        </li>		
    </ul>
    <ul>
        <li class="caption second">博客管理	
            <ol>
                <li class="new_blog"><a href="admin/new_blog">发表博客</a></li>
                <li class=""><a href="blogCatalogs.htm">博客设置/分类管理</a></li>
                <li class="blogs"><a href="admin/blogs">文章管理</a></li>
                <li class=""><a href="blogComments.htm">博客评论管理</a></li>
            </ol>
        </li>
    </ul>
</div>

<script src="js/jquery-3.2.1.js"></script>
<script>
$(function(){
    var str = location.href.split('/').pop();
	$("." + str).addClass('current');
});
</script>