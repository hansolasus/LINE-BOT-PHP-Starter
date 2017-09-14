<?php
$access_token = '9yMdPYNqvDNlq2kYUwQUWkR0kw8X0XP6ZNc0NBQW0HT3jySqp2fBzg0PDqrM+Aben6jJYIxnY55RkUMuAenpmO8faNaWnsFR98kGfdDwSe+voIQgfG2Lw86oK3yDqpQDShq2kJQ4P8NhRLOLdjifjQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$msgCount = strlen($text);
			if (strpos($text, 'สุดา') !== false) { // note: three equal signs
				$text = 'สุดาแก่มาก!!!!';
			}else if(strpos($text, 'แบงค์') !== false){
				$text = 'แบงค์หน้าตาดีมาก!!!!';
			}else if(strpos($text, 'เก่ง') !== false){
				$text = 'เก่งขี้เหล้าจัง!!!!';
			}else if(strpos($text, 'แจง') !== false){
				$text = 'แจงไม่สวยเลย!!!!';
			}else if(strpos($text, 'ตุ้ย') !== false){
				$text = 'ครางชื่อตุ้ยหน่อย!!!!';
			}else if(strpos($text, 'มด') !== false){
				if($msgCount % 2 == 0){
					$text = 'มดดำเป็นตอตะโก!!!!';
				}else{
					$text = 'มดดำตับเป็ด!!!!';
				}
			}else if(strpos($text, 'ต้อม') !== false){
				$text = 'พี่ต้อมผู้ใหญ่ใจดี ชอบเลี้ยงน้องๆ';
			}else{
				$text = '';
			}
			
			if($text != ''){
				// Get replyToken
				$replyToken = $event['replyToken'];

				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			}
			
		}
	}
}
echo "OK";
?>