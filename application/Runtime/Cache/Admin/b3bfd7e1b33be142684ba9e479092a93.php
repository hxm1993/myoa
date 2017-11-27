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
                <th class="num">节点名称</th>
                <th class="name">节点别名</th>
                <th class="process">父节点</th>
                <th class="node">模块</th>
                <th class="time">控制器</th>
                <th class="operate">方法</th>
                <th class="operate">路径</th>
                <th class="operate">级别</th>
                <th class="operate">排序</th>
                <th class="operate">是否显示</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($nodeList)): $i = 0; $__LIST__ = $nodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($val["node_id"]); ?></td>
                <td class="name">
                    <?php echo ($val["node_name"]); ?>
                    <!--<?php echo (str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$val["dept_level"])); echo ($val["dept_name"]); ?>				</td>-->
                <td class="process"><?php echo ($val["node_title"]); ?></td>
                <td class="node"><?php echo ($val["node_pid"]); ?></td>
                <td class="time"><?php echo ($val["node_modul"]); ?></td>
                <td class="time"><?php echo ($val["node_controller"]); ?></td>
                <td class="time"><?php echo ($val["node_action"]); ?></td>
                <td class="time"><?php echo ($val["node_path"]); ?></td>
                <td class="time"><?php echo ($val["node_level"]); ?></td>
                <td class="time"><?php echo ($val["node_sort"]); ?></td>
                <td class="time"><?php echo ($val["node_show"]); ?></td>
                <td class="checkTD">
                    <input type="checkbox" class="check" name="depInfo" value="<?php echo ($val["node_id"]); ?>">
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<input type="hidden" value="<?php echo ($id); ?>" name="roleId">-->
            <input type="button" id="disBtn" value="分配权限">
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
    $("#disBtn").on("click", function () {
        var str = "";
        $.each($("input:checkbox:checked"),function(i,v) {
            str += $(v).val() + ",";
        })
        str = str.substr(0,str.length-1);
        window.location.href = "/Admin/Role/distributeOk/ids/"+str+"/rid/"+<?php echo ($_GET['rid']); ?>;
    })

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