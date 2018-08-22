<?php

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();

if(isset($_SESSION['EMAIL'])) {
    echo '<p><b>logged in: ' . h($_SESSION['EMAIL']) . '</b></p>';
    echo '<p><a href="./logout.php">logout</a></p>';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>phplogin001</title>
</head>
<body>
    <h1>phplogin001</h1>
    <h2>login</h2>
    <form action="login.php" method="post">
        <label for="email">email</label>
        <input type="email" name="email" />
        <label for="password">password</label>
        <input type="password" name="password" />
        <button type="submit">login</button>
    </form>
    <h2>register</h2>
    <form action="signup.php" method="post">
        <label for="email">email</label>
        <input type="email" name="email" />
        <label for="password">password</label>
        <input type="password" name="password" minlength="6" />
        <button type="submit">register</button>
    </form>
</body>
</html>