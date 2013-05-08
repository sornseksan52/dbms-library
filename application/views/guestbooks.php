<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>資料庫系統實驗室</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href='<?=base_url().'bootstrap/assets/css/bootstrap.css'?>' type="text/css" rel = "stylesheet"></link>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      table {
        empty-cells:show;
      }
    </style>
    <link href='<?=base_url().'bootstrap/assets/css/bootstrap-reponsive.css'?>' type="text/css" rel = "stylesheet"></link>

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
            <li><?= anchor('/home/leaveMessage', '留言板'); ?></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">服務<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><?= anchor('/home/searchBooks', '查詢書籍'); ?></li>
                <li><?= anchor('/home/listbooks', '個人書櫃'); ?></li>
                </ul>
              </li>
                        <?php if($manager == True){
                         echo '<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">管理書籍<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li>
                            </li>';
                            echo '<li>';
                         echo anchor('/home/manager/add', '新增書籍');
                         echo '</li><li>';
                         echo anchor('/home/manager/update', '更新書籍');
                         echo '</li><li>';
                         echo anchor('/home/manager/delete', '刪除書籍');
                         echo '</li></ul>';
                                }
                            ?>
                <li><?= anchor('/home/Logout', 'Logout'); ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <p class = "lead">Welcome <?php echo $username; ?>!<br/>
歡迎留言:)</p>

    <?php echo form_open('/home/leaveMessage/message'); ?>
    <span class="label label-info"><?php echo $username;?></span>
    <textarea placeholder = "leave your message" name = "message"></textarea>
    <button type="submit" class="btn btn-inverse">留言</button>
    </form> 

    <?php
    if(is_array($messages)){
        foreach($messages as $row){
            echo '<p><span class="label label-info">'. $row->name .'</span>';
            echo '<span class="label label-success">'. $row->message_date.'</span>';
            echo '<span class="badge badge-important">'.$row->content.'</span></p>';
            echo '<hr>';
        }
    }
    ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

  </body>
</html>
