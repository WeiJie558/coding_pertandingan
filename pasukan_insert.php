<?php
	include("sambungan.php");
	include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idpasukan = $_POST["idpasukan"];
		$namapasukan = $_POST["namapasukan"];
		$ketuapasukan = $_POST["ketuapasukan"];
		$kelas = $_POST["kelas"];
		$idhakim = $_POST["idhakim"];
		$idurusetia = $_POST["idurusetia"];

        $checksql = "SELECT * FROM pasukan WHERE idpasukan='$idpasukan'";	
        $checkresult = mysqli_query($sambungan, $checksql);
        if(mysqli_num_rows($checkresult)>=1){
            echo("<script>alert('ID pasukan ini telah daftar, sila masukkan ID pasukan lain.')</script>");
            echo "<script>window.location='pasukan_insert.php';</script>";
        }else{

            $sql = "insert into pasukan(idpasukan, namapasukan, ketuapasukan, kelas, idhakim, idurusetia) values('$idpasukan', '$namapasukan', '$ketuapasukan', '$kelas', '$idhakim', '$idurusetia')";

            $result = mysqli_query($sambungan, $sql);
            if($result)
                echo "<script>alert('Berjaya tambah.');</script>";
            else
                echo "<script>alert('Tidak berjaya tambah.');</script>";
            echo "<script>window.location='pasukan_insert.php';</script>";
        }
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH PASUKAN</h3>
<form class="panjang" action="pasukan_insert.php" method="post" autocomplete="off">
    <table>
        <tr>
           <td class="warna">ID Pasukan</td>
           <td><input required type = "text" 
           name = "idpasukan" placeholder = "Contoh : PA001" pattern="PA[0-9]{3}" title="Sila masukkan PA dan 3 nombor"
                oninvalid="this.setCustomValidity('Sila masukkan PA dan 3 nombor')" oninput = "this.setCustomValidity('')" required>
           </td>
        </tr>
        
        <tr>
            <td class="warna">Nama Pasukan</td>
            <td><input type="text" name="namapasukan" required></td>
        </tr>
        
        <tr>
            <td class="warna">Ketua Pasukan</td>
            <td><input type="text" name="ketuapasukan" required></td>
        </tr>
        
        <tr>
            <td class="warna">Kelas</td>
            <td><input type="text" name="kelas" placeholder = "Contoh : 5W" pattern="[1-5]{1}[A-Z]{1}" title="Sila masukkan 1 nombor dan 1 huruf besar"
                oninvalid="this.setCustomValidity('Sila masukkan 1 nombor dan 1 huruf besar')" oninput = "this.setCustomValidity('')" required></td>
        </tr>
        <tr>
            <td class="warna">ID Hakim</td>
            <td>  
                <select name="idhakim" required>
                <?php
                    $sql = "select * from hakim";
                    $data = mysqli_query($sambungan, $sql);
                    while ($hakim = mysqli_fetch_array($data)) {
                        echo "<option value='$hakim[idhakim]'>$hakim[idhakim] ($hakim[namahakim])</option>";
                    }
                ?>
                </select>
         	</td>
        </tr>
        <tr>
            <td class="warna">ID Urusetia</td>
            <td>  
                <select name="idurusetia" required>
                <?php
                    $sql = "select * from urusetia";
                    $data = mysqli_query($sambungan, $sql);
                    while ($urusetia = mysqli_fetch_array($data)) {
                        echo "<option value='$urusetia[idurusetia]'>$urusetia[idurusetia] ($urusetia[namaurusetia])</option>";
                    }
                ?>
                </select>
         	</td>
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