<?php
require_once __DIR__ . '\sql.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    echo 'Neivesti prisijungimo duomenis.';
    return;
}
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = $conn->query("SELECT * FROM employees WHERE email='$email'");
if ($sql->num_rows) {
    while ($row = $sql->fetch_assoc()) {
        // $id = $row["id"];
        $pass = $row["password"];
    }
    if (password_verify($_POST['password'], $pass)) {
        // Jei viska ivede teisingai.
        $value = sha1($email .  $password);
        setcookie('ebank', $value, (time()+86400*30), "/");
        $conn->multi_query("INSERT INTO sessions (email , value) VALUES ('$email', '$value');");
    } else {
        echo 'Neteisingi prisijungimo duomenis.';
        return;
    }
} else {
    echo 'Neteisingi prisijungimo duomenis.';
    return;
}
