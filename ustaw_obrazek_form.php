
<link rel="stylesheet" href="index.css">
<?php
echo '<div>';
include_once 'strona_dla_zalogowanych.php';
echo '</div>';

echo "<div id='form'>";
if(isset($_SESSION['login']) && isset($_SESSION['key']))
{
    echo '<h1>Formularz ustawiający zdjęcie dla użytkownika o loginie: "'.$_SESSION['login'].'"</h1>';
    echo '<form action="ustaw_obrazek.php" method="post">';
    echo '
            <table>
            <tr>
                <td><label>Wstaw adres URL do obrazka: </label></td>
                <td><input type="text" name="icon" id="icon" class="icon"> </td>
            </tr>
            </table>
            <input type="submit" value="Ustaw obrazek" id="ustaw" > 
            </div>
        ';
    echo '</form>';
}
else
{
    echo '<h1 style="font-family: cursive;">nie jesteś zalogowany napierw zaloguj sie</h1>';
    include_once 'logowanie_form.php';
}
echo "</div>";
?>
=
