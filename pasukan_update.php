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

		$sql = "update pasukan set 
				namapasukan = '$namapasukan',
				ketuapasukan = '$ketuapasukan', 
				kelas = '$kelas',
				idhakim = '$idhakim',
				idurusetia = '$idurusetia'
				where idpasukan = '$idpasukan' ";
		
		$result = mysqli_query($sambungan, $sql);
        if($result)
            echo "<script>alert('Berjaya kemas kini.');</script>";
        else
            echo "<script>alert('Tidak berjaya kemas kini.');</script>";
        echo "<script>window.location='pasukan_update.php';</script>";
	}

    
    if (isset($_GET['idpasukan']))
		$idpasukan = $_GET['idpasukan'];

	$sql = "select * from pasukan where idpasukan = '$idpasukan' ";
	$result = mysqli_query($sambungan, $sql);
	while($pasukan = mysqli_fetch_array($result)) {
		$ketuapasukan = $pasukan['ketuapasukan'];
		$kelas = $pasukan['kelas'];
		$namapasukan = $pasukan['namapasukan'];
		$idhakim = $pasukan['idhakim'];
		$idurusetia = $pasukan['idurusetia'];
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMAS KINI PASUKAN</h3>
<form class="panjang" action="pasukan_update.php" method="post" autocomplete="off">
    <table>
        <tr>
            <td class="warna">ID Pasukan</td>
            <td><input type="text" name="idpasukan" value= "<?php echo $idpasukan; ?>" readonly></td>
        </tr>
        <tr>
            <td class="warna">Nama Pasukan</td>
            <td><input type="text" name="namapasukan" value= "<?php echo $namapasukan; ?>" required></td>
        </tr>
        <tr>
            <td class="warna">Ketua Pasukan</td>
            <td><input type="text" name="ketuapasukan" value= "<?php echo $ketuapasukan; ?>" required></td>
        </tr>
        
        <tr>
            <td class="warna">Kelas</td>
            <td><input type="text" name="kelas" value= "<?php echo $kelas; ?>" placeholder="5W" pattern="[1-5]{1}[A-Z]{1}" title="Sila masukkan 1 nombor dan 1 huruf besar"
                oninvalid="this.setCustomValidity('Sila masukkan 1 nombor dan 1 huruf besar')" oninput = "this.setCustomValidity('')" required></td>
        </tr>
        
        <tr>
            <td class="warna">ID Hakim</td>
            <td>
                <select name="idhakim" required>
                    <?php
                        $sql = "select * from hakim";
                        $result = mysqli_query($sambungan, $sql);
                        while($hakim = mysqli_fetch_array($result)){
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
                        $result = mysqli_query($sambungan, $sql);
                        while($urusetia = mysqli_fetch_array($result)){
                            echo "<option value='$urusetia[idurusetia]'>$urusetia[idurusetia] ($urusetia[namaurusetia])</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form></td>

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