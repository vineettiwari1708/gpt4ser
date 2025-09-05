<?php
require_once 'auth.php';
require_once 'config.php';

$prompt = $_POST['prompt'] ?? '';
if (!$prompt) {
    die("No prompt received.");
}

$data = [
    "model" => OPENAI_MODEL,
    "messages" => [
        ["role" => "system", "content" => SYSTEM_PROMPT],
        ["role" => "user", "content" => $prompt],
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . OPENAI_API_KEY
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("Request error: " . curl_error($ch));
}
curl_close($ch);

$responseData = json_decode($response, true);
$code = $responseData['choices'][0]['message']['content'] ?? '⚠️ No response from API.';
?>
<!DOCTYPE html>
<html>
<head><title>Generated Code</title></head>
<body>
    <h2>🧠 Generated Code</h2>
    <pre><?= htmlspecialchars($code) ?></pre>
    <br><a href="index.php">⬅ Back</a>
</body>
</html>
