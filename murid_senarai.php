<?php
    include ('sambungan.php');
	include("urusetia_menu.php");
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI MURID</caption>
    <tr>
        <th>ID Murid</th>
        <th>Nama Murid</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from murid";
        $result = mysqli_query($sambungan, $sql);
        while($murid = mysqli_fetch_array($result)) {
         echo "<tr> <td>$murid[idmurid]</td>
                    <td>$murid[namamurid]</td>
                    <td>$murid[password]</td>
					<td><a href='murid_update.php?idmurid=$murid[idmurid]'>Kemas Kini</a></td>
					<td><a href='murid_delete.php?idmurid=$murid[idmurid]'>Padam</a></td>
               </tr>";
        } // tamat while
    ?>
</table>