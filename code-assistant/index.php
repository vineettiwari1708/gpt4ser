<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Code Assistant</title>
</head>
<body>
    <h1>💡 ChatGPT Code Assistant</h1>
    <form method="POST" action="generate.php">
        <textarea name="prompt" rows="10" cols="80" placeholder="Enter your code prompt here..."></textarea><br>
        <button type="submit">Generate Code</button>
    </form>
    <script src="js/lock.js"></script>
</body>
</html>
