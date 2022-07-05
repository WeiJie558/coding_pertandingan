<?php
    session_start();
    include("sambungan.php");
    include("hakim_menu.php");


    if(isset($_GET['idpasukan'])){
        $idpasukan = $_GET['idpasukan'];
        $sql = "SELECT * FROM pencapaian 
                JOIN pasukan ON pencapaian.idpasukan = pasukan.idpasukan
                JOIN hakim ON pasukan.idhakim = hakim.idhakim
                GROUP BY pencapaian.idpasukan HAVING pencapaian.idpasukan = '$idpasukan'";
        $result = mysqli_query($sambungan, $sql);
        $keputusan = mysqli_fetch_array($result);
        $namapasukan = $keputusan['namapasukan'];
        $namahakim = $keputusan['namahakim'];
    }
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<style>
	td {
		text-align: center;
	}
	select {
		width: 150px;
		text-align: center;
	}
</style>
<div class="kandungan">
	<h3 class="markah">BORANG PEMARKAHAN</h3>
	<form class="markah" action="keputusan_update2.php" method="post">
		<table>
			<tr>
				<td class="warna">Nama Hakim : </td>
				<td><?php echo $namahakim; ?> </td>
			</tr>

			<tr>
				<td class="warna">Nama Pasukan</td>
				<td>
                    <?php echo $namapasukan;?>
                    <input type="text" value="<?php echo $idpasukan;?>" name="idpasukan" style="display: none;">
				</td>
			</tr>
		</table>

		<table class="markah">
			<tr>
				<th class="warna">Bilangan Perlawanan</th>
				<th class="warna">Kemenangan</th>
				<th class="warna">Mata Diperoleh</th>
			</tr>
			<?php
            $sql = "select * from pemarkahan";
            $data = mysqli_query($sambungan, $sql);
            while ($pemarkahan = mysqli_fetch_array($data)) {
               
				echo "<tr>
                <td style='text-align: center;'>$pemarkahan[bilanganperlawanan]</td>
                <td>
					<select value=0>
						<option value=0>Kalah</option>
						<option value=1>Menang</option>
					</select>
				</td>
                <td>
					<select oninput='kiramata()' class='mata' id='$pemarkahan[idpemarkahan]' name='$pemarkahan[idpemarkahan]'>
						<option value=0>0</option>
						<option value=1>1</option>
					</select>
				</td>
                </tr>";		
            } // tamat while
            ?>

			<tr class="markah_jumlah" autocomplete="off">
				<td></td>
				<td class="markah_jumlah">Jumlah Mata</td>
				<td><input class="mata" type="text" id="jumlahmata" name="jumlahmata" value=0 style="width: 150px; text-align: center; border: 1px solid #5f6466;" readonly></td>
			</tr>
		</table>
		<button class="tambah" type="submit" name="submit">Tambah</button>
	</for>
</di>
<script type="text/javascript">
    function kiramata() {
        var jumsemua = 0;
        <?php
        $sql = "select * from pemarkahan";
        $data = mysqli_query($sambungan, $sql);
        while ($pemarkahan = mysqli_fetch_array($data)) {
            echo "var mata = parseInt(document.getElementById('$pemarkahan[idpemarkahan]').value);
			jumsemua = jumsemua + mata;";
        } // tamat while
        ?>
document.getElementById("jumlahmata").value = jumsemua;

    } // tamat function
</script>

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