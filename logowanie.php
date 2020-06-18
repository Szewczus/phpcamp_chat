<?php
try {
    $ch = curl_init("http://tank.iai-system.com/api/user/verify");//inicjacja
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $login=$_POST['login'];
    $key=md5( $login. hash('sha256', $_POST['password'] ));
    //$age=$_POST['age'];
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "login=$login&key=$key");//podalismy login i haslo

    $output = curl_exec($ch);
    $zm=json_decode($output, true);
   //var_dump($zm);
    //echo "output:";
    //var_dump($output);
    if(is_array($zm))
    {
        /*curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, "'.$login.'");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "'.$key.'");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "hello");
        curl_setopt($ch, CURLOPT_COOKIEFILE, "'.$login.'");
        curl_setopt($ch, CURLOPT_COOKIEFILE, "'.$key.'");
        $output1 = curl_exec($ch);
        var_dump($output1);*/
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['key']=$key;
        echo 'dodano uzytkownika o loginie: '.$zm['login'];
        echo "Logowanie powiodlo sie <br>   ";
        header('location: strona_dla_zalogowanych.php');
    }
    else
    {
        include_once 'logowanie_form.php';
        echo 'nie udalo sie zalogowac';

    }

    curl_close($ch);//zaoknczylismy sesje
}
catch (Exception $e)
{
    var_dump($e);
}
?>