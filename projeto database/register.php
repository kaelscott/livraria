<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Register</h1>
    <form name="form1" method="POST" action="register_php.php">

        <table align="center">
            <tr>
                <td style="width: 200; text-align: right;">
                    Login:
                </td>
                <td style="width: 400;">
                    <input type="text" name="txtLogin" style="width: 200">
                </td>
            </tr>

            <tr>
                <td style="text-align: right;">
                    Senha:
                </td>
                <td>
                    <input type="password" name="txtPassword" style="width: 200;">
                </td>
            </tr>

            <tr>
                <td colspan=2 style="text-align: center;">
                    <input type="submit" value="Registrar-se">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>