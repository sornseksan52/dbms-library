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

    <?php echo form_open('/home/queryResult/delete'); ?>
    <select size ="1" name="criteria">
        <option value='bookname'>書刊名</option>
        <option value='author'>作者名稱</option>
        <option value='publish'>出版年份</option>
    </select>
    <input name = "search" type="text" class="search-query" placeholder="Search">
    <button type="submit" class="btn">搜尋</button>
    </form>


    <?php echo form_open('/manager/deleteBooks'); ?>
    <fieldset>
        <legend>刪除書籍</legend>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>是否刪除</th>
                <th>書刊名</th>
                <th>作者名稱</th>
                <th>狀態</th>
                <th>出版年份</th>
            </tr>

<?php
            if(is_array($query)){
                foreach($query as $row){
                    if(!in_array($row->number,$nonava)){
                        echo '<tr class = "warning">';
                    echo '<td><input type="checkbox" name=delete_books[] value ='. "'$row->number'" .'/></td>';
                    }else{
                        echo '<tr class = "success">';
                        echo '<td>借出中</td>';
                    }
                    echo '<td>'.$row->bookname.'</td>';
                    echo '<td>'.$row->author.'</td>';
                    echo '<td>'.$row->state.'</td>';
                    echo '<td>'.$row->publish.'</td>';
                    echo '</tr>';
                }
            }
?>
    </table>
    <button type="submit" class="btn btn-danger">確定刪除</button>
    </fieldset>
    </form>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='<?=base_url().'bootstrap/js/bootstrap.js'?>'></script>

  </body>
</html>

