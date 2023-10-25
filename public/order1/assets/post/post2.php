<?php
    // проверка данных
    $order_code = $_POST['code'];
    // $order_type = $_POST['type'];

    // подготовка данных
    $task_name = 'Выдача заказа клиенту ' . $order_code;

    $date = date("Y.m.d");

    $api_server = 'https://api.planfix.ru/xml/';
    $api_key = '899693dec81ded283dda868c1375ed71';
    $api_token = '6c36868f66115f4cd8cb77e8beff8d80';
  
    $requestXml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>
    <request method="task.getList">
    <account>basm</account>
    <sid></sid>
    <target></target>
    <project>
    <id>75079</id>
    </project>
    <filter>ACTIVE</filter>
    <filters>
    <filter>
    <type>8</type>
    <operator>equal</operator>
    <value>' . $order_code . '</value>
    <field></field>
    </filter>
    </filters>
    </request>');

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

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $responseBody = substr($response, $header_size);
    curl_close($ch);

    // echo $response;

    $response = simplexml_load_string($responseBody);
    $count = $response->tasks[0]->attributes()->totalCount;

    // echo $count;

    if ($count == 0) {
        addTask();
        echo "Приняли в работу! Ожидайте выдачи заказа!";
    } else {
        echo "Задача уже создана, ожидайте!";
    }

    function addTask() {

        $order_code = $_POST['code'];
        $task_name = 'Выдача заказа клиенту ' . $order_code;
        $date = date("Y.m.d");

        $api_server = 'https://api.planfix.ru/xml/';
        $api_key = '899693dec81ded283dda868c1375ed71';
        $api_token = '6c36868f66115f4cd8cb77e8beff8d80';
    
        $requestXml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>
        <request method="task.add">
        <account>basm</account>
        <sid></sid><task>
        <template>1531811</template>
        <title>' .  $task_name . '</title>
        <description>Номер заказа: '.$order_code.'</description>
        <owner><id>75031</id></owner>
        <importance>AVERAGE</importance>
        <status>ACTIVE</status>
        </task></request>');

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

        $response = curl_exec($ch);
        $error = curl_error($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $responseBody = substr($response, $header_size);

        echo $response;
    }
?>