
<link rel="stylesheet" href="index.css">
<form action='logowanie.php' method='POST'>
    <tr>
        <td>
            <label>Jeśli nie masz jeszcze konta to zarejestruj sie: </label>
        </td>
        <td>
            <a href='rejestracja_form.php'>tutaj</a><br>
        </td>
    </tr>
    <tr>
        <td>
            <label>Login: </label>
        </td>
        <td>
            <input type="text" name="login">
        </td>
    </tr>

    <tr>
        <td>
            <label>Haslo: </label>
        </td>
        <td>
            <input type="password" name="password">
        </td>
    </tr>
    <tr>
        <td><input type="submit" name="zaloguj" value="Zaloguj"></td>
    </tr>
</form>
