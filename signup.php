<?php
require_once('config.php');

try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    //echo phpinfo();
}

try {
    $email = $_POST['email'];
    $pword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("insert into userdata(email, password) value(?, ?)");
    $stmt->execute([$email, $pword]);
    echo 'ok';
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    echo 'ng';
}