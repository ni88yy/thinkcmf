<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="__ROOT__/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css<?php echo ($js_debug); ?>" rel="stylesheet">
    <link href="__ROOT__/statics/simpleboot/css/simplebootadmin.css<?php echo ($js_debug); ?>" rel="stylesheet">
    <link href="__ROOT__/statics/js/artDialog/skins/default.css<?php echo ($js_debug); ?>" rel="stylesheet" />
    <link href="__ROOT__/statics/simpleboot/font-awesome/4.1.0/css/font-awesome.min.css<?php echo ($js_debug); ?>"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="__ROOT__/statics/simpleboot/font-awesome/4.1.0/css/font-awesome-ie7.min.css<?php echo ($js_debug); ?>">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "__ROOT__/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__ROOT__/statics/simpleboot/js/jquery.js<?php echo ($js_debug); ?>"></script>
    <script src="__ROOT__/statics/js/wind.js<?php echo ($js_debug); ?>"></script>
    <script src="__ROOT__/statics/simpleboot/js/jquery.smooth-scroll.min.js<?php echo ($js_debug); ?>"></script>
    <script src="__ROOT__/statics/simpleboot/bootstrap/js/bootstrap.min.js<?php echo ($js_debug); ?>"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed" style="min-width:800px;">
<div class="wrap J_check_wrap">
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
	            <th width="50">ID</th>
	            <th>用户名/姓名</th>
	            <th>邮箱</th>
	            <th width="140">内容</th>
	            <th width="140"><span>评论时间</span></th>
	            <th width="50"><span>状态</span></th>
	            <th width="120">操作</th>
	          </tr>
        </thead>
        	<?php $status=array("1"=>"已审核","0"=>"未审核"); ?>
        	<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" ></td>
		            <td><?php echo ($vo["id"]); ?></td>
		            <td><?php echo ($vo["full_name"]); ?></td>
		            <td><?php echo ($vo["email"]); ?></td>
		            <td><?php echo ($vo["content"]); ?></td>
		            <td><?php echo ($vo["createtime"]); ?></td>
		            <td><?php echo ($status[$vo['status']]); ?></td>
		            <td>
		            	<a href="<?php echo U('Commentadmin/delete',array('id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>
     
    </div>
    <div class="form-actions">
        <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>                
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('Commentadmin/check',array('check'=>1));?>" data-subcheck="true">审核</button>
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('Commentadmin/check',array('uncheck'=>1));?>" data-subcheck="true">取消审核</button>
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('Commentadmin/delete');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
    </div>
  </form>
</div>
<script src="__ROOT__/statics/js/common.js<?php echo ($js_debug); ?>"></script>
</body>
</html>