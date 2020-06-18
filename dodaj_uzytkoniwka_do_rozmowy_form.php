<?php
include_once 'strona_dla_zalogowanych.php';

echo "<div id='form'>";
include_once 'Curl_class.php';
$link1=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm=$link1->zwroc_rozmowy_w_ktorych_uczestniczysz();

$link2=new Curl('http://tank.iai-system.com/api/user/getAll');
$zm1=$link2->lista_aktywnych_uzytkonikow();

if(isset($_SESSION['login']) && isset($_SESSION['key']))
{
    if(is_array($zm)) {
        echo '<h1>Dodaj uzytkownika  o danym loginie do danej rozmowy</h1>';
        echo '<form action="dodaj_uzytkownika_do_rozmowowy.php" method="post">';
        echo '
        <table>
            <tr>
                <td>
                    <label>Nazwa rozmowy: </label>
                </td>
                <td>
                    <select name="name" >';
                    foreach ($zm as $key => $value)
                    {
                        echo "<option>".$value['name']."</option>";
                    }
                    echo '            
                    </select>
                </td>
            </tr>
            
            <tr>
                <td><label>Nazwa użytkownika którego chcesz dodać do rozmowy: </label></td>
                <td>
                    <select name="login">';
                        foreach ($zm1 as $key => $value)
                        {
                            echo "<option>".$value['login']."</option>";
                        }

        echo '      </<select>
                </td>
            </tr>
            
        </table>


        <input type="submit" value="Dodaj" >
        ';
    }
}
echo '</form>';