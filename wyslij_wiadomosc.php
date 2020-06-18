
<?php
include_once 'wyslij_wiadomosc_fom.php';
include_once 'Curl_class.php';
$leave=new Curl('http://tank.iai-system.com/api/chat/leave');
$rozmowy=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm1=$rozmowy->zwroc_rozmowy_w_ktorych_uczestniczysz();
        include_once 'Curl_class.php';
        $wiadomosc_obj=new Curl('http://tank.iai-system.com/api/chat/send');
        @$wiadomosc=$_POST['message'];
        $chat_id='';

        echo '<div id="form1" >';

        foreach ($zm1 as $key=>$value)
        {
            if($value['name']==$_POST['nazwa_spotkania'])
            {
                $chat_id=$value['id'];
            }
        }
        echo $chat_id;
        $wiadomosc_obj->wyslij_wiadomosc($chat_id, $wiadomosc);
        include_once 'Curl_class.php';
        $class=new Curl('http://tank.iai-system.com/api/chat/get');
        $zm=$class->wyswietl_wiadmomosci();

foreach ($zm as $key => $value)
{
    if (is_array($value))
    {
        foreach ($value as $key2 => $value2)
        {
            //echo $value2['chat_id'];
            if($value2['chat_id']==$chat_id)
            {
                echo "<table border='2px' >";
                echo "<tr>";
                echo "<td>";
                echo $value2['login'];
                echo "</td>";
                echo "<td>";
                echo $value2['message'];
                echo "</td>";
                echo "</tr>";
                echo "</table>";
            }

        }

    }

}



        ?>

</div>


