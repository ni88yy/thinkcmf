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
     <li class="active"><a href="<?php echo U('link/index');?>">友情链接</a></li>
     <li><a href="<?php echo U('link/add');?>">添加链接</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="<?php echo U('Link/listorders');?>">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	           	<th width="50">排序</th>
	            <th>ID</th>
	            <th>链接名称</th>
	            <th>链接地址</th>
	            <th width="120">操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php if(is_array($links)): foreach($links as $key=>$vo): ?><tr>
			        	<td><input name='listorders[<?php echo ($vo["link_id"]); ?>]' class="input input-order mr5"  type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
			            <td><?php echo ($vo["link_id"]); ?></td>
			            <td><?php echo ($vo["link_name"]); ?></td>
			            <td><a href="<?php echo ($vo["link_url"]); ?>" target="_blank"><?php echo ($vo["link_url"]); ?></a></td>
			            <td>
			            	<a href="<?php echo U('link/edit',array('id'=>$vo['link_id']));?>" >修改</a>|
				            <a href="<?php echo U('link/delete',array('id'=>$vo['link_id']));?>" class="J_ajax_del" >删除</a>
				        </td>
		          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
    <div class="form-actions">
    		<button class="btn btn-primary btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
  </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js?<?php echo ($js_debug); ?>"></script>
</body>
</html>