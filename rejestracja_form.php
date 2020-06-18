<link rel="stylesheet" href="index.css">
<form action="api_rejestracja.php" method="POST">
    <tr>
        <td>
            <label>Login: </label>
        </td>
        <td>
            <input type="text" name="login" id="login1">
        </td>
    </tr>

    <tr>
        <td>
            <label>Haslo: </label>
        </td>
        <td>
            <input type="password" name="password" >
        </td>
    </tr>

    <tr>
        <td>
            <label>Wiek: </label>
        </td>
        <td>
            <input type="text" name="age" >
        </td>
    </tr>

    <tr>
        <td><input type="submit" name="rejestruj" value="rejestruj"></td>
    </tr>
</form>