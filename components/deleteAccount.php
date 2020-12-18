<?php
require_once __DIR__ . '\sql.php';

$b_number = $_POST['b_number'];


$sql = $conn->query("SELECT amount FROM accounts WHERE b_number  = '$b_number'");
while ($row = $sql->fetch_assoc()) $u_amount = $row["amount"];

if($u_amount!= 0){
    echo 'Saskaita ne tuscia, todel negali buti istrinta.';
    return;
}

$conn->query("DELETE FROM accounts WHERE b_number='$b_number'");
echo 'Saskaita istrinta.';