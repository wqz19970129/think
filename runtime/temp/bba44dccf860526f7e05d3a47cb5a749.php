<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\www\think\public/../application/home/view/default/index\guarantee.html";i:1526293822;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container">
        <div class="blank"></div>
        <div class="row">
            <div class="col-xs-3">
                <img src="/image/5.png" width="60" height="60" />
            </div>
            <div class="col-xs-9">
                <?php echo $list1['username']; ?><br/>
                <?php echo $list['address']; ?><br/>
                积分:<span class="text-danger">100</span>
            </div>
        </div>
        <div class="blank"></div>
        <div class="row text-center myLabel">
            <div class="col-xs-4 label-danger"><a href="#"><span class="iconfont">&#xe60b;</span>我的资料</a></div>
            <div class="col-xs-4 label-success"><a href="/home/index/guarantee"><span class="iconfont">&#xe609;</span>我的报修</a></div>
            <div class="col-xs-4 label-primary"><a href="#"><span class="iconfont">&#xe606;</span>报名的活动</a></div>
        </div>
        <div class="blank"></div>
        <div>
            <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$guarantee): $mod = ($i % 2 );++$i;?>
            <ul class="list-group fuwuList">
                <li class="list-group-item"><a href="diaochawenjuan.html" class="text-danger"><span class="iconfont">&#xe60a;</span><?php echo $guarantee['title']; ?></a> </li>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>