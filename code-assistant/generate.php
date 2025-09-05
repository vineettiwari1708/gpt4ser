<?php
require_once 'auth.php';
require_once 'config.php';
$api_key = "sk-...";  // Replace with your OpenAI API key
$prompt = $_POST['prompt'] ?? '';

if (!$prompt) {
    die("No prompt provided.");
}

$data = [
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "system", "content" => "You're a helpful coding assistant."],
        ["role" => "user", "content" => $prompt],
    ],
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $api_key,
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Request Error: " . curl_error($ch);
    exit;
}
curl_close($ch);

$responseData = json_decode($response, true);
$generated_code = $responseData['choices'][0]['message']['content'] ?? 'No response';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Generated Code</title>
</head>
<body>
    <h2>🧠 Response</h2>
    <pre><?= htmlspecialchars($generated_code) ?></pre>
    <a href="index.php">⬅ Back</a>
</body>
</html>
