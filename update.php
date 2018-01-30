<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Moscow');

$cookie = __DIR__.'/cookie.txt';

$code = $_GET['code'];
$type = $_GET['type'];
$token = $_GET['token'];

echo "<pre>";
print_r($code);
print_r($type);
print_r($token);
echo "</pre>";

$url = 'https://api.vk.com/method/appWidgets.update?code=return '.$code.';&type='.$type.'&access_token='.$token.'&v=5.71';

// echo date('g:i A', time() - 60);

echo "<pre>";
print_r(update($url));
echo "</pre>";

function update($url) {
	$ch = curl_init();
	$options = [
		CURLOPT_URL            => $url,
		CURLOPT_HEADER         => TRUE,
		CURLOPT_RETURNTRANSFER => FALSE,
		// CURLOPT_HTTPHEADER     => $header,
		// CURLOPT_FOLLOWLOCATION => TRUE,
		
		CURLOPT_COOKIEFILE     => 'cookie.txt',
		CURLOPT_COOKIEJAR      => 'cookie.txt',
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_SSL_VERIFYHOST => FALSE,
		
		CURLOPT_FORBID_REUSE   => TRUE,
		CURLOPT_FRESH_CONNECT  => TRUE
	];
	curl_setopt_array($ch, $options);
	$html = curl_exec($ch);
	if (curl_errno($ch)) print curl_error($ch);
		curl_close($ch);
	return $html;
}
?>