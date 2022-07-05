<?php
session_start();
include ('sambungan.php');
if (isset($_POST['submit'])) {
    $idpengguna = $_POST['idpengguna'];
    $password = $_POST['password'];
    $jumpa = FALSE;
    if ($jumpa == FALSE) {
        $sql = "SELECT * FROM murid";
        $result = mysqli_query($sambungan, $sql);
        while($murid = mysqli_fetch_array($result)) {
            if ($murid['idmurid'] == $idpengguna && $murid["password"] == $password) {
                $jumpa = TRUE;
                $_SESSION['idpengguna'] = $murid['idmurid'];
                $_SESSION['nama'] = $murid['namamurid'];
                $_SESSION['status'] = 'murid';
                break;
            }
        }
    }

    if ($jumpa == FALSE) {
        $sql = "SELECT * FROM hakim";
        $result = mysqli_query($sambungan, $sql);
        while($hakim = mysqli_fetch_array($result)) {
            if ($hakim['idhakim'] == $idpengguna && $hakim["password"] == $password) {
                $jumpa = TRUE;
                $_SESSION['idpengguna'] = $hakim['idhakim'];
                $_SESSION['nama'] = $hakim['namahakim'];
                $_SESSION['status'] = 'hakim';
                break;
            }
        }
    }

    if ($jumpa == FALSE) {
        $sql = "SELECT * FROM urusetia";
        $result = mysqli_query($sambungan, $sql);
        while($urusetia = mysqli_fetch_array($result)) {
            if ($urusetia['idurusetia'] == $idpengguna && $urusetia["password"] == $password) {
                $jumpa = TRUE;
                $_SESSION['idpengguna'] = $urusetia['idurusetia'];
                $_SESSION['nama'] = $urusetia['namaurusetia'];
                $_SESSION['status'] = 'urusetia';
                break;
            }
        }
    }

    if ($jumpa == TRUE) {
        if ($_SESSION['status'] == 'murid')
        header("Location: murid_home.php");
        else if ($_SESSION['status'] == 'hakim')
        header("Location: hakim_home.php");
        else if ($_SESSION['status'] == 'urusetia')
        header("Location: urusetia_home.php");
    }
    else
        echo " <script>alert('Kesalahan pada username atau password.');
            window.location='login.php'</script>";
    }
?>

<html>
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="borang.css">
    <style>
        h1 {
            font-family : verdana;
        }
        input {
            border: 1px solid #5f6466;
        }
        body {
            background-image: url(imej/background.png);
            background-size: cover;
        }
    </style>
    <body>
        <center>
            <br>
            <h1>SELAMAT DATANG</h1>
            <h1>LAMAN WEB PERTANDINGAN BOLA KERANJANG</h1>
        </center>
        <h3 class="panjang">LOG IN</h3>
        <form class="panjang" action="login.php" method="post" autocomplete="off">
            <table>
            <tr>
                <td class="warna">ID Pengguna</td>
                <td><input type="text" name="idpengguna" placeholder="Contoh : M001" pattern="[MUH][0-9]{3}" title="Sila masukkan M/U/H dan 3 nombor"
                oninvalid="this.setCustomValidity('Sila masukkan M/U/H dan 3 nombor')" oninput = "this.setCustomValidity('')" required></td>
            </tr>
            <tr>
                <td class="warna">Password</td>
                <td><input type="password" name="password" placeholder = "Sila masukkan 8 char" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required></td>
            </tr>
            </table>
            <button class="login" type="submit" name="submit">Log In</button>
            <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
        </form>
    </body>
</html>

<br>
<center>
    <button class="biru"  onclick="tukar_warna(0)">Biru</button>
    <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
    <button class="merah" onclick="tukar_warna(2)">Merah</button>
    <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>

<script>
    function tukar_warna(n){
        var warna = ["Blue", "Green", "Red", "Black"];
        var teks = document.getElementsByClassName("warna");
        for(var i=0; i<teks.length; i++)
            teks[i].style.color=warna[n];
    }
</script>