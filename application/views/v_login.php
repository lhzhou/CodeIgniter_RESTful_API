<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE6" />
<META name=GENERATOR content="MSHTML 8.00.6001.18372">
<link href="<?php echo site_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo site_url()?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo site_url()?>kindeditor/themes/default/default.css" rel="stylesheet" />
<script src="<?php echo site_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo site_url()?>assets/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
  <div id="fullscreen_bg" class="fullscreen_bg"/>

  <div class="container">
	


  <?php echo form_open_multipart(base_url('login_check'), array('class' => 'form-signin'));?>
		<h1 class="form-signin-heading text-muted">管理员登陆</h1>
		<?php if (isset($message)) {?>
		<div class="alert alert-danger" role="alert"><?php echo get_message(); ?></div>
		<?php } ?>
		<input type="text" class="form-control" name="username" placeholder="管理员账号"  autofocus required>
		<input type="password" class="form-control" name="password" placeholder="管理员密码" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
		登陆系统
		</button>
	</form>

</div>
</div>
<style type="text/css">
	  body {
    padding-top: 120px;
    padding-bottom: 40px;
    background-color: #eee;
  
  }
  .btn 
  {
   outline:0;
   border:none;
   border-top:none;
   border-bottom:none;
   border-left:none;
   border-right:none;
   box-shadow:inset 2px -3px rgba(0,0,0,0.15);
  }
  .btn:focus
  {
   outline:0;
   -webkit-outline:0;
   -moz-outline:0;
  }
  .fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-image: url('<?php echo base_url()?>assets/i/color-splash.jpg');
    background-repeat:repeat;
  }
  .form-signin {
    max-width: 280px;
    padding: 15px;
    margin: 0 auto;
      margin-top:50px;
  }
  .form-signin .form-signin-heading, .form-signin {
    margin-bottom: 10px;
  }
  .form-signin .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: none;
    border-left-style: solid;
    border-color: #000;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-top-style: none;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-color: rgb(0,0,0);
    border-top:1px solid rgba(0,0,0,0.08);
  }
  .form-signin-heading {
    color: #fff;
    text-align: center;
    text-shadow: 0 2px 2px rgba(0,0,0,0.5);
  }
</style>
</body>
</html>
