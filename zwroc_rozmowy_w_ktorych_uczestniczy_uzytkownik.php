<link rel="stylesheet" href="index.css">
<?php

include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$class=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm=$class->zwroc_rozmowy_w_ktorych_uczestniczysz();
//var_dump($zm);
echo '<div id="form1">';

if (is_array($zm))
{
    echo "<table border='2px' style='background: #0e24cd'>";
    echo "<tr>";
        echo "<td style='background: #7f53cd'>NAZWA SPOTKANIA</td>";
        echo "<td colspan='18' style='background: #7f53cd'>ROZMÓWCY</td>";
    echo "</tr>";

    foreach ($zm as $key=>$value)
    {
        echo "<tr>";
        echo "<td>".$value['name']."</td>";
        if(is_array($value['users']))
        {
            foreach ($value['users'] as $key1=>$value1)
            {
                echo "<td >".$value1."</td>";
            }
        }
        else
        {
            echo "<td>".$value['users']."</td>";
        }

        echo "</tr>";
    }
    echo "<table>";
}

else
{
    echo 'cos nie tak..';
}
echo '<div>';