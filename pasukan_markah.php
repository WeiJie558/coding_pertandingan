<?php
session_start();
include('sambungan.php');
include("pasukan_menu");
$namapasukan=$_SESSION["namapasukan"];
$idpasukan=$_SESSION["idpasukan"];

$kedudukan=0;
$sql="select*from pasukan join pasukan on pasukan.idpasukan=pasukan.idpasukan
join penilaian on pasukan.idpemarkahan=penilaian.idpemarkahan
join hakim on pasukan.idhakim=hakim.idhakim
group by pasukan.idpasukan order by pasukan.jumlah desc";

$data=mysqli_query($sambungan,$sql);
$bil=0;
while($pasukan=mysqli_fetch_array($data)){
    $bil=$bil+1;
    if($pasukan['idpasukan']==$idpasukan)
        $kedudukan=$bil;
    
}//tamat while
?>

<link rel="stylesheet" href="senarai.css">

<table>
<caption>Nama Pasukan : <?php echo $namapasukan  ?></caption>
    <tr>
    <th>Bilangan Perlawanan</th>
    <th>Kemenangan</th>
    <th>Mata Diperoleh</th>
    </tr>
    <?php
    $sql="select*from pasukan
    join penilaian on pasukan.idpemarkahan=penilaian.idpemarkahan
    where idpasukan='$idpasukan'";
    $data=mysqli_query($sambungan,$sql);
    $bilrekod=mysqli_num_rows($data);
    id($bilrekod>0){
        while($pasukan=mysqli_fetch_array($data)){
            echo"<tr>
            <td>$pasukan[idpemarkahan]</td>
            <td$pasukan[pencapaian]</td>
            <td>$pasukan[markah]>/td>
            </tr>";
            }
        if($kedudukan !=0)
            echo "<tr class='markah'><td></td>
            <td class='markah'>Kedudukan</td>
            <td>$kedudukan/$bil</td>
            </tr></table>"
    }//if
    else{
        echo "<tr><td>markah</td><td>belum</td><td>dinilai</td>
        </tr></table>"
    }//else
    ?>