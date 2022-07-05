<?php                                                                         
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idhakim = $_POST["idhakim"];

		$sql = "delete from hakim where idhakim = '$idhakim' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true) {
			$bilrekod = mysqli_affected_rows($sambungan);
			if ($bilrekod > 0){
				echo"<script>alert('Berjaya padam');</script>";
				echo "<script>window.location = 'hakim_senarai.php';</script>";
			}
			else
				echo"<script>alert('Tidak berjaya padam. Rekod tidak ada dalam jadual');</script>";
		}
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}
	
	if (isset($_GET['idhakim']))
		$idhakim = $_GET['idhakim'];
?>


<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">PADAM HAKIM</h3>
<form class="panjang" action="hakim_delete.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Hakim</td>
            <td><input type="text" name="idhakim" value = "<?php echo $idhakim; ?>" readonly ></td>
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