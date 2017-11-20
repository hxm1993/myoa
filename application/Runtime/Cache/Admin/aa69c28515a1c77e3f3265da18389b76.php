<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <th class="num"><?php echo ($val['user_id']); ?></th>
        <th class="name"><?php echo ($val['user_name']); ?></th>
        <td class="nickname"><?php echo ($val['user_nickname']); ?></th>
        <td class="dept"><?php echo ($val['user_dept']); ?></th>
        <td class="role">1</th>
        <td class="sex"><?php echo ($val['user_sex']); ?></th>
        <td class="birthday"><?php echo ($val['user_birthday']); ?></th>
        <th class="tel"><?php echo ($val['user_tel']); ?></th>
        <th class="email"><?php echo ($val['user_email']); ?></th>
        <th class="ctime"><?php echo ($val['user_ctime']); ?></th>
        <th class="operate">操作</th>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>