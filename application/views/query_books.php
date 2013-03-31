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
              <li class="active"><a href="#">首頁</a></li>
              <li><a href="#about">關於</a></li>
              <li><a href="#contact">聯絡我們</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">服務<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">管理書籍</a></li>
                  <li><a href="#">借書</a></li>
                  <li><a href="#">還書</a></li>
                                <li><?= anchor('/home/listbooks', '個人書櫃'); ?></li>
                  <li><a href="#">預約紀錄</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">有關帳戶</li>
                  <li><a href="#">移除帳戶</a></li>
                  <li><a href="#">修改密碼</a></li>
                </ul>
              </li>
                            <li><a href="/home/logout">Logout</a></li> 
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <p class = "lead">Welcome <?php echo $username; ?>!<br/>
歡迎借書:)</p>
    <?php $attributes = array('class' => 'navbar-search pull-left');?>
    <?php echo form_open('/home/queryResult',$attributes); ?>
    <select size ="1" name="criteria">
        <option value='bookname'>書刊名</option>
        <option value='author'>作者名稱</option>
        <option value='publish'>出版年份</option>
    </select>
    <input name = "search" type="text" class="search-query" placeholder="Search">
    <button type="submit" class="btn">搜尋</button>

    <caption><h1 align = "center">Welcome <?php echo $username; ?>!<br/>
            搜尋結果如下:)</h1></caption>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>是否借閱</th>
            <th>書刊名</th>
            <th>作者名稱</th>
            <th>狀態</th>
            <th>出版年份</th>
        </tr>

        <?php
        foreach($query as $row){
        echo '<tr>';
        echo '<td><input type="checkbox" name=borrow_books[] value ='. $row->bookname .'</td>';
        echo '<td>'.$row->bookname.'</td>';
        echo '<td>'.$row->author.'</td>';
        echo '<td>'.$row->state.'</td>';
        echo '<td>'.$row->publish.'</td>';
        echo '</tr>';
        }
        ?>
    </table>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

  </body>
</html>
