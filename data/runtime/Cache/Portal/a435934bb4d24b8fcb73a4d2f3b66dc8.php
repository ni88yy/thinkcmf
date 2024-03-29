<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($post_title); ?>|<?php echo ($term["name"]); ?>|<?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($post_keywords); ?>" />
	<meta name="description" content="<?php echo ($post_excerpt); ?>">
    	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <link href="__TMPL__Public/simpleboot/themes/flat/theme.min.css" rel="stylesheet">
    <link href="__TMPL__Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="__TMPL__Public/simpleboot/font-awesome/4.1.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="__TMPL__Public/simpleboot/font-awesome/4.1.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="__TMPL__Public/css/style.css" rel="stylesheet">
</head>
<body>
 <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="__ROOT__">ThinkCMF</a>
       <div class="nav-collapse collapse" id="main-menu">
         <?php $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip" target="_blank" href="http://www.thinkcmf.com/" title="ThinkCMF"><i class="fa fa-share-alt"></i>ThinkCMF</a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>
<div class="container">

    <div class="pg-opt pin">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <h2><?php echo ($term["name"]); ?></h2>
                </div>
                <!-- <div class="span6">
                    <ol class="breadcrumb">
                    	<li><a href="index.php">首页</a></li>
                        <li class="active"><?php echo ($term["name"]); ?></li>
                    </ol>
                </div> -->
                
            </div>
        </div>
    </div>
    
    
    
    <div class="slice bg-3 animate-hover-slide section">
        <div class="w-section inverse blog-grid">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <div class="w-box blog-post">
                            <div class="figure">
                                <h4><?php echo ($post_title); ?></h4>
                                
                                <span>作者:&nbsp;<?php echo ($user_login); ?>&nbsp;<?php echo ($post_date); ?></span>
                                <?php echo ($post_content); ?>
                            </div>
                            <div class="pagination">
                            	<ul>
			                        <?php echo ($page); ?>
			                    </ul>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                    	<h3>最新文章</h3>
				      	<dl>
				      		<?php $last_posts = sp_sql_posts("cid:$term_id;order:post_date DESC;limit:5;"); ?>
				      		<?php if(is_array($last_posts)): foreach($last_posts as $key=>$vo): ?><dt>
				                <span class="hot_num"><?php echo ($key+1); ?>.</span>&nbsp;<a href="<?php echo U('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
				            </dt><?php endforeach; endif; ?>
                		</dl>
				    </div>
                </div>
                
            </div>
        </div>
    </div>
    
<br><br><br><br>
<!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <div class="links">
          <a href="http://www.thinkcmf.com">ThinkCMF</a>
          <a href="http://bbs.thinkcmf.com">ThinkCMF技术社区</a>
        </div>
        Made by <a href="http://www.thinkcmf.com">ThinkCMF</a>
        Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" rel="nofollow">Apache License v2.0</a>.<br/>
        Based on <a href="http://getbootstrap.com/2.3.2/" rel="nofollow">Bootstrap</a>.  Icons from <a href="http://fortawesome.github.com/Font-Awesome/" rel="nofollow">Font Awesome</a>
        </p>
      </footer>
</div>

<!-- JavaScript -->
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__TMPL__Public/simpleboot/js/jquery.js"></script>
    <script src="__TMPL__Public/simpleboot/js/jquery.smooth-scroll.min.js"></script>
    <script src="__TMPL__Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>