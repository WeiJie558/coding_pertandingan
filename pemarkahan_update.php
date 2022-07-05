<?php                                           
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idpemarkahan = $_POST["idpemarkahan"];
		$bilanganperlawanan = $_POST["bilanganperlawanan"];

		$sql = "update pemarkahan set bilanganperlawanan = '$bilanganperlawanan' where idpemarkahan = '$idpemarkahan' ";

		$result = mysqli_query($sambungan, $sql);
		if($result)
			echo "<script>alert('Berjaya kemas kini.');</script>";
		else
			echo "<script>alert('Tidak berjaya kemas kini.');</script>";
		echo "<script>window.location='pemarkahan_senarai.php';</script>";
	}

	if (isset($_GET['idpemarkahan']))
		$idpemarkahan = $_GET['idpemarkahan'];

	$sql = "select * from pemarkahan where idpemarkahan = '$idpemarkahan' ";
	$result = mysqli_query($sambungan, $sql);
	while($nilai = mysqli_fetch_array($result)) {
		$bilanganperlawanan = $nilai['bilanganperlawanan'];
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMAS KINI PEMARKAHAN</h3>
<form class="panjang" action="pemarkahan_update.php" method="post" autocomplete="off">
    <table>
        <tr>
            <td class="warna">ID Permakahan</td>
            <td><input type="text" name="idpemarkahan" value= "<?php echo $idpemarkahan; ?>" readonly></td>
        </tr>
        <tr>
            <td class="warna">Bilanagan Perlawanan</td>
            <td><input type="number" name="bilanganperlawanan" min="1" placeholder="1" value= "<?php echo $bilanganperlawanan; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
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