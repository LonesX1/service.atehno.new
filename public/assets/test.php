<?php

$api_server = 'https://api.planfix.ru/xml/';
$api_key = 'APIKey-ВАШЕГО_ПРИЛОЖЕНИЯ';// 
$api_token = 'ТОКЕН_АВТОРИЗАЦИИ';

/** получаем список доступных нам проектов и выводим его
 * используем функции на: http://goo.gl/E41Vv
 */
$requestXml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request method="project.getList"><account></account></request>');

$requestXml->account = 'your_account';
$requestXml->pageCurrent = 1;
// остальные параметры являются необязательными, поэкспериментируйте сами

$ch = curl_init($api_server);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // не выводи ответ на stdout
curl_setopt($ch, CURLOPT_HEADER, 1);   // получаем заголовки
// не проверять SSL сертификат
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// не проверять Host SSL сертификата
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $api_token);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXml->asXML());
echo $requestXml->asXML();

$response = curl_exec($ch);
$error = curl_error($ch);
var_dump($error);

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$responseBody = substr($response, $header_size);

curl_close($ch);

var_dump($responseBody);
?>