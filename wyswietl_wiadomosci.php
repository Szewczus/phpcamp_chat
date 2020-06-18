<?php
include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$class=new Curl('http://tank.iai-system.com/api/chat/get');
$zm=$class->wyswietl_wiadmomosci();
$loginy=[];
$message=[];
$i=0;
foreach ($zm as $key => $value)
{
    if(is_array($value))
    {
        foreach ($value as $key2 =>$value2)
        {
                $loginy[$i]=$value2['login'];
                $message[$i]=$value2['message'];
        $i++;
        }
    }
    else
    {

    }

}
$i=0;
echo "<div id='form1'> ";
foreach ($loginy as $key=>$val)
{
    echo "<table border='3px' width='1000px'>";
        echo "<tr>";
            echo "<td>".$loginy[$i]."</td>";
            echo "<td>".$message[$i]."</td>";
        echo "</tr>";
    echo "</table>";
    $i++;
}
echo "</div>";
?>