<?php
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idurusetia = $_POST["idurusetia"];
		$namaurusetia = $_POST["namaurusetia"];
		$password = $_POST["password"];

		$sql = "update urusetia set namaurusetia = '$namaurusetia', password='$password' where idurusetia = '$idurusetia' ";

		$result = mysqli_query($sambungan, $sql);
		if($result==true)
			echo "<script>alert('Berjaya kemas kini.');</script>";
		else
			echo "<script>alert('Tidak berjaya kemas kini.');</script>";
		echo "<script>window.location='urusetia_senarai.php';</script>";
	}


	if (isset($_GET['idurusetia']))
		$idurusetia = $_GET['idurusetia'];

	$sql = "select * from urusetia where idurusetia = '$idurusetia' ";
	$result = mysqli_query($sambungan, $sql);
	while($urusetia = mysqli_fetch_array($result)) {
		$namaurusetia = $urusetia['namaurusetia'];
		$password = $urusetia['password'];
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMAS KINI URUSETIA</h3>
<form class="panjang" action="urusetia_update.php" method="post" autocomplete="off">
    <table>
        <tr>
            <td class="warna">ID Urusetia</td>
            <td><input type="text" name="idurusetia" value= "<?php echo $idurusetia; ?>" readonly></td>
        </tr>
        <tr>
            <td class="warna">Nama Urusetia</td>
            <td><input type="text" name="namaurusetia" value= "<?php echo $namaurusetia; ?>"  required></td>
        </tr>
        <tr>
            <td class="warna">Password</td>
            <td><input type="password" name="password" placeholder="Sila masukkan 8 char" value= "<?php echo $password; ?>" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required></td>
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