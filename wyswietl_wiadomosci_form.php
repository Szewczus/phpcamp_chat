
<?php
include_once 'strona_dla_zalogowanych.php';
include_once 'Curl_class.php';
$class=new Curl('http://tank.iai-system.com/api/chat/getActive');
$zm=$class->zwroc_rozmowy_w_ktorych_uczestniczysz();
$class2=new Curl('http://tank.iai-system.com/api/chat/get');
$zm1=$class2->wyswietl_wiadmomosci();
echo "<div id='form1'>";
//var_dump($zm1);
//echo "<br>";
//echo "<br>";
//echo "<br>";
//echo "<br>";
//var_dump($zm);
?>
<form action="wyswietl_wiadomosci_form.php" method="post">
    <table>
        <tr>
            <td>
                <?php
                    foreach ($zm as $key=>$value)
                    {
                        $id=$value['id'];

                        echo "<button name='przycisk' value='$id'>".$value['name']."</button>";
                        echo "<div id='chat'></div>";
                    }
                ?>
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['przycisk']))
{
    $id_chat= $_POST['przycisk'];
    echo $id_chat;

    foreach ($zm1 as $key => $value)
    {
        //var_dump($value);
        if (is_array($value)) {
        foreach ($value as $key2 => $value2)
        {
            //echo $value2['chat_id'];
            if($value2['chat_id']==$id_chat)
            {
                echo "<table border='2px'>";
                    echo "<tr>";
                        echo "<td>";
                            echo $value2['login'];
                        echo "</td>";
                        echo "<td>";
                            echo $value2['message'];
                        echo "</td>";
                echo "</tr>";
                echo "</table>";
            }
            //var_dump($value2);
            //echo $value2['id_chat'];
            //echo $value2['login'];
            //echo $value2['message'];

        }

        }

    }
}
echo "</div>";
?>