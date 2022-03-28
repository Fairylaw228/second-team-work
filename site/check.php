<?php
$db_host='localhost'; // ваш хост
$db_name='db_file'; // ваша бд
$db_user='root'; // пользователь бд
$db_pass=''; // пароль к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

$result = $mysqli->query('SELECT * FROM `table_name`'); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    echo '<p>Запись id='.$row['id'].'. Текст: '.$row['text'].'</p>';// выводим данные
}
?>
