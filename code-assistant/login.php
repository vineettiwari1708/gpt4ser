<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if ($password === ASSISTANT_PASSWORD) {
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "❌ Invalid password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>🔐 Login to Assistant</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="password" name="password" placeholder="Enter password" required />
        <button type="submit">Login</button>
    </form>
</body>
</html>
