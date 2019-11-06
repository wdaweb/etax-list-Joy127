<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
 
<?php

    function totAward($year,$period){
        global $pdo;
        
        $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
        $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
              FROM `invoice`,`prizenum`
              WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                   (`invoice`.`number`=`prizenum`.`num1` OR
                    `invoice`.`number`=`prizenum`.`num2` OR
                    `invoice`.`number`=`prizenum`.`num3` or
                    `invoice`.`number`=`prizenum`.`num4` or
                    `invoice`.`number`=`prizenum`.`num5` OR
                    substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num3`,2,7) OR
                    substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num4`,2,7) OR
                    substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num5`,2,7) OR
                    substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num3`,3,6) OR
                    substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num4`,3,6) OR
                    substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num5`,3,6) OR
                    substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) OR
                    substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) OR
                    substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num5`,4,5) OR
                    substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num3`,5,4) OR
                    substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num4`,5,4) OR
                    substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num5`,5,4) OR
                    substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num3`,6,3) OR
                    substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num4`,6,3) OR
                    substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num5`,6,3) OR
                    substring(`invoice`.`number`,6,3)=`prizenum`.`num6` OR
                    substring(`invoice`.`number`,6,3)=`prizenum`.`num7`)"; 

        $row=$pdo->query($sql)->fetch(); 

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";

        while($row=$pdo->query($sql)->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['period'] . "</td>";
            echo "<td>" . $row['number'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

?>

</body>
</html>     