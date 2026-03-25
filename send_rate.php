<?php

$bot_token = getenv('BOT_TOKEN');
$chat_id  = getenv('CHAT_ID');

$response = file_get_contents("https://api.exchangerate-api.com/v4/latest/USD");
$data = json_decode($response, true);

$lkr_rate = $data['rates']['LKR'];

$message = "💱 USD to LKR Today:\n1 USD = $lkr_rate LKR";

$url = "https://api.telegram.org/bot$bot_token/sendMessage";

file_get_contents($url . '?' . http_build_query([
    'chat_id' => $chat_id,
    'text' => $message
]));