<?php
    include ('sambungan.php');
	include("urusetia_menu.php");
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI PASUKAN</caption>
    <tr>
        <th>ID Pasukan</th>
        <th>Nama Pasukan</th>
        <th>Ketua Pasukan</th>
        <th>Kelas</th>
        <th>ID Hakim</th>
        <th>ID Urusetia</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from pasukan";
        $result = mysqli_query($sambungan, $sql);
        while($pasukan = mysqli_fetch_array($result)) {
         echo "<tr> <td>$pasukan[idpasukan]</td>
                    <td>$pasukan[namapasukan]</td>
                    <td>$pasukan[ketuapasukan]</td>
					<td>$pasukan[kelas]</td>
                    <td>$pasukan[idhakim]</td>
					<td>$pasukan[idurusetia]</td>
					<td><a href='pasukan_update.php?idpasukan=$pasukan[idpasukan]'>Kemas Kini</a></td>
					<td><a href='pasukan_delete.php?idpasukan=$pasukan[idpasukan]'>Padam</a></td>
               </tr>";
        } // tamat while
    ?>
</table>