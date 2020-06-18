<?php
include_once  'rejestracja_form.php';
try {
    $ch = curl_init("http://tank.iai-system.com/api/user/add");//inicjacja
    curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/user/add");//strna
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $login=$_POST['login'];
    $key=$_POST['password'];
    //$key=md5( $login. hash('sha256', $_POST['password']));
    $age=$_POST['age'];
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "login=$login&password=$key");//podalismy login i haslo

    $output = curl_exec($ch);
    $zm=json_decode($output, true);
    if(is_array($zm))
    {
        echo 'dodano uzytkownika o loginie: '.$zm['login'];
        echo "Rejestracja powiodła sie <br>   ";
        header('location: logowanie_form.php');
        //curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/user/verify");//strna
    }
    else
    {
        echo 'nie udalo sie dodac uzytkownika ten login istnieje już w bazie wybierz inny';

        //header('location: rejestracja_form.php');
        //echo $output;
    }

    curl_close($ch);//zaoknczylismy sesje
}
catch (Exception $e)
{
    var_dump($e);
}
?>