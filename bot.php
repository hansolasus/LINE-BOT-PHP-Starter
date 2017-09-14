<?php
$access_token = '9yMdPYNqvDNlq2kYUwQUWkR0kw8X0XP6ZNc0NBQW0HT3jySqp2fBzg0PDqrM+Aben6jJYIxnY55RkUMuAenpmO8faNaWnsFR98kGfdDwSe+voIQgfG2Lw86oK3yDqpQDShq2kJQ4P8NhRLOLdjifjQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>