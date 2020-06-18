<?php
include_once 'strona_dla_zalogowanych.php';
    include_once 'Curl_class.php';
    $leave=new Curl('http://tank.iai-system.com/api/chat/leave');
    $rozmowy=new Curl('http://tank.iai-system.com/api/chat/getActive');
    $zm1=$rozmowy->zwroc_rozmowy_w_ktorych_uczestniczysz();
    echo '<div id="form">';
    //var_dump($zm1);

    foreach ($zm1 as $key=>$value)
    {
        if($value['name']==$_POST['nazwa_spotkania'])
        {
            $chat_id=$value['id'];
        }
    }
    $zm=$leave->leave($chat_id);
    echo "Opuściłeś rozmowe";
foreach ($zm1 as $key=>$value)
{
    if(empty($value['id'])==$chat_id)
    {
        $chat_id=$value['id'];
    }
}



?>