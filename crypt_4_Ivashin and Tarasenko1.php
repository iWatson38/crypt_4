<?php
session_start();
$_SESSION["array"] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crypt_4_Ivashin and Tarasenko1</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="login"></br>
        <input type="text" name="password"></br>
        <input type="submit" name="registration" value="Зарегистрироваться"></br>
    </form>
</body>
</html>
<?php
if (isset($_GET["registration"])) {
    if (isset($_GET["login"]) && isset($_GET["password"]) &&
    (string)$_GET["login"] != "" && (string)$_GET["password"] != "") {
        $start_time = microtime(true);
        $salt = bin2hex(openssl_random_pseudo_bytes(11));
        $hash = crypt((string)$_GET["password"], '$2y$10$'.$salt.'$');
        $_SESSION["array"] = $hash;
        $delta_time = microtime(true) - $start_time;
        $cash_time = round($delta_time * 1000000, 0).'мкс.';
        echo nl2br('crypt():</br> пароль - '.(string)$_GET["password"].',</br>соль - '.$salt.',</br>хеш - '.$hash.',</br>время вычисления - '.$cash_time."\n");
        echo "<a href=\"crypt_4_Ivashin and Tarasenko.php\">На главную</a></br>";
    }
}
?>