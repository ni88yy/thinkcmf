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
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('slide/index');?>">所有幻灯片</a></li>
     <li><a href="<?php echo U('slide/add');?>">添加幻灯片</a></li>
  </ul>
  <form class="well form-search" method="post" id="cid_form">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <select class="select_2" name="cid"style="width:100px;" id="selected_cid">
          <option value=''>全部</option>
          <?php if(is_array($categorys)): foreach($categorys as $key=>$vo): $cid_select=$vo['cid']===$slide_cid?"selected":""; ?>
          	<option value="<?php echo ($vo["cid"]); ?>" <?php echo ($cid_select); ?>><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
      </div>
    </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
	            <th width="50">排序</th>
	            <th width="100">ID</th>
	            <th>标题</th>
	            <th>描述</th>
	            <th width="120">操作</th>
	          </tr>
        </thead>
        	<?php if(is_array($slides)): foreach($slides as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["slide_id"]); ?>"></td>
		            <td><input name='listorders[<?php echo ($vo["slide_id"]); ?>]' class="input input-order mr5"  type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
		            <td><?php echo ($vo["slide_id"]); ?></td>
		            <td><?php echo ($vo["slide_name"]); ?></td>
	            	<td><?php echo ($vo["slide_des"]); ?></td>
		            <td>
		            	<a href="<?php echo U('slide/edit',array('id'=>$vo['slide_id']));?>">修改</a>|
		            	<a href="<?php echo U('slide/delete',array('id'=>$vo['slide_id']));?>" class="J_ajax_del" >删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
      <div class="p10"><div class="pages">  </div> </div>
     
    </div>
    <div class="form-actions">
            <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>  
	        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('slide/listorders');?>">排序</button>              
	        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo U('slide/delete');?>" data-subcheck="true" >删除</button>
      </div>
  </form>
</div>
<script src="__ROOT__/statics/js/common.js?<?php echo ($js_debug); ?>"></script>
<script>
setCookie('refersh_time', 0);
function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location.reload();
    }
}
setInterval(function(){
	refersh_window()
}, 3000);
$(function () {
	$("#selected_cid").change(function(){
		$("#cid_form").submit();
	});
});

</script>
</body>
</html>