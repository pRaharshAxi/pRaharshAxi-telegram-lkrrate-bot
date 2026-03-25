<?php

$bot_token = "8699504125:AAF8EfkSdjWfdaJpa67uUuk97TDL6tf117Y";
$chat_id = "2141804755";

// Get exchange rate
$response = file_get_contents("https://api.exchangerate-api.com/v4/latest/USD");
$data = json_decode($response, true);

$lkr_rate = $data['rates']['LKR'];

// Message
$message = "💱 USD to LKR Rate Today:\n1 USD = " . $lkr_rate . " LKR";

// Send to Telegram
$url = "https://api.telegram.org/bot$bot_token/sendMessage";

$params = [
    'chat_id' => $chat_id,
    'text' => $message
];

file_get_contents($url . '?' . http_build_query($params));

echo "Message sent!";