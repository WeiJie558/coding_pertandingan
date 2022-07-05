<?php
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idpemarkahan = $_POST["idpemarkahan"];
		$bilanganperlawanan = $_POST["bilanganperlawanan"];

        
        $checksql = "SELECT * FROM pemarkahan WHERE idpemarkahan='$idpemarkahan'";	
        $checkresult = mysqli_query($sambungan, $checksql);
        if(mysqli_num_rows($checkresult)>=1){
            echo("<script>alert('ID pemarkahan ini telah daftar, sila masukkan ID pemarkahan lain.')</script>");
            echo "<script>window.location='pemarkahan_insert.php';</script>";
        }else{

            $sql = "insert into pemarkahan values('$idpemarkahan', '$bilanganperlawanan')";

            $result = mysqli_query($sambungan, $sql);
            if($result==true)
                echo "<script>alert('Berjaya tambah.');</script>";
            else
                echo "<script>alert('Tidak berjaya tambah.');</script>";
            echo "<script>window.location='pemarkahan_insert.php';</script>";
        }
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH PEMARKAHAN</h3>
<form class="panjang" action="pemarkahan_insert.php" method="post" autocomplete="off">        
 <table>
    <tr>
        <td class="warna">ID Pemarkahan</td>
        <td><input type="text" name="idpemarkahan" placeholder = "Contoh : PEM001"  pattern="PEM[0-9]{3}" title="Sila masukkan PEM dan 3 nombor"
                oninvalid="this.setCustomValidity('Sila masukkan PEM dan 3 nombor')" oninput = "this.setCustomValidity('')" required></td>
    </tr>
    <tr>
        <td class="warna">Bilangan Perlawanan</td>
        <td><input type="number" name="bilanganperlawanan" min="1" placeholder="1" required></td>
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