<?php
// See the password_hash() example to see where this came from.
$password = 'admin';
$hash = '$2y$10$h0pxXUJNzlZ8.A9wXJRxM.D1ML2ktZFB/y4dqoGBzdxMytRZ.tfKS';

$hash2 = '$2y$10$gMJKYZUc1FKSZBnsONxLOebOHj.uuEWSiCP0jo4Zv0iAHBz6iz.NG';

if (password_verify('admin', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo "<br>";

if (password_verify('admin', $hash2)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo password_hash('admin', PASSWORD_DEFAULT);