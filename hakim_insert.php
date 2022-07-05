<?php
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
	
		$idhakim = $_POST["idhakim"];
        $namahakim = $_POST["namahakim"];
		$password = $_POST["password"];

        $checksql = "SELECT * FROM hakim WHERE idhakim='$idhakim'";	
        $checkresult = mysqli_query($sambungan, $checksql);
        if(mysqli_num_rows($checkresult)>=1){
            echo("<script>alert('ID hakim ini telah daftar, sila masukkan ID hakim lain.')</script>");
            echo "<script>window.location='hakim_insert.php';</script>";
        }else{

        

            $sql = "insert into hakim values('$idhakim', '$namahakim', '$password')";
            $result = mysqli_query($sambungan, $sql);
            if ($result == true)
            echo"<script>alert('Berjaya tambah.');</script>";
            else
            echo "<script>alert('Tidak berjaya tambah.');</script>";
            echo "<script>window.location='hakim_insert.php';</script>";
        }
	}
?>


<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH HAKIM</h3>
<form class="panjang" action="hakim_insert.php" method="post" autocomplete="off">        
 <table>
    <tr>
        <td class="warna">ID Hakim</td>
        <td><input type="text" name="idhakim" placeholder = "Contoh : H001" pattern="H[0-9]{3}" title="Sila masukkan H dan 3 nombor" oninvalid="this.setCustomValidity('Sila masukkan H dan 3 nombor')" oninput = "this.setCustomValidity('')" required></td>
    </tr>
    <tr>
        <td class="warna">Nama Hakim</td>
        <td><input type="text" name="namahakim" required></td>
    </tr>
    <tr>
        <td class="warna">Password</td>
        <td><input type="password" name="password" placeholder="Sila masukkan 8 char" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required></td>
    </tr>
 </table>
 <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

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