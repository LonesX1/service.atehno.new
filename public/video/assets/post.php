<?php
    // проверка данных
    $order_name = $_POST['name'];
    $order_phone = $_POST['phone'];
    $description = $_POST['description'];

    // подготовка данных
    $task_name = 'Клиент ' . $order_name . ' оформил запрос на консультацию по установке видеонаблюдения.';

    $date = date("Y.m.d");

    $api_server = 'https://api.planfix.ru/xml/';
    $api_key = '899693dec81ded283dda868c1375ed71';
    $api_token = '6c36868f66115f4cd8cb77e8beff8d80';
    
    $requestXml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request method="task.add"><account>basm</account><sid></sid><task><template>1373585</template><title>' .  $task_name . '</title><description><![CDATA[<table style="width: 100%; padding: 20px; border: 1px solid #DEDEDE"><tr><td style="padding: 10px 20px;">Имя:</td><td style="padding: 10px 20px;">' . $order_name . '</td></tr><tr><td style="padding: 10px 20px;">Телефон:</td><td style="padding: 10px 20px;">' . $order_phone . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Подробности</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $description . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Дата и время</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $date . '</td></tr></table>]]></description><owner><id>75031</id></owner><importance>AVERAGE</importance><status>ACTIVE</status><workers><users><id>53995</id></users></workers></task></request>');

    $ch = curl_init($api_server);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $api_token);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXml->asXML());
    echo $requestXml->asXML();

    $response = curl_exec($ch);
    $error = curl_error($ch);
    // var_dump($error);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $responseBody = substr($response, $header_size);

    var_dump($response);
    curl_close($ch);

    header("Location: https://video.atehno.md/success");
?>