<?php
require_once __DIR__ . '\sql.php';
// $mysqli->query("DELETE FROM sessions WHERE time<NOW()");

$sql = $conn->query("SELECT email FROM sessions WHERE value='" . $_COOKIE['ebank'] . "'");
while ($row = $sql->fetch_assoc()) {$email = $row['email'];}
$conn->query("DELETE FROM sessions WHERE email='$email'");
setcookie('ebank', $_COOKIE['ebank'], time(), "/");

header("Location: ../");