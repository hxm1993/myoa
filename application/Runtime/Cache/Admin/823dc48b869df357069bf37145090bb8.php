<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post">
    <div class="main">
        <p class="short-input ue-clear">
            <label>节点名称：</label>
            <input type="text" name="name" placeholder="部门名称" />
        </p>
        <p class="short-input ue-clear">
            <label>节点title：</label>
            <input type="text" name="title" placeholder="节点title" />
        </p>
        <div class="short-input select ue-clear">
            <label>父节点：</label>
            <div class="select-wrap">
                <select name="pid" id="">
                    <option value="0">顶级节点</option>
                    <?php if(is_array($nodes)): foreach($nodes as $key=>$val): if($val['node_pid'] == 0): ?><option value="<?php echo ($val["node_id"]); ?>"><?php echo ($val["node_name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
            </div>
        </div>
        <p class="short-input ue-clear">
            <label>模板：</label>
            <input type="text" name="modul" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>控制器：</label>
            <input type="text" name="controller" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>方法：</label>
            <input type="text" name="action" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>path：</label>
            <input type="text" name="path" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>level：</label>
            <input type="text" name="level" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>排序：</label>
            <input type="text" name="sort" placeholder="节点title" />
        </p>
        <p class="short-input ue-clear">
            <label>是否显示：</label>
            <input type="text" name="show" placeholder="节点title" />
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
$(".confirm").on("click", function () {
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