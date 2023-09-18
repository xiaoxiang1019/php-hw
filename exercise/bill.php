<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <head>
        <title>結帳畫面</title>
        <?php
            session_start();
            if(isset($_SESSION['book']))
               {$book=$_SESSION['book'];}
            if(isset($_SESSION['cd']))
               {$cd=$_SESSION['cd'];}
            ?>
    </head>
</html>