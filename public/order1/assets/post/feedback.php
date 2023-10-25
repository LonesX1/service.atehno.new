<?php
    $order_code = $_POST['code'];

    // connection
    $db_host     = "95.217.53.14";
    $db_username = "atehno";
    $db_password = "4PFa{RDZ9BaW";
    $database_table = "atehnomd_new";

    $connection = new mysqli($db_host, $db_username, $db_password, $database_table);

    // check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // get data
    $sql = "select * from orders where id_order='" . $order_code . "'";
    $result = mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();

    echo "<h1>Заказ: " . $row['id_order'] . "</h1>";
    echo "<table class='result-table' cellspacing='0'>";
    echo "<tr><td class='row-name'>Дата</td><td>" . $row['order_date'] . "</td></tr>";
    echo "<tr><td class='row-name'>Имя</td><td>" . $row['order_user_name'] . "</td></tr>";
    echo "<tr><td class='row-name'>Почта</td><td>" . $row['order_user_email'] . "</td></tr>";
    echo "<tr><td class='row-name'>Телефон</td><td>" . $row['order_user_phone'] . "</td></tr>";
    echo "<tr><td class='row-name'>Адрес доставки</td><td>" . $row['order_user_address'] . "</td></tr>";
    echo "<tr><td class='row-name'>Метод доставки</td><td>" . $row['order_user_address'] . "</td></tr>";
    echo "<tr><td class='row-name'>Способ оплаты</td><td>" . $row['order_user_address'] . "</td></tr>";
    echo "<tr><td class='row-name'>Пояснение</td><td>" . $row['order_user_address'] . "</td></tr>";
    echo "<tr><td class='row-name'>Статус заказа</td><td>" . $row['order_status'] . "</td></tr>";
    echo "</table>";
?>