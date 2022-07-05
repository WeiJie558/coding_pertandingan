<?php
    include("sambungan.php");
    include("urusetia_menu.php");
	if (isset($_POST["submit"])) {
		$idmurid = $_POST["idmurid"];

		$sql = "delete from murid where idmurid = '$idmurid' ";
		$result = mysqli_query($sambungan, $sql);	
		if ($result == true) {
			$bilrekod = mysqli_affected_rows($sambungan);
			if ($bilrekod > 0){
				echo"<script>alert('Berjaya padam');</script>";
				echo "<script>window.location = 'murid_senarai.php';</script>";
			}
			else
				echo "Tidak berjaya padam. Rekod tidak ada dalam jadual";
				echo "<script>window.location = 'murid_senarai.php';</script>";
		}
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
    
    if (isset($_GET['idmurid']))
		$idmurid = $_GET['idmurid'];
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">PADAM MURID</h3>
<form class="panjang" action="murid_delete.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Murid</td>
            <td><input type="text" name="idmurid" value = "<?php echo $idmurid; ?>" readonly></td>
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