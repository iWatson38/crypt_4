<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crypt_4_Ivashin and Tarasenko2</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="login"></br>
        <input type="text" name="password"></br>
        <input type="submit" name="signin" value="Войти"></br>
    </form>
</body>
</html>
<?php
if (isset($_GET["signin"])) {
    if (isset($_GET["login"]) && isset($_GET["password"]) &&
    (string)$_GET["login"] != "" && (string)$_GET["password"] != "") {
        $password = (string)$_GET["password"];
        $new_salt = substr($_SESSION["array"], 0, 29 );
        $new_hash = crypt($password, $new_salt.'$');
        echo nl2br('пароль - '.(string)$_GET["password"].',</br>соль с префиксом $2y$ и весовым параметром интераций - '.$new_salt.',</br>новый хеш - '.$new_hash."\n\n");
        if ($_SESSION["array"] == $new_hash) {
            echo 'Вход выполнен</br>';
            echo "<a href=\"crypt_4_Ivashin and Tarasenko.php\">На главную</a></br>";
        }
        else {
            echo 'Пароль неправильный!</br>';
            echo "<a href=\"crypt_4_Ivashin and Tarasenko.php\">На главную</a></br>";
        }
    }
}
?>