<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style>
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post">
    <div class="main">
        <p class="short-input ue-clear">
            <label>用户名：</label>
            <input type="text" name="name" placeholder="用户名" />
        </p>
        <p class="short-input ue-clear">
            <label>密码：</label>
            <input type="text" name="password" placeholder="密码" />
        </p>
        <p class="short-input ue-clear">
            <label>密码确认：</label>
            <input type="text" name="re-password" placeholder="密码确认" />
        </p>
        <p class="short-input ue-clear">
            <label>昵称：</label>
            <input type="text" name="nickname" placeholder="昵称" />
        </p>
        <div class="short-input select ue-clear">
            <label>所属部门：</label>
            <select>
                <option value="1">总裁办</option>
                <option value="2">人事部</option>
                <option value="3">财务部</option>
                <option value="4">技术部</option>
                <option value="5">市场部</option>
                <option value="6">开发部</option>
                <option value="11">媒体部</option>
                <option value="12">测试部</option>
                <option value="13">咨询部</option>
                <option value="15">海外开发一部</option>
            </select>
        </div>
        <p class="short-input ue-clear">
            <label>性别：</label>
            <input type="radio" name="sex" value="男" checked='checked' />男&nbsp;&nbsp;
            <input type="radio" name="sex" value="女" />女
        </p>
        <p class="short-input ue-clear">
            <label>生日：</label>
            <input type="text" name="birthday" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
        </p>
        <p class="short-input ue-clear">
            <label>电话：</label>
            <input type="text" name="tel" />
        </p>
        <p class="short-input ue-clear">
            <label>email：</label>
            <input type="text" name="email" />
        </p>
    </div>
    <div class="btn ue-clear">
        <a href="javascript:;" class="confirm">确定</a>
        <a href="javascript:;" class="clear">清空内容</a>
    </div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
    $(".confirm").on("click",function() {
        $("form").submit();
    })
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});


showRemind('input[type=text], textarea','placeholder');
</script>
</html>