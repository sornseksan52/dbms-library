<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>資料庫系統實驗室</title>
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
            <li><?= anchor('/login/register', '註冊'); ?></li>
            </ul>
            <?php $attributes = array('class' => 'navbar-form pull-right');?>
            <?php echo form_open('verifylogin',$attributes); ?>
              <input id = "username" name = "username" class="span3" type="text" placeholder="Username">
              <input id = "password" name = "password" class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn btn-primary">登入</button>
            <span class = "text-error"><?php echo validation_errors(); ?></span>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

  </body>
</html>
