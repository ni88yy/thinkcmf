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
<body class="J_scroll_fixed">
<div class="wrap jj">
   <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('slidecat/index');?>">幻灯片分类</a></li>
     <li><a href="<?php echo U('slidecat/add');?>">添加幻灯片分类 </a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="<?php echo U('term/listorders');?>">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	            <th width="50">ID</th>
	            <th>分类名称</th>
	            <th>分类标识</th>
	            <th>描述</th>
	            <th width="120">操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<tr>
		            <td>0</td>
		            <td>默认分类</td>
		            <td></td>
		            <td>默认分类</td>
		            <td>不允许修改</td>
	          </tr>
	        	<?php if(is_array($slidecats)): foreach($slidecats as $key=>$vo): ?><tr>
		            <td><?php echo ($vo["cid"]); ?></td>
		            <td><?php echo ($vo["cat_name"]); ?></td>
		            <td><?php echo ($vo["cat_idname"]); ?></td>
		            <td><?php echo ($vo["cat_remark"]); ?></td>
		            <td>
		            	<a href="<?php echo U('slidecat/edit',array('id'=>$vo['cid']));?>" >修改</a>|
			            <a href="<?php echo U('slidecat/delete',array('id'=>$vo['cid']));?>" class="J_ajax_del" >删除</a>
			        </td>
	          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
  </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js?<?php echo ($js_debug); ?>"></script>
</body>
</html>