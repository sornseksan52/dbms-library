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

                        <?php if($username == 'mht'){
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
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>


    </div> <!-- /container -->
    <?php echo form_open('/manager/addBooks',array('class' => 'span3')); ?>
      <fieldset>
        <legend>新增書籍</legend>
        <label>書籍名稱</label>
        <input name = 'bookname' type="text" placeholder="書籍名稱">
        <label>作者名稱</label>
        <input name = 'author' type="text" placeholder="作者名稱">
        <label>出版年份</label>
        <input name = 'publish' type="text" placeholder="出版年份">
        <label>類別</label>
        <input name = 'class' type="text" placeholder="類別">
<br/>
        <button type="submit" class="btn btn-primary">確定新增</button>
          </fieldset>
        </form>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

</body>
</html>
