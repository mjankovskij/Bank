<?php
require_once __DIR__ . '\sql.php';

if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['personalId'])) {
    echo 'Prasome uzpildyti duomenis.';
    echo json_encode(["error" => 'Prasome uzpildyti duomenis.',]);
    return;
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$personalId = $_POST['personalId'];

if (
    $firstname != preg_replace('/[^A-Za-z]/', '', $firstname) ||
    $lastname != preg_replace('/[^A-Za-z]/', '', $lastname) ||
    $personalId != preg_replace('/[^0-9]/', '', $personalId)
) {
    echo json_encode(["error" => 'Prasome patikslinti duomenis.',]);
    return;
}

if (strlen($firstname) < 3 || strlen($lastname) < 3 || strlen($personalId) != 11) {
    echo json_encode(["error" => 'Varda ir pavarde turi sudaryti bent 3 simboliai, o asmens koda 11 simboliu.',]);
    return;
}

if (substr($personalId, 0, 1) > 6 ||  substr($personalId, 3, 2) > 12    ||  substr($personalId, 5, 2) > 31) {
    echo json_encode(["error" => 'Neteisingai ivestas asmens kodas.',]);
    return;
}


if (($conn->query("SELECT * FROM accounts WHERE personal_id='$personalId'")->num_rows)) {
    echo json_encode(["error" => 'Sis asmuo jau turi saskaita.',]);
    return;
}

$accountNumber = 'LT6010100' . sprintf('%011d', ($conn->query("SELECT * FROM accounts")->num_rows + 1));
$conn->multi_query("INSERT INTO accounts (firstname , lastname, personal_id, b_number) VALUES ('$firstname', '$lastname', '$personalId', '$accountNumber');");
echo json_encode([
    "firstname" => $firstname,
    "lastname" => $lastname,
    "personalId" => $personalId,
    "accountNumber" => $accountNumber,
]);
// echo "$firstname $lastname, kurio asm. kodas. $personalId. Banko saskaita sukurta, saskaitos nr.: $accountNumber";
