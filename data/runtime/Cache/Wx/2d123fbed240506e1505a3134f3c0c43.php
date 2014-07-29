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
     <li class="active"><a href="<?php echo U('Wx/Indexadmin/index');?>">账号信息</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="<?php echo U('Wx/Indexadmin/index_post');?>">
      <div class="h_a">账号信息</div>
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <tr>
              <td>公众号:</td>
              <td>
              <input type="text" class="input" name="WX_NUM" value="<?php echo wx_val('WX_NUM');?>">
              </td>
            </tr>
            <tr>
              <td>微信原始账号:</td>
              <td>
              <input type="text" class="input" name="WX_INI_NUM" value="<?php echo wx_val('WX_INI_NUM');?>">
              </td>
            </tr>
            <tr>
              <td>TOKEN:</td>
              <td>
              <input type="text" class="input" name="WX_TOKEN" value="<?php echo wx_val('WX_TOKEN');?>">
              </td>
            </tr>
            <tr>
              <td>AppId:</td>
              <td>
              <input type="text" class="input" name="WX_APPID" value="<?php echo wx_val('WX_APPID');?>">
              </td>
            </tr>
            <tr>
              <td>AppSecret:</td>
              <td>
              <input type="text" class="input" name="WX_APPSECRET" value="<?php echo wx_val('WX_APPSECRET');?>">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
       您的微信公众平台消息接收URL为：<?php echo ($rst["url"]); ?>/__ROOT__api/wx/api/boot.php?id=<?php echo wx_val('WX_INI_NUM');?>
      <div class="form-actions">
            <button class="btn btn-primary btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
      </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js<?php echo ($js_debug); ?>"></script>
</body>
</html>