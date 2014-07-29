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
     <li class="active"><a href="<?php echo U('answeradmin/robot');?>">智能回复</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="">
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table table-hover" width="100%">
          <thead>
			<tr>
				<td></td>
				<td>预设</td>
				<td>回复内容</td>
				<td>关键词一</td>
				<td>关键词二</td>
				<td>关键词三</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr rel="<?php echo ($vo["id"]); ?>">
					<td><input type="checkbox" name="check[]" ></td>
					<td><input type="text" name="" class="input input-small" value="<?php echo ($vo['question']); ?>" ></td>
					<td><input type="text" name="" class="input input-small" value="<?php echo ($vo['answer']); ?>" ></td>
					<td><input class="keys input input-small" type="text" name="" value="<?php echo ($vo['key1']); ?>" ></td>
					<td><input class="keys input input-small" type="text" name="" value="<?php echo ($vo['key2']); ?>" ></td>
					<td><input class="keys input input-small" type="text" name="" value="<?php echo ($vo['key3']); ?>" ></td>
					<td><a href="javascript:void(0)" onclick="answer_del(this);">删除</a>|
						<a href="javascript:void(0)" onclick="answer_submit(this);">确定</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td><input type="checkbox" name="check[]" ></td>
				<td><input type="text" name="" class="input input-small" value="" ></td>
				<td><input type="text" name="" class="input input-small" value="" ></td>
				<td><input class="keys input input-small" type="text" name="" value="" ></td>
				<td><input class="keys input input-small" type="text" name="" value="" ></td>
				<td><input class="keys input input-small" type="text" name="" value="" ></td>
				<td><a href="javascript:void(0)" onclick="answer_del(this);">删除</a>|
					<a href="javascript:void(0)" onclick="answer_submit(this);">确定</a></td>
			</tr>
			<tr>
				<td><input type="checkbox" onclick="answer_check_all();" id="check_box" /></td>
				<td><a href="javascript:void(0)" onclick="answer_del_all();">删除</a> | 
					<a href="javascript:void(0)" onclick="answer_add();">添加项</a></td>
				<td colspan="6"></td>
			</tr>
		</tbody>
        </table>
      </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js<?php echo ($js_debug); ?>"></script>
<script type="text/javascript">
	Wind.use("artDialog", function () {
		window.ask = function(con, func){
			art.dialog({
		        content: con,
		        icon: 'question',
		        lock: true,
		        ok:function(){
		        	func();
		        }
		    });
		}
	});
	var input_o; //选中的输入框
	//全选
	function answer_check_all(){
		if($("#check_box").is(':checked')){
			$("tbody [type='checkbox']").not('#check_box').each(function(){
				$(this).attr('checked',true);
			});
		}else{
			$("tbody [type='checkbox']").not('#check_box').each(function(){
				$(this).attr("checked",false);
			});
		}
	}
	//删除选中项
	function answer_del_all(){
		var _id = '';
		$("tbody [type='checkbox']:checked").not('#check_box').each(function(){
			_id += $(this).parents('tr').attr('rel')+',';
		});
		ask('删除全部选中项？',function(){
			$.post('<?php echo U("Wx/answeradmin/robot_post");?>',
					{id:_id},
				function(data){
					if(data.status == 1){
						$("tbody [type='checkbox']:checked").not('#check_box').remove();
					}else{
						alert(data.info);
					}
			},'json');
		});
	}
	//新增项
	var insert_tr='<tr><td><input type="checkbox" name="check[]" ></td>';
		insert_tr+='<td><input type="text" name="" class="input" value="" ></td>';
		insert_tr+='<td><input type="text" name="" class="input" value="" ></td>';
		insert_tr+='<td><input type="text" name="" class="input" value="" ></td>';
		insert_tr+='<td><input type="text" name="" class="input" value="" ></td>';
		insert_tr+='<td><input type="text" name="" class="input" value="" ></td>';
		insert_tr+='<td><a href="javascript:void(0)" onclick="answer_del(this)">删除</a>|';
		insert_tr+='<a href="javascript:void(0)" onclick="answer_submit(this)">确定</a></td></tr>';
	function answer_add(){
		$('table tr').last().before(insert_tr);
	}
	//单项删除
	function answer_del(o){
		var _id = $(o).parents('tr').attr('rel');
		ask('删除当前项？',function(){
			$.post('<?php echo U("Wx/answeradmin/robot_post");?>',
					{id:_id},
				function(data){
					if(data.status==1){
						$(o).parents('tr').remove();
					}else{
						alert(data.info);
					}
			},'json');
		});
	}
	//确定
	function answer_submit(o){
		var p=$(o).parents('tr'),
			_k=p.find(':text').eq(0).val(),
			_v=p.find(':text').eq(1).val(),
			key_1=p.find(':text').eq(2).val(),
			key_2=p.find(':text').eq(3).val(),
			key_3=p.find(':text').eq(4).val();
		$.post('<?php echo U("Wx/answeradmin/robot_post");?>',
			{question:_k, answer:_v,key1:key_1, key2:key_2, key3:key_3},
		function(data){
			if(data.status==1){
				document.location.reload();
			}else{
				alert(data.info);
			}
		},'json');
	}
	function fill_keys(o){
		input_o.val($(o).text());
	}
	
$(function(){
	//下拉选项设置
	$(".keys").focus(function(){
		input_o = $(this);
		var word_split=$(this).parents('tr').find(':text').eq(0).val();
		if(word_split.length<1) return;
		var _left = $(this).position().left+2,
			_top = $(this).position().top+23;
		$.post('<?php echo U("Wx/answeradmin/split");?>',
			{words : word_split},
			function(data){
				$("#tip_keys").html(data.info).css({"display":"block","left":_left,"top":_top});
				
		},'json');
	});
	$(document).click(function(){
		$("#tip_keys").css({'display':'none'});
	});
});
</script>
<style type="text/css">
	#tip_keys{
		position:absolute;
		border:1px solid #ccc;
		padding:2px 4px;
		background-color:#fcfcfc;
		display:none; 
		width:150px; 
		line-height:30px;
	}
	#tip_keys span{
		color:#444;
		display:block;
		width:100%;
		border-bottom:1px dashed #eee;
	}
	#tip_keys span:hover{
		font-weight:bold;
		border-bottom:1px dashed #aaa;
		color:#000;
	}
</style>
<div id="tip_keys">
	<span></span>
</div>
</body>
</html>