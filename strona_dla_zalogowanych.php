<link rel="stylesheet" href="index.css">
<script type="text/javascript">

    document.getElementById('p1').style.color="red";
</script>
<?php
session_start();
//var_dump($_SESSION);
if(isset($_SESSION['login']) && isset($_SESSION['key'])) {
    ?>

    <style>
        ul {
            width: 100%;
            height: 200px;
            background: black;
        }

        li {
            width: 400px;
            text-decoration: none;
            display: inline-block;
            border: 2px solid dimgray;
            background: dimgray;
            font-family: cursive;
            text-align: center;
            border: 3px solid aqua;
            margin: 2px;
        }

        li a {
            color: white;
            text-decoration: none;
        }
        #link:hover
        {
            color: yellow;
            cursor: pointer;
        }
        li a:hover
        {
            color: yellow;
            cursor: pointer;
        }

    </style>
    <div >
        <ul>
            <li>

                <br>
                <?php
                $ch = curl_init("http://tank.iai-system.com/api/user/getAll");//inicjacja
                curl_setopt($ch, CURLOPT_URL, "http://tank.iai-system.com/api/user/getAll");//strna
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $output = curl_exec($ch);
                $zm=json_decode($output, true);
                if (is_array($zm))
                {
                    echo "<div id='form'>";
                    foreach ($zm as $item=>$value) {

                        if ((($value['login'])==$_SESSION['login']) && !empty($value['icon']) )
                        {
                            echo "<img src=".$value['icon']." max-width='300px' height='150px'>";

                        }
                    }
                    echo "</div>";
                }
                else
                {
                    echo "UPS cos poszło nie tak";
                }
                echo "<label>zalogowany jako: ".$_SESSION["login"]."</label>";?>
                <br>
                <a href="ustaw_obrazek_form.php" id="link">Ustaw obrazek</a>
            </li>
            <li>
                <a  href="wyloguj.php">Wyloguj</a>
            </li>

            <li>
                <a href="listaAktywnychUzytkownikow.php">Wyświetl aktywnych uzytkowniów </a>
            </li>

            <li>
                <a href="zmianaHasla_form.php">Zmien haslo </a>
            </li>
            <li>
                <a href="stwoz_rozmowe_form.php">Stwórz rozmowe</a>
            </li>
            <li>
                <a href="zwroc_rozmowy_w_ktorych_uczestniczy_uzytkownik.php">Wyświetl rozmowy w których uczestniczysz</a>
            </li>
            <li><a href="dodaj_uzytkoniwka_do_rozmowy_form.php">Dodaj usera</a> </li>
            <li><a href="opusc_rozmowe_form.php">Opuść rozmowe</a> </li>
            <li>
                <a href="wyslij_wiadomosc_fom.php">Wyślij wiadomość</a>
            </li>
            <li>
                <a href="wyswietl_wiadomosci_form.php">Wyświetl wiadomości</a>
            </li>

        </ul>
    </div>

    <?php
}
else
{
    echo "nie jestes zalogowany<br>";
    echo "zaloguj sie ";
    echo '<a href="logowanie_form.php">tutaj</a>';
}

?>