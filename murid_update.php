<?php
    include("sambungan.php");
    include("urusetia_menu.php");

	if (isset($_POST["submit"])) {
		$idmurid = $_POST["idmurid"];
		$namamurid = $_POST["namamurid"];
		$password = $_POST["password"];

		$sql = "update murid set namamurid = '$namamurid', password = '$password' where idmurid = '$idmurid'";
		
		$result = mysqli_query($sambungan, $sql);
		if ($result == true){
			echo"<script>alert('Berjaya kemas kini.');</script>";
			echo "<script>window.location = 'murid_senarai.php';</script>";
		}
		else
		echo "<script>alert('Tidak berjaya kemas kini.');</script>";
		echo "<script>window.location='murid_update.php';</script>";
	}

    
    if (isset($_GET['idmurid']))
		$idmurid = $_GET['idmurid'];

	$sql = "select * from murid where idmurid = '$idmurid' ";
	$result = mysqli_query($sambungan, $sql);
	while($murid = mysqli_fetch_array($result)) {
		$password = $murid['password'];
		$namamurid = $murid['namamurid'];
		
	}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMAS KINI MURID</h3>
<form class="panjang" action="murid_update.php" method="post" autocomplete="off">
    <table>
        <tr>
            <td class="warna">ID Murid</td>
            <td><input type="text" name="idmurid" placeholder="Contoh : M001" value= "<?php echo $idmurid; ?>" readonly></td>
        </tr>
        <tr>
            <td class="warna">Nama Murid</td>
            <td><input type="text" name="namamurid" value= "<?php echo $namamurid; ?>"  required></td>
        </tr>
        <tr>
            <td class="warna">Password</td>
            <td><input type="password" name="password" placeholder="Sila masukkan 8 char" value= "<?php echo $password; ?>" pattern="[a-zA-Z0-9]{8}" title="Sila masukkan 8 char" oninvalid="this.setCustomValidity('Sila masukkan 8 char')" oninput = "this.setCustomValidity('')" required ></td>
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