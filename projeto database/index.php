<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Login</h1>
    <form name="form1" method="POST" action="login_php.php">
        <table align="center">
            <tr>
                <td style="width: 200; text-align: right;">
                    Login:
                </td>
                <td style="width: 200;">
                    <input type="text" name="txtLogin" style="width: 100%;">
                </td>
            </tr>

            <tr>
                <td style="width: 200; text-align: right;">
                    Senha:
                </td>
                <td style="width: 200;">
                    <input type="password" name="txtPassword" style="width: 100%;">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Enviar">
                    <button type="button"><a href="register.php" style="text-decoration: none; color: inherit;">Register</a></button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>