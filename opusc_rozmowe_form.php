<?php
include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$rozmowy=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm1=$rozmowy->zwroc_rozmowy_w_ktorych_uczestniczysz();



?>
<div id="form">
    <form action="opusc_rozmowe.php" method="post">
        <table>
            <tr>
                <td>Wybierz rozmowę którą chcesz opuścić:</td>
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
                <td><input type="submit" name="opusc" value="Upuść rozmowe"> </td>
            </tr>

        </table>
    </form>
</div>