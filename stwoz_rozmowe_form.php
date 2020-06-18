<?php
include_once 'strona_dla_zalogowanych.php';

echo "<div id='form'>";
//var_dump($_SESSION);
if(isset($_SESSION['login']) && isset($_SESSION['key']))
{
    echo '<h1>Stwórz nową rozmowe '.$_SESSION['login'].'</h1>';
    echo '<form action="stworz_rozmowe.php" method="post">';
    echo '
        <table>
            <tr>
                <td><label>Nazwa rozmowy: </label></td>
                <td><input type="text" name="name" > </td>
            </tr>
        </table>


        <input type="submit" value="Utwórz rozmowe" >
        <div id="koment">
            <p id="values"></p>
        </div>
        ';

}
echo '</form>';
echo '</div>';