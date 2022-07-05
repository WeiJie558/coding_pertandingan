<?php                                           
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idhakim = $_POST["idhakim"];
		$namahakim = $_POST["namahakim"];
		$password = $_POST["password"];

		$sql = "update hakim set namahakim = '$namahakim', password='$password' where idhakim = '$idhakim' ";
			
	$result = mysqli_query($sambungan, $sql);
	if ($result == true){
		echo"<script>alert('Berjaya kemas kini.');</script>";
		echo "<script>window.location = 'hakim_senarai.php';</script>";
	}
	else
	echo "<script>alert('Tidak berjaya kemas kini.');</script>";
	echo "<script>window.location='hakim_update.php';</script>";
}

	if (isset($_GET['idhakim']))
			$idhakim = $_GET['idhakim'];

	$sql = "select * from hakim where idhakim = '$idhakim' ";
	$result = mysqli_query($sambungan, $sql);
	while($hakim = mysqli_fetch_array($result)) {
		$namahakim = $hakim['namahakim'];
		$password = $hakim['password'];
	}
?>


<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMAS KINI HAKIM</h3>
<form class="panjang" action="hakim_update.php" method="post" autocomplete="off">
    <table>
        <tr>
            <td class="warna">ID Hakim</td>
            <td><input type="text" name="idhakim" value= "<?php echo $idhakim; ?>" readonly ></td>
        </tr>
		<tr>
            <td class="warna">Nama Hakim</td>
            <td><input type="text" name="namahakim" value= "<?php echo $namahakim; ?>" required></td>
        </tr>
        <tr>
            <td class="warna">Password</td>
            <td><input type="password" name="password" placeholder="8 char" value= "<?php echo $password; ?>" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required></td>
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