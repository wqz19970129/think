<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\www\think\public/../application/index\view\index\index.html";i:1526225439;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>后台管理系统</title>
		<link href="./Public/Admin/images/index.css" type="text/css" rel="stylesheet"/>
		<script src="./Public/Admin/images/jquery.js"></script>
	</head>
	<body>
		<header>
			<h1>网站后台管理系统</h1>
			<p>
				<a href="#"><span class="icon home"></span>欢迎回来<?=$username?></a>
				<a href="#"><span class="icon home"></span>系统首页</a>
				<a href="index.php?a=login&c=login"><span class="icon quit"></span>安全退出</a>
			</p>
		</header>
		<section>
			<nav>
				<h3>欢迎您来到管理后台</h3>
				<p>登陆名：<strong>Admin</strong><br/>身　份：<strong>超级管理员</strong></p>
				<dl>
					<dt><span class="icon board"></span>单页管理</dt>
					<dd>
						<a href="#">-&emsp;新增单页</a>
						<a href="#">-&emsp;单页列表</a>
					</dd>
					<dt><span class="icon news"></span>新闻管理</dt>
					<dd>
						<a href="#">-&emsp;发布新闻</a>
						<a href="#">-&emsp;新闻列表</a>
						<a href="#">-&emsp;新闻分类</a>
					</dd>
					<dt><span class="icon pro"></span>产品管理</dt>
					<dd>
						<a href="#">-&emsp;新增产品</a>
						<a href="#">-&emsp;产品列表</a>
						<a href="#">-&emsp;产品分类</a>
					</dd>
					<dt><span class="icon book"></span>留言管理</dt>
					<dd>
						<a href="#">-&emsp;留言列表</a>
					</dd>
					<dt><span class="icon flink"></span>友情连接管理</dt>
					<dd>
						<a href="#">-&emsp;新增连接</a>
						<a href="#">-&emsp;连接列表</a>
					</dd>
					<dt><span class="icon admin"></span>管理员管理</dt>
					<dd>
						<a href="index.php?c=goods&a=add">-&emsp;新增管理员</a>
						<a href="index.php?c=goods&a=index">-&emsp;管理员列表</a>
					</dd>
				</dl>
			</nav>
			<div class="mainbox">
				<form method="post" action="index.php?c=goods&a=index" class="search_form">
					<!-- 推荐 -->
					<select name="status">
						<option value="">全部</option>
						<option value="4">精品</option>
						<option value="2">新品</option>
						<option value="1">热销</option>
					</select>
					<!-- 上架 -->
					<select name="is_on_sale">
						<option value=''>全部</option>
						<option value="2">上架</option>
						<option value="1">下架</option>
					</select>
					<!-- 关键字 -->
					关键字 <input type="text" name="keyword" size="15" />
					<input type="submit" value=" 搜索 " class="button" />
				</form>
				<div class="note">
					<h4>商品添加</h4>
					<table class="news_list">
						<thead>
							<tr>
								<th>商品主键</th>
								<th>商品名</th>
								<th>商品货号</th>
								<th>本店价格</th>
								<th>市场价格</th>
								<th>商品图片</th>
								<th>上架</th>
								<th>精品</th>
								<th>新品</th>
								<th>热销</th>
								<th>商品简介</th>
								<th>添加时间</th>
								<th>修改时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>


						
									</td>
								</tr>
							<!-- 分页结束 -->
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<script>
			$(function(){
				$('dt').click(function(){
					var obj=$(this).next();
					if($(this).next().css('display')=='block'){
						obj.hide('fast');
						$(this).removeClass('on');
					}else{
						obj.show('fast');
						$(this).addClass('on');
					}
				});
			});
		</script>
	</body>
</html>