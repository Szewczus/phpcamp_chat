<?php
class Curl
{
    public $ch;
    public function __construct($link)
    {
    $this->ch = curl_init($link);//inicjacja
    curl_setopt($this->ch, CURLOPT_URL, $link);//strna
    curl_setopt($this->ch, CURLOPT_HEADER, 0);
    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($this->ch, CURLOPT_POST, 1);

    }

    public function stworz_rozmowe($nazwa)
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,
            "login=".$_SESSION['login']."&key=".$_SESSION['key']."&name=".$nazwa);//podalismy login i haslo

        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }

    public function zwroc_rozmowy_w_ktorych_uczestniczysz()
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,
            "login=".$_SESSION['login']."&key=".$_SESSION['key']);//podalismy login i haslo

        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }

    function lista_aktywnych_uzytkonikow()
    {
        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }

    function leave($chat_id)
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,"login=".$_SESSION['login']."&key=".$_SESSION['key']."&chat_id=".$chat_id);//podalismy login i haslo
        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }

    function wyslij_wiadomosc($chat_id, $message)
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,"login=".$_SESSION['login']."&key=".$_SESSION['key']."&chat_id=".$chat_id."&message=".$message);//podalismy login i haslo
        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }
    function wyswietl_wiadmomosci()
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,"login=".$_SESSION['login']."&key=".$_SESSION['key']);//podalismy login i haslo
        $output = curl_exec($this->ch);
        $zm=json_decode($output, true);
        if (is_array($zm))
        {
            return $zm;
        }
        else
        {
            return 1;
        }
    }
}
?>