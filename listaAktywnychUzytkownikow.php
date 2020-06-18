<?php

include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$class=new Curl('http://tank.iai-system.com/api/user/getAll');
$zm=$class->lista_aktywnych_uzytkonikow();

if (is_array($zm))
{
    echo "<div id='form1' style='width: 60%'>";
    echo "<table border='2px' width='800px' style='text-align: center'>";
    echo "<tr>";
    echo "<td>";
    echo 'login';
    echo "</td>";
    echo "<td>";
    echo 'status';
    echo "</td>";
    echo "</tr>";
    foreach ($zm as $item=>$value) {
        echo "<tr>";
            echo "<td>";
                echo $value['login'];
            echo "</td>";
            echo "<td>";
                echo $value['status'];
            echo "</td>";
            echo "<td>";
                if(!empty($value['icon']))
                {
                    echo '<img src="'.$value['icon'].'" height="100px" >';
                }
                else
                {
                    //echo 'brak';
                    echo '<img src="https://imast.in/wp-content/uploads/2019/11/user-dummy-pic.png" height="100px">';
                }
            echo "</td>";

        echo "</tr>";


    }
    echo "<table>";
    echo "</div>";
}
else
    {
        echo "UPS cos poszło nie tak";
    }
//echo "</div>";

?>

