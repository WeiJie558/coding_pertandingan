<?php
  include ('sambungan.php');
  include("urusetia_menu.php");
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI PEMARKAHAN</caption>
    <tr>
        <th>ID Pemarkahan</th>
        <th>Bilangan Perlawanan</th>
        <th colspan="2">Tindakan</th>
    </tr>
    <?php
        $sql = "select * from pemarkahan";
        $result = mysqli_query($sambungan, $sql);
        while($nilai = mysqli_fetch_array($result)) {
         echo "<tr> <td>$nilai[idpemarkahan]</td>
                    <td>$nilai[bilanganperlawanan]</td>
					<td><a href='pemarkahan_update.php?idpemarkahan=$nilai[idpemarkahan]'>Kemas Kini</a></td>
					<td><a href='pemarkahan_delete.php?idpemarkahan=$nilai[idpemarkahan]'>Padam</a></td>
               </tr>";
        }
    ?>
</table>