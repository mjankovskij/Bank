<?php
require_once __DIR__ . '\sql.php';

if(empty($_POST['bNumber']) || empty($_POST['amount'])){
    echo json_encode(["error" => 'Neuzpildyti duomenis.']);
    return;
}

$bNumber = preg_replace('/[^0-9LT]/', '', $_POST['bNumber']);
$amount = preg_replace('/[^0-9-.,]/', '', $_POST['amount']);

if($bNumber!=$_POST['bNumber']){
    echo json_encode(["error" => 'Prasome pasitikslinti saskaitos numeri.']);
    return;
}

if($amount!=$_POST['amount'] || $amount<0){
    echo json_encode(["error" => 'Prasome pasitikslinti nuskaiciuojama suma.']);
    return;
}

// kableli i taska del visa ko, kad butu patogiau vartotojui
$amount = str_replace(',', '.', $amount);
// keiciam formata i 2 skaiciai po kablelio
$amount = number_format($amount, 2, '.', '');


$sql = $conn->query("SELECT amount FROM accounts WHERE b_number  = '$bNumber'");
if(!($sql->num_rows)){
    echo json_encode(["error" => 'Toks saskaitos numeris neegzistuoja.']);
    return;
}

while ($row = $sql->fetch_assoc()) $u_amount = $row["amount"];

if($u_amount-$amount<0){
    echo json_encode(["error" => 'Suma saskaitoj negali buti neigiama.']);
    return;
}

$conn->query("UPDATE accounts SET amount = amount - $amount WHERE b_number = '$bNumber'");

echo json_encode([
    "bNumber" => $bNumber,
    "amount" => $amount,
]);