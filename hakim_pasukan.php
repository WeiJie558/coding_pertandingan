<?php
   session_start();
   include('sambungan.php');
   include("hakim_menu.php");
?>


<html>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">
<style>
	table {
		width: 880px;
	}
</style>
<body>
<table>
<caption>SENARAI PENCAPAIAN</caption>
<tr>
	<th>Bil</th>
	<th>Nama Pasukan</th>
	<th>Perlawanan 1</th>
	<th>Perlawanan 2</th>
	<th>Perlawanan 3</th>
	<th>Jumlah Mata</th>
	<th>Kedudukan</th>
	<th colspan="2">Tindakan</th>
</tr>
<?php
    
    $nama = $_SESSION["nama"];
    $idhakim = $_SESSION['idpengguna'];
	
	$sql1 = "SELECT * FROM pencapaian 
			GROUP BY idpasukan ORDER BY jumlahmata DESC";
	$result1 = mysqli_query($sambungan, $sql1);

	$kedudukan = 1;
	while($pencapaian1 = mysqli_fetch_array($result1)){
		$idpasukan = $pencapaian1["idpasukan"];
		$sql = "UPDATE pencapaian SET kedudukan='".$kedudukan."' WHERE idpasukan='".$idpasukan."'";
		$data = mysqli_query($sambungan, $sql);
		$kedudukan = $kedudukan + 1;
		
	}

	

	
	$bil = 1;
	$sql2 = "select * from pencapaian 
	join pasukan on pencapaian.idpasukan = pasukan.idpasukan    
	join pemarkahan on pencapaian.idpemarkahan = pemarkahan.idpemarkahan 
	join hakim on pasukan.idhakim = hakim.idhakim  
	order by pencapaian.kedudukan asc, pencapaian.idpasukan asc, pemarkahan.idpemarkahan asc";
	
	$result2 = mysqli_query($sambungan,$sql2);
	$a = 1;
	$bil = 1;

	while($pencapaian2 = mysqli_fetch_array($result2)){
		if($a == 1)
			echo"<tr>
					<td>".$bil."</td>
					<td class='nama' style='text-align: center;'>".$pencapaian2['namapasukan']."</td>";
		if($a < 5)
			echo"<td>".$pencapaian2['kemenangan']."</td>";
		
		$a = $a + 1;
		if($a == 4){
			echo"<td>".$pencapaian2['jumlahmata']."</td><td>".$pencapaian2['kedudukan']."</td><td><a href='keputusan_update1.php?idpasukan=$pencapaian2[idpasukan]'>Kemas Kini</a></td><td><a href='keputusan_delete.php?idpasukan=$pencapaian2[idpasukan]'>Padam</a></td></tr>";
			$a = 1;
			$bil = $bil + 1;
		}//tamat if
	}//tamat while
     ?>
    
</table>
</body>
</html>