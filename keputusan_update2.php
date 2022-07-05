<?php
    include("sambungan.php");
    include("hakim_menu.php");

    $idpasukan = $_POST["idpasukan"];
    $jumlahmata = $_POST["jumlahmata"];

    $delete_sql = "delete from pencapaian where idpasukan='$idpasukan'";
    $delete_data = mysqli_query($sambungan, $delete_sql);

    $sql = "select * from pemarkahan";
	$data = mysqli_query($sambungan, $sql);
	while ($pemarkahan = mysqli_fetch_array($data)) {
		$markah = $_POST["$pemarkahan[idpemarkahan]"];
		$idpemarkahan = $pemarkahan['idpemarkahan'];

		if($markah == 0)
			$kemenangan = "Kalah";
		else if($markah == 1)
			$kemenangan = "Menang";

		$sql = "insert into pencapaian(idpemarkahan, idpasukan, kedudukan, kemenangan, jumlahmata) values('$idpemarkahan','$idpasukan',0, '$kemenangan','$jumlahmata')";
		$result = mysqli_query($sambungan, $sql);
		
		
	} // tamat while
	
	if ($result == true)
		echo "<script>alert('Berjaya kemas kini.');</script>";
	else
		echo "<script>alert('Tidak berjaya kemas kini.');</script>";
	echo "<script>window.location = 'hakim_pasukan.php';</script>";
?>