<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href='<?=base_url().'bootstrap/css/bootstrap.css'?>' type="text/css" rel = "stylesheet"></link>
    <link href='<?=base_url().'bootstrap/css/bootstrap-reponsive.css'?>' type="text/css" rel = "stylesheet"></link>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

  </head>

  <body>

    <div class="container">
        <?php echo form_open('/login/successRegister',array('class'=>'form-signin')); ?>
        <h2 class="form-signin-heading">歡迎註冊帳號</h2>
        <input name = 'username' type="text" class="input-block-level" placeholder="Username">
        <input name = 'email' type="text" class="input-block-level" placeholder="Email address">
        <input name = 'password' type="password" class="input-block-level" placeholder="Password">
        <input name = 'passconf' type="password" class="input-block-level" placeholder="Password Confirm">
        <button class="btn btn-large btn-primary" type="submit">註冊</button>
        <?php echo validation_errors(); ?>
        <button class="btn btn-large btn-info" type = 'button'><?= anchor('/login', '回首頁'); ?></button>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>
  </body>
</html>
