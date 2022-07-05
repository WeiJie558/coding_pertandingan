<?php
    include('sambungan.php'); 
    include("urusetia_menu.php");

    $idpasukan = $_POST['idpasukan'];
    $sql = "select * from pasukan where idpasukan = '$idpasukan'";
    $result = mysqli_query($sambungan, $sql);
    $pasukan = mysqli_fetch_array($result);

    $namapasukan = $pasukan['namapasukan'];
    $ketuapasukan = $pasukan['ketuapasukan'];
    $kelas = $pasukan['kelas'];
    $idhakim = $pasukan['idhakim'];
    $idurusetia = $pasukan['idurusetia'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
<caption >MAKLUMAT PASUKAN</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="pasukan">ID Pasukan</td>
    <td class="pasukan"><?php echo $idpasukan; ?></td>
</tr>     
<tr>
    <td class="pasukan">Nama Pasukan</td>
    <td class="pasukan"><?php echo $namapasukan; ?></td>
</tr>
<tr>
    <td class="pasukan">Ketua Pasukan</td>
    <td class="pasukan"><?php echo $ketuapasukan; ?></td>
</tr>
<tr>
    <td class="pasukan">Kelas</td>
    <td class="pasukan"><?php echo $kelas; ?></td>
</tr>
<tr>
    <td class="pasukan">ID Hakim</td>
    <td class="pasukan"><?php echo $idhakim; ?></td>
</tr>
<tr>
    <td class="pasukan">ID Urusetia</td>
    <td class="pasukan"><?php echo $idurusetia; ?></td>
</tr>
</table>