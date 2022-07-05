<?php
include('sambungan.php'); 
if(isset($_POST['idmurid'])) {    
    $idmurid = $_POST["idmurid"];
    $namamurid = $_POST["namamurid"];
    $password = $_POST["password"];

    $checksql = "SELECT * FROM murid WHERE idmurid='$idmurid'";  
    $checkresult = mysqli_query($sambungan, $checksql);
    if(mysqli_num_rows($checkresult)>=1){
        echo("<script>alert('ID murid ini telah daftar, sila log in.')</script>");
        echo "<script>window.location='login.php';</script>";
    }else{

        $sql = "insert into murid(idmurid, namamurid, password) values('$idmurid', '$namamurid', '$password')";
        $result = mysqli_query($sambungan, $sql);
        if ($result)
            echo "<script>alert('Berjaya sign up.')</script>";
        else 
            echo "<script>alert('Tidak berjaya sign up.')</script>";
        echo "<script>window.location='login.php'</script>";
    }
}?>


<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<style>
    div#content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -70%);
    }
    body {
        background-image: url(imej/background.png);
        background-size: cover;
    }
</style>
<body>

<div id="content">
    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post" autocomplete="off">
    <table>
        <tr>
           <td class="warna">ID Murid</td>
           <td><input type="text" name="idmurid" placeholder = "Contoh : M001" pattern="M[0-9]{3}" title="Sila masukkan M dan 3 nombor"
                oninvalid="this.setCustomValidity('Sila masukkan M dan 3 nombor')" oninput = "this.setCustomValidity('')" required></td>
           
        </tr>
        <tr>
            <td class="warna">Nama Murid</td>
            <td><input type="text" name="namamurid" required></td>
        </tr>
        
        <tr>
            <td class="warna">Password</td>
            <td><input type="password" name="password" placeholder = "Sila masukkan 8 char" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required></td>
        </tr>
        
    </table>
    <button class="tambah" type="submit">Daftar</button>
    <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
</form>
<br>
<center>
    <button class="biru"  onclick="tukar_warna(0)">Biru</button>
    <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
    <button class="merah" onclick="tukar_warna(2)">Merah</button>
    <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>
</div>
<!-- Data validation
    pattern
    placeholder
    title
    oninput
    oninvalid
    required / readonly
 -->


<script>
    function tukar_warna(n){
        var warna = ["Blue", "Green", "Red", "Black"];
        var teks = document.getElementsByClassName("warna");
        for(var i=0; i<teks.length; i++)
            teks[i].style.color=warna[n];
    }
</script>
</body>