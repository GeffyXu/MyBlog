<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="/pBlog/Public/css/register-login.css">
</head>
<body>
<div id="box"></div>
<div class="cent-box register-box">
	<div class="cent-box-header">
		<h1 class="main-title hide">注册</h1>
		<h2 class="sub-title">爱生活爱分享 - I♡Fangling</h2>
	</div>

	<div class="cont-main clearfix">
		<div class="index-tab">
			<div class="index-slide-nav">
				<a href="login.html">登录</a>
				<a href="register.html" class="active">注册</a>
				<div class="slide-bar slide-bar1"></div>				
			</div>
		</div>
<form id="register" action="<?php echo U('Index/registerRes');?>" method="post">
		<div class="login form">
			<div class="group">
				<div class="group-ipt email">
					<input type="email" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
				</div>
				<div class="group-ipt user">
					<input type="text" name="user" id="user" class="ipt" placeholder="选择一个用户名" required>
				</div>
				<div class="group-ipt password">
					<input type="password" name="password" id="password" class="ipt" placeholder="设置登录密码" required>
				</div>
				<div class="group-ipt password1">
					<input type="password" name="password1" id="password1" class="ipt" placeholder="重复密码" required>
				</div>

			</div>
		</div>

		<div class="button">
			<button type="submit" class="login-btn register-btn" id="button">注册</button>
		</div>
</form>
	</div>
</div>

<div class="footer">
	<p>I♡Fangling</p>
	<p>CopyRight @xuguohui 2017</p>
</div>

<script src='/pBlog/Public/js/log-regjs/particles.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/background.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/jquery.min.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/layer/layer.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/index.js' type="text/javascript"></script>
<script>
	$(".login-btn").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		var verify = $("#verify").val();
		var psw = $("#password1").val();
		if(psw == password){
			return true;
		}else{
			alert("两次密码不一致！");
			return false;
		}
		// $.ajax({
		// url: 'http://www.zrong.me/home/index/userLogin',
		// type: 'post',
		// jsonp: 'jsonpcallback',
  //       jsonpCallback: "flightHandler",
		// async: false,
		// data: {
		// 	'email':email,
		// 	'password':password,
		// 	'verify':verify
		// },
		// success: function(data){
		// 	info = data.status;
		// 	layer.msg(info);
		// }
		// })

	})
	$("#remember-me").click(function(){
		var n = document.getElementById("remember-me").checked;
		if(n){
			$(".zt").show();
		}else{
			$(".zt").hide();
		}
	})
</script>
</body>
</html>