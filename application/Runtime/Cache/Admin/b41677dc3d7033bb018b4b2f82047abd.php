<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/Public/Admin/css/login.css" />
	<title>移动办公自动化系统</title>
</head>
<body>
<form id="myForm" action="<?php echo U('loginCheck');?>" method="post">
	<!--<form id="myForm" action="www.baidu.com" method="post">-->
		<div id="container">
			<div id="bd">
				<div class="login1">
					<div class="login-top"><h1 class="logo"></h1></div>
					<div class="login-input">
						<p class="user ue-clear">
							<label>用户名</label>
							<input type="text" name="username"/>
						</p>
						<p class="password ue-clear">
							<label>密&nbsp;&nbsp;&nbsp;码</label>
							<input type="text" name="password"/>
						</p>
						<p class="yzm ue-clear">
							<label>验证码</label>
							<input type="text" style="width: 109px;" name="yzm"/>
							<img src="<?php echo U('verify');?>" onclick="changeYZM(this)" alt="" width="80px" height="38px" style="vertical-align: middle;">
						</p>
					</div>
					<div class="login-btn ue-clear">
						<!--<a href="index.html" class="btn loginBtn">登录</a>-->
						<input type="submit" class="btn" value="登录">
						<div class="remember ue-clear">
							<input type="checkbox" id="remember" />
							<em></em>
							<label for="remember">记住密码</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
    <div id="ft">CopyRight&nbsp;2014&nbsp;&nbsp;版权所有&nbsp;&nbsp;uimaker.com专注于ui设计&nbsp;&nbsp;苏ICP备09003079号</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
	function changeYZM(obj) {
		obj.src='/Admin/Login/verify/_/'+Math.random();
	}
	$(".loginBtn").on("click", function () {
		$('#myForm').submit();
	})
var height = $(window).height();
$("#container").height(height);
$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
	var height = $(window).height();
	$("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
	$("#container").height(height);
	
});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
	checkRemember($(this));
});

function checkRemember($this){
	if(!-[1,]){
		 if($this.prop("checked")){
			$this.parent().addClass('checked');
		}else{
			$this.parent().removeClass('checked');
		}
	}
}
</script>
</html>