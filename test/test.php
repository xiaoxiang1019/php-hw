<!doctype html>
<html>
    <haed>
        <meta charset="utf-8"/>
        <title>test</title>
        <body>
            <form name="form1" method="post" action="test.php">
            <input type="submit"name="submit" id="submit" value="提交">
            </form>
        </body>
        <?php
        session_start();
        
        $times=0;
        $num;
        $str="";
        if(isset($_POST['submit']))
        {
        for($i=0;$i<10;$i++)
        {
            $array=array();
            while(count($array)<3)
            {
                $num=rand(1,9);
                if(!in_array($num,$array))
                {
                    $array[]=$num;
                }
            }
            $_SESSION['array']=$array;
        if(abs($_SESSION['array'][1]-$_SESSION['array'][0]==abs($_SESSION['array'][2]-$_SESSION['array'][1])))
        {
            $times++;
            $str=$times." = ".$_SESSION['array'][0].",".$_SESSION['array'][1].",".$_SESSION['array'][2];
            echo $str;
            echo "</br>";
            break;
        }
        else
        {
            $times++;
            $str=$times." = ".$_SESSION['array'][0].",".$_SESSION['array'][1].",".$_SESSION['array'][2];
            echo $str;
            echo "</br>";
        }
        }
        echo "總共測試".$times."次或是找到數字";
        }
        ?>
    </haed>
</html>