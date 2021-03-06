<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="/pBlog/Public/css/register-login.css">
</head>
<body>
<div id="box"></div>
<div class="cent-box">
	<div class="cent-box-header">
		<h1 class="main-title hide">I♡Fangling</h1>
		<h2 class="sub-title">爱生活爱分享 - I♡Fangling</h2>
	</div>

	<div class="cont-main clearfix">
		<div class="index-tab">
			<div class="index-slide-nav">
				<a href="login.html" class="active">登录</a>
				<a href="register.html">注册</a>
				<div class="slide-bar"></div>				
			</div>
		</div>
<form id="login" action="<?php echo U('Index/loginRes');?>" method="post">
		<div class="login form">
			<div class="group">
				<div class="group-ipt email">
					<input type="text" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
				</div>
				<div class="group-ipt password">
					<input type="password" name="password" id="password" class="ipt" placeholder="输入您的登录密码" required>
				</div>
			</div>
		</div>

		<div class="button">
			<button type="submit" class="login-btn register-btn" id="button">登录</button>
		</div>

		<div class="remember clearfix">
			<label class="remember-me"><span class="icon"><span class="zt"></span></span><input type="checkbox" name="remember-me" id="remember-me" class="remember-mecheck" checked>记住我</label>
			<label class="forgot-password">
				<a href="#">忘记密码？</a>
			</label>
		</div>
</form>
	</div>
</div>

<div class="footer">
	<p>I♡Fangling</p>
	<p>CopyRight @ xuguohui  2017</p>
</div>

<script src='/pBlog/Public/js/log-regjs/particles.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/background.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/jquery.min.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/layer/layer.js' type="text/javascript"></script>
<script src='/pBlog/Public/js/log-regjs/index.js' type="text/javascript"></script>
<script>
	$("#remember-me").click(function(){
		var n = document.getElementById("remember-me").checked;
		if(n){
			$(".zt").show();
		}else{
			$(".zt").hide();
		}
	});
</script>
</body>
</html>