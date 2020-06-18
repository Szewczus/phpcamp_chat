<link rel="stylesheet" href="index.css">
<?php
include_once 'strona_dla_zalogowanych.php';
$ch = curl_init("http://tank.iai-system.com/api/chat/join");//inicjacja
curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/chat/join");//strna
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

include_once 'Curl_class.php';
$link=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm1=$link->zwroc_rozmowy_w_ktorych_uczestniczysz();
//var_dump($zm1);

if(is_array($zm1))
{
    foreach ($zm1 as $key=>$value)
    {
        if($value['name']==$_POST['name'])
        {
            $id=$value['id'];

        }
    }

    curl_setopt($ch, CURLOPT_POSTFIELDS, "login=".$_SESSION['login']."&key=".$_SESSION['key']."&user=".$_POST['login']."&chat_id=".$id);//podalismy login i haslo

    $output = curl_exec($ch);
    $zm=json_decode($output, true);
    echo '<div id="form">';
    if (is_array($zm))
    {
        //var_dump($zm);
        echo 'Dodano uzytkownika o loginie: '.$_POST['login'] .' do rozmowy  o tytule: '. $_POST['name'];
    }
    else
        {
            echo $zm;
        }
    echo '</div>';
}