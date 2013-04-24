<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
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

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
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
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <?php echo form_open('/home/returnBooks'); ?>
        <caption><h1 align = "center">Welcome <?php echo $username; ?>!<br/>
                您目前所借閱的書籍如下:)</h1></caption>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>還書</th>
                <th>書刊名</th>
                <th>系統書號</th>
                <th>作者名稱</th>
            </tr>

            <?php
            if($query){
                foreach($query as $row){
                echo '<tr><td><input type="checkbox" name=borrow_books[] value ='. "'$row->number'" .'/></td>';
                echo '<td>'.$row->bookname.'</td>';
                echo '<td>'.$row->number.'</td>';
                echo '<td>'.$row->author.'</td></tr>';
                }
            }
            ?>
        </table>
        <button type="submit" class="btn btn-success">確定還書</button>
        </form>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

    </body>
</html>
