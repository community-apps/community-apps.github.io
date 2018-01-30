<?php
// date_default_timezone_set('GMT');
date_default_timezone_set('America/New_York'); // 'Europe/Moscow'
// mb_internal_encoding('UTF-8'); 
header('Content-Type: text/html; charset=utf-8');
$cookie = __DIR__.'/cookie.txt';

$code = $_GET['code'];
$type = $_GET['type'];
$token = $_GET['token'];
$url = 'https://api.vk.com/method/appWidgets.update?code=return '.$code.';&type='.$type.'&access_token='.$token.'&v=5.71';

$header = array();
// $header[] = 'Host: www.instagram.com';
// $header[] = 'User-Agent: '.$_SERVER['HTTP_USER_AGENT'];
// $header[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:57.0) Gecko/20100101 Firefox/57.0';
// $header[] = 'Accept: */*';
// $header[] = 'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3';
// $header[] = 'Accept-Encoding: gzip, deflate, br';
// $header[] = 'Referer: https://www.instagram.com/';
// $header[] = 'X-CSRFToken: '.$token;
// $header[] = 'X-Instagram-AJAX: 1';
// $header[] = 'Content-Type: application/x-www-form-urlencoded';
// $header[] = 'X-Requested-With: XMLHttpRequest';
// $header[] = 'Content-Length: '.strlen(urldecode(http_build_query($userData)));
// $header[] = 'Cookie: mid=WgAQ2gAEAAHFXtYCa1tjuaZs45_i; datr=pq4ZWpf_fjH2ci-YuTHtEdnd; rur=ATN; urlgen="{\"time\": 1511631217\054 \"2001:19f0:0:1b::d085:26f8\": 20473}:1eJ01P:dxEZnZOSDd7P8SqedmenD3b3Sr4"; ig_vw=1680; ig_pr=1; ig_vh=938; ig_or=landscape-primary; csrftoken='.$result;
// $header[] = 'Cookie: csrftoken='.$token;
// $header[] = 'Proxy-Authorization: Basic YW1vcmFsb3Y6OFZud0c4azQ=';
// $header[] = 'Connection: keep-alive';

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