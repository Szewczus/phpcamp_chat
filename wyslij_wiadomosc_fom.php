<?php
include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$leave=new Curl('http://tank.iai-system.com/api/chat/leave');
$rozmowy=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm1=$rozmowy->zwroc_rozmowy_w_ktorych_uczestniczysz();


?>
<div id="form">
    <form action="wyslij_wiadomosc.php" method="post">
        <h1>Wyślij wiadmość do użytkownika:</h1>
        <table border="2px">
            <tr>
                <td><label>Podaj nazwę rozmowy: </label></td>
                <td>
                    <?php
                    echo '<select name="nazwa_spotkania">';
                    foreach ($zm1 as $key=>$value)
                    {

                        echo "<option>".$value['name']."</option>";

                    }echo '</select>';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Napisz widomość: </label>
                </td>
                <td>
                    <input type="text" name="message">
                </td>
            </tr>
        </table>
        <input type="submit" value="Wyslij wiadomość" name="wyslij">


    </form>