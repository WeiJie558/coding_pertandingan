<?php
    include("sambungan.php");
    include("urusetia_menu.php");
	if (isset($_POST["submit"])) {
		$idpasukan = $_POST["idpasukan"];

		$sql = "delete from pasukan where idpasukan = '$idpasukan' ";
		$result = mysqli_query($sambungan, $sql);	
		if ($result == true) {
			$bilrekod = mysqli_affected_rows($sambungan);
			if ($bilrekod > 0){
				echo"<script>alert('Berjaya padam.');</script>";
				echo "<script>window.location = 'pasukan_senarai.php';</script>";
			}
			else
				echo "Tidak berjaya padam. Rekod tidak ada dalam jadual.";
		}
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
    
    if (isset($_GET['idpasukan']))
		$idpasukan = $_GET['idpasukan'];
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">PADAM PASUKAN</h3>
<form class="panjang" action="pasukan_delete.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Pasukan</td>
            <td><input type="text" name="idpasukan" value = "<?php echo $idpasukan; ?>" readonly ></td>
        </tr>
    </table>
    <button class="padam" type="submit" name="submit">Padam</button>
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