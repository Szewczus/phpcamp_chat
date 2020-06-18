
<link rel="stylesheet" href="index.css">
<?php
include_once 'strona_dla_zalogowanych.php';
echo "<div id='form'>";
//var_dump($_SESSION);
if(isset($_SESSION['login']) && isset($_SESSION['key']))
{
    echo '<h1>Formularz zmiany hasla dla uzytkownika o loginie: "'.$_SESSION['login'].'"</h1>';
    echo '<form action="zmianaHasla.php" method="post">';
    echo '
            <table>
            <tr>
                <td><label>Haslo: </label></td>
                <td><input type="password" name="password" id="haslo" class="haslo"> </td>
            </tr>
            <tr>
                <td><label>Powtórz hasło: </label></td>
                <td><input type="password" name="powtorz_haslo" id="powtorz_haslo"> </td>
            </tr>
            </table>
            

            <input type="submit" value="Zmień hasło" id="zmien" disabled> 
            <div id="koment">
            <p id="values"></p>
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
<script >
    document.getElementById('powtorz_haslo').addEventListener('input', function () {
        let dane1 ='1';
        let dane2='2';
        dane1 = document.getElementById('haslo').value;
        dane2 = document.getElementById('powtorz_haslo').value;
        if(dane1===dane2)
        {
            document.getElementById('powtorz_haslo').style.color='green';
            document.getElementById('zmien').removeAttribute('disabled');
        }
        else
        {
            document.getElementById('powtorz_haslo').style.color='red';
        }
    });
</script>
