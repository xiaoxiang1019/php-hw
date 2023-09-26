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
        $link=@mysqli_connect('localhost','root','','107php');
        /*if(isset($link))
        {
            echo "成功";
        }
        else
        {
            echo "失敗";
        }*/
        $times=0;
        $num;
        $str="";
        
        if(isset($_POST['submit']))
        {
            for($i=0;$i<10;$i++)
            {
                $array=array();
                $numstr="";
                while(count($array)<3)
                {
                    $num=rand(1,9);
                    if(!in_array($num,$array))
                    {
                        $array[]=$num;
                    }
                }
                foreach($array as $a)
                {
                    $numstr.=$a;
                }
                if(abs($array[1]-$array[0])==abs($array[2]-$array[1]))
                {
                    $times++;
                    $str=$times." = ".$array[0].",".$array[1].",".$array[2];
                    echo $str;
                    echo "</br>";
                    $sqlturn="INSERT INTO `mydetail`(`id`, `turn`, `rec`)";
                    $sqlturn.="VALUES (NOW(),'$times','$numstr')";
                    if(mysqli_query($link,$sqlturn)){};
                    break;
                }
                else
                {
                    $times++;
                    $str=$times." = ".$array[0].",".$array[1].",".$array[2];
                    echo $str;
                    echo "</br>";
                    $sqlturn="INSERT INTO `mydetail`(`id`, `turn`, `rec`)";
                    $sqlturn.="VALUES (NOW(),'$times','$numstr')";
                    if(mysqli_query($link,$sqlturn)){};
                }
                sleep(0.1);
                
                continue;
            }
            echo "總共測試".$times."次或是找到數字";
            $sql="INSERT INTO `mymaster`(`id`, `freq`)"; 
            $sql.="VALUES (NOW(),'$times')";
            if(mysqli_query($link,$sql)){};
        }
        session_destroy();
        mysqli_close($link);
        ?>
    </haed>
</html>