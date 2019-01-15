<?php

$db = new mysqli("120.113.173.17","iroutine", "j;6u.40 #000000", "2018_ncyu_hackathon");
if ($db->connect_error) {
    die('無法連上資料庫：' . $db->connect_error);
}
$db->set_charset("utf8");

?>