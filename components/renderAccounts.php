<?php
require_once __DIR__ . '\sql.php';

$sql = $conn->query('SELECT * FROM accounts ORDER by lastname');
$nr = 0;
while ($row = $sql->fetch_assoc()) {
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $personal_id = $row['personal_id'];
    $b_number = $row['b_number'];
    $amount = number_format($row['amount'], 2, ',', '');
    $nr++;
echo "<div class='saskaita'>
<p>$nr.</p><p>$b_number</p> <p>$personal_id</p> <p>$firstname $lastname</p> <p>$amount</p> <p class='add'>+</p> <p class='close'>X</p>
</div>";
}