<!-- BETA USER email: admin@admin.lt password: admin -->
<!-- BETA USER email: admin@admin.lt password: admin -->
<!-- BETA USER email: admin@admin.lt password: admin -->
<!-- Nepamirskite sukurti duomenu bazes bank ir eksportuoti failu :) -->
<!-- By marek@jankovskij.lt -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lithuanian Bank</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $isConnected = false;
    require_once __DIR__ . '\components\sql.php';
    if (isset($_COOKIE['ebank'])) {
        $sql = $conn->query("SELECT value FROM sessions WHERE value='" . $_COOKIE['ebank'] . "'");
        if ($sql->num_rows) {
            $isConnected = true;
        }
    }
    if ($isConnected) {
    ?>
        <header>
            <h1>Lithuanian Bank</h1>
            <nav>
                <div class='link active'>Sąskaitų sąrašas</div>
                <div class='link'>Sąskaitos sukūrimas</div>
                <div class='link'>Pridėti lėšas</div>
                <div class='link'>Nuskaičiuoti lėšas</div>
                <a href='./components/logout.php'>
                    <div class='link'>Atsijungti</div>
                </a>
            </nav>
        </header>

        <div class='container'>
            <div class='row'>
                <!-- SARASAS -->
                <div class='box'>
                    <div class='saskaita'>
                        <p>Nr.</p>
                        <p>Saskaitos nr.</p>
                        <p>Asmens kodas</p>
                        <p>Vardas Pavarde</p>
                        <p>Likutis EUR</p>
                    </div>
                    <div class='accountsToFill'></div>
                </div>
                <!-- SUKURTI NAUJA SASKAITA -->
                <div class='box'>
                    <p>Sukurti nauja saskaita</p>
                    <form method='POST' id='create'>
                        <div class='label'>Vardas:</div>
                        <input type='text' id='firstname' name='firstname'>
                        <div class='label'>Pavarde:</div>
                        <input type='text' id='lastname' name='lastname'>
                        <div class='label'>Asmens kodas:</div>
                        <input type='text' id='personalId' name='personalId'>
                        <button id='create'>Sukurti</button>
                    </form>
                    <div class='callBack' id='createMessage'></div>
                </div>
                <!-- PRIDETI LESU -->
                <div class='box'>
                    <p>Pridėti lėšų</p>
                    <form method='POST' id='add'>
                        <div class='label'>Saskaitos nr:</div>
                        <input type='text' id='bNumber' name='bNumber'>
                        <div class='label'>Suma:</div>
                        <input type='text' id='amount' name='amount'>
                        <button id='add'>Prideti</button>
                    </form>
                    <div class='callBack' id='addMessage'></div>
                </div>
                <!-- nUIMTI LESU -->
                <div class="box">
                    <p>Nuskaičiuoti lėšų</p>
                    <form method='POST' id='minus'>
                        <div class='label'>Saskaitos nr:</div>
                        <input type='text' id='bNumber' name='bNumber'>
                        <div class='label'>Suma:</div>
                        <input type='text' id='amount' name='amount'>
                        <button id='minus'>Atimti</button>
                    </form>
                    <div class='callBack' id='minusMessage'></div>
                </div>
            </div>
        </div>
</body>
<script src="./js/main.js"></script>
<?php
    } else {
?>
    <div class='login'>
        <h1>Lithuanian Bank</h1>
        <form method='POST'>
            <label for='email'>Email:</label>
            <input type='text' id='email' name='email'>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password'>
            <div class='error'></div>
            <button>Login</button>
        </form>
    </div>
    </body>
    <script src="./js/offline.js"></script>
<?php
    }
?>

</html>
