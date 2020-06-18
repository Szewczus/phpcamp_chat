<link rel="stylesheet" href="index.css">

<?php
include_once 'strona_dla_zalogowanych.php';
$ch = curl_init("http://tank.iai-system.com/api/user/edit");//inicjacja
curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/user/edit");//strna
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "login=".$_SESSION['login']."&key=".$_SESSION['key']."&icon=".$_POST['icon']);//podalismy login i haslo

$output = curl_exec($ch);
$zm=json_decode($output, true);
//var_dump($zm);
if (is_array($zm))
{
    //echo '<h1 name="komunikat">pomyślnie udalo sie ustwić obrazek</h1>';
}

?>