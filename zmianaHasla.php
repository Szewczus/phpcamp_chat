<link rel="stylesheet" href="index.css">

<?php

    include_once 'zmianaHasla_form.php';
    if($_POST['password']==$_POST['powtorz_haslo'])
    {
    $ch = curl_init("http://tank.iai-system.com/api/user/edit");//inicjacja
    curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/user/edit");//strna
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $key = $_POST['password'];
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "login=" . $_SESSION['login'] . "&key=" . $_SESSION['key'] . "&new_password=" . $_POST['password']);//podalismy login i haslo

    $output = curl_exec($ch);
    $zm = json_decode($output, true);
    var_dump($zm);
    if (is_array($zm)) {
        echo '<h1 name="komunikat">pomyślnie udalo sie zmienić haslo</h1>';

        session_destroy();
        header('location: logowanie_form.php');


    }
    else
     {
       echo "nie zmieniono hasla";
    }
    }
    else
     {
        header('location: zmianaHasla_form.php');
     }

?>