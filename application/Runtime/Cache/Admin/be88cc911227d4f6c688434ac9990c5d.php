<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
    <style>
        .table-box table input[type='checkbox'] {
            height:14px;
            position: relative;
            top: 4px;
        }
        .checkTD {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('add');?>" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
                <!--<th style="width:40px;"><input id="checkControl" type="checkbox" name="depInfo">全选</th>-->
            	<th class="num">序号</th>
                <th class="name">角色名称</th>
                <th class="process">权限列表</th>
                <th class="node">权限路径</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <!--<td class="checkTD"><input type="checkbox" class="check" name="depInfo" value="<?php echo ($val["role_id"]); ?>"></td>-->
            	<td class="num"><?php echo ($val["role_id"]); ?></td>
                <td class="name"><?php echo ($val["role_name"]); ?>
                    <!--<?php echo (str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$val["dept_level"])); echo ($val["dept_name"]); ?>				-->
                </td>
                <td class="process"><?php echo ($val["role_ids"]); ?></td>
                <td class="node"><?php echo ($val["role_paths"]); ?></td>
                <td class="operate">
                    <a href="<?php echo U('distribute','rid='.$val[role_id]);?>">分配权限</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
    //删除多个
    $(".del").on("click", function () {
        var str = "";
        $.each($("input[type='checkbox']:checked"), function (i,v) {
            str += $(v).val() + ",";
        })
        str = str.substr(0,str.length-1);
        location.href="/Admin/Role/Del/id/"+str;
    })
    //复选框全选，反选
    $("#checkControl").on("click", function () {
        if($(this).attr('checked')) {
            $(".check").attr('checked','true');
        }else {
            $(".check").removeAttr('checked');
        }
    })
    $(".check").on("click", function () {
        var flag = 0;
        $.each($(".check"), function () {
            if(!$(this).attr('checked')) {
                flag = 1;
                $("#checkControl").removeAttr('checked');
            }
        })
        if(!flag){
            $("#checkControl").attr('checked','true');
        }
    })
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>