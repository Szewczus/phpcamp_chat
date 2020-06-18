<link rel="stylesheet" href="index.css">
<?php
include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$name=$_POST['name'];
$class=new Curl("http://tank.iai-system.com/api/chat/create");
$zm=$class->stworz_rozmowe($name);

echo '<div id="form">';
if (is_array($zm))
{
    echo 'Stworzono nową rozmowe o tytule: '. $_POST['name'];
    echo ';)';
}
echo '<div>';