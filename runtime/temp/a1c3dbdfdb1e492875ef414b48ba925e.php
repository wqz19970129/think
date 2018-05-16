<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\www\think\public/../application/admin/view/default/house\index.html";i:1526459126;}*/ ?>
<head>
    <meta charset="UTF-8">
    <title>报修列表|TwoThink管理平台</title>
    <link href="/public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/default_color.css" media="all">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/static/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->

</head>

<div class="header">
    <!-- Logo -->
    <span class="logo"></span>
    <!-- /Logo -->

    <!-- 主导航 -->
    <ul class="main-nav">
        <li class="current"><a href="/admin/ticket/index.html">物业管理</a></li>
        <li class=""><a href="/admin/index/index.html">首页</a></li>
        <li class=""><a href="/admin/article/index.html">内容</a></li>
        <li class=""><a href="/admin/user/index.html">用户</a></li>
        <li class=""><a href="/admin/config/group.html">系统</a></li>
        <li class=""><a href="/admin/addons/index.html">扩展</a></li>
    </ul>
    <!-- /主导航 -->

    <!-- 用户栏 -->
    <div class="user-bar">
        <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
        <ul class="nav-list user-menu hidden">
            <li class="manager">你好，<em title="admin">admin</em></li>
            <li><a onclick="go_home();">前台首页</a></li>
            <li><a href="/admin/user/updatepassword.html">修改密码</a></li>
            <li><a href="/admin/user/updatenickname.html">修改昵称</a></li>
            <li><a href="/admin/admin/delcache.html">更新缓存</a></li>
            <li><a href="/admin/publics/logout.html">退出</a></li>
        </ul>
    </div>
</div>
<div class="sidebar">
    <!-- 子导航 -->

    <div id="subnav" class="subnav">
        <!-- 子导航 -->
        <h3><i class="icon icon-unfold"></i>物业管理</h3>                        <ul class="side-sub-menu">
        <li class="current">
            <a class="item" href="/admin/guarantee/index.html">报修管理</a>
        </li>
        <li>
            <a class="item" href="/admin/house/index.html">小区租售</a>
        </li>
        <li>
            <a class="item" href="/admin/owner/index.html">业主认证</a>
        </li>
        <li>
            <a class="item" href="/admin/about/index.html">关于我们</a>
        </li>
    </ul>
        <!-- /子导航 -->
        <!-- 子导航 -->
        <h3><i class="icon icon-unfold"></i>报修管理</h3>                        <ul class="side-sub-menu">
        <li>
            <a class="item" href="/admin/ticket/123.html">123</a>
        </li>
    </ul>
        <!-- /子导航 -->
    </div>

    <!-- /子导航 -->
</div>



<div class="main-title">
    <h2>保修管理</h2>
</div>

<div class="cf">
    <a class="btn" href="<?php echo url('add','pid='.$pid); ?>">新 增</a>
    <a class="btn" href="javascript:;">删 除</a>
    <button class="btn list_sort" url="<?php echo url('sort',array('pid'=>input('get.pid',0)),''); ?>">排序</button>
</div>

<div class="data-table table-striped">
    <table>
        <thead>
        <tr>
            <th class="row-selected">
                <input class="checkbox check-all" type="checkbox">
            </th>
            <th>id</th>
            <th>租售标题</th>
            <th>价格</th>
            <th>详情</th>
            <th>地址</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$guarantee): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input class="ids row-selected" type="checkbox" name="" id="" value="<?php echo $channel['id']; ?>"> </td>
            <td><?php echo $guarantee['id']; ?></td>
            <td><?php echo $guarantee['title']; ?></td>
            <td><?php echo $guarantee['price']; ?></td>
            <td><?php echo $guarantee['content']; ?></td>
            <td><?php echo $guarantee['address']; ?></td>
            <td>
                <a title="编辑" href="<?php echo url('edit?id='.$guarantee['id'].'&pid='.$pid); ?>">编辑</a>
                <a class="confirm ajax-get" title="删除" href="<?php echo url('del?id='.$guarantee['id']); ?>">删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <td colspan="6" class="text-center"> aOh! 暂时还没有内容! </td>
        <?php endif; ?>
        </tbody>
    </table>
    <ul class="pagination">
        <li><a href="?page=1">&laquo;</a></li>
        <li><a href="?page=1">1</a></li>
        <li class="active"><span>2</span></li>
        <li class="disabled"><span>&raquo;</span></li>
    </ul>
</div>
<!-- Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet">



<script type="text/javascript">
    $(function() {
        //点击排序
        $('.list_sort').click(function(){
            var url = $(this).attr('url');
            var ids = $('.ids:checked');
            var param = '';
            if(ids.length > 0){
                var str = new Array();
                ids.each(function(){
                    str.push($(this).val());
                });
                param = str.join(',');
            }

            if(url != undefined && url != ''){
                window.location.href = url + '/ids/' + param;
            }
        });
    });
</script>
