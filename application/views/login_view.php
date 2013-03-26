<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href='<?=base_url().'bootstrap/css/bootstrap.css'?>' type="text/css" rel = "stylesheet"></link>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href='<?=base_url().'bootstrap/css/bootstrap-reponsive.css'?>' type="text/css" rel = "stylesheet"></link>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!--[> Fav and touch icons <]-->
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">-->
    <!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">-->
      <!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">-->
                    <!--<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">-->
                                   <!--<link rel="shortcut icon" href="assets/ico/favicon.png">-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">資料庫系統實驗室</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="login">首頁</a></li>
              <li><a href="#about">關於</a></li>
              <li><a href="#contact">聯絡我們</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">服務<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">借書</a></li>
                  <li><a href="#">還書</a></li>
                  <li><a href="#">預約紀錄</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">有關帳戶</li>
                  <li><a href="#">移除帳戶</a></li>
                  <li><a href="#">修改密碼</a></li>
                </ul>
              </li>
            </ul>
            <?php $attributes = array('class' => 'navbar-form pull-right');?>
            <?php echo form_open('verifylogin',$attributes); ?>
              <input id = "username" name = "username" class="span3" type="text" placeholder="Username">
              <input id = "password" name = "password" class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">登入</button>
            <span class = "text-error"><?php echo validation_errors(); ?></span>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <!--<div class="container">-->

      <!--[> Main hero unit for a primary marketing message or call to action <]-->
      <!--<div class="hero-unit">-->
        <!--<h1>Hello, world!</h1>-->
        <!--<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>-->
        <!--<p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>-->
      <!--</div>-->

      <!--[> Example row of columns <]-->
      <!--<div class="row">-->
        <!--<div class="span4">-->
          <!--<h2>Heading</h2>-->
          <!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
          <!--<p><a class="btn" href="#">View details &raquo;</a></p>-->
        <!--</div>-->
        <!--<div class="span4">-->
          <!--<h2>Heading</h2>-->
          <!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
          <!--<p><a class="btn" href="#">View details &raquo;</a></p>-->
       <!--</div>-->
        <!--<div class="span4">-->
          <!--<h2>Heading</h2>-->
          <!--<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
          <!--<p><a class="btn" href="#">View details &raquo;</a></p>-->
        <!--</div>-->
      <!--</div>-->

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

  </body>
</html>
