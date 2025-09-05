<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT Code Assistant</title>
</head>
<body>
    <h1>💡 ChatGPT Code Assistant</h1>
    <form method="POST" action="generate.php">
        <textarea name="prompt" rows="10" cols="80" placeholder="Enter a code prompt..."></textarea><br>
        <button type="submit">Generate Code</button>
    </form>

    <br><br>
    <a href="logout.php">🔒 Lock / Logout</a>

    <script src="js/lock.js"></script>
</body>
</html>
