<?php

require_once('config.php');

session_start();

try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare('select * from userdata where email = ?');
    $stmt->execute([$_POST['email']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

if (!isset($row['email'])) {
    echo 'ng';
} else {
    if (password_verify($_POST['password'], $row['password'])) {
        session_regenerate_id(true);
        $_SESSION['EMAIL'] = $row['email'];
        echo 'ok';
    } else {
        echo 'ng';
    }
}
