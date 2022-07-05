<html>
    <link rel="stylesheet" href="senarai.css">
    <link rel="stylesheet" href="button.css">
    <body>
        <table>
            <?php
                include('sambungan.php');
                include("murid_menu.php");
            
                $idpasukan = $_POST["idpasukan"];
                $kepala = "<tr>
                           <th>Bil</th>
                           <th>Pasukan</th>";
                $sql = "select * from pemarkahan order by idpemarkahan asc";
                $data = mysqli_query($sambungan,$sql);
                while ($pemarkahan = mysqli_fetch_array($data)){
                    $kepala = $kepala."<th>". "Perlawanan " . $pemarkahan['bilanganperlawanan']."</th>";
                }
                $kepala = $kepala."<th>Jumlah Mata</th><th>Kedudukan</th></tr>";
            
                
            
                echo $kepala;
                $bil = 1;
                $sql = "select * from pencapaian 
                        join pasukan on pencapaian.idpasukan = pasukan.idpasukan    
                        join pemarkahan on pencapaian.idpemarkahan = pemarkahan.idpemarkahan 
                        where pasukan.idpasukan='$idpasukan'
                        order by pencapaian.jumlahmata desc, pemarkahan.idpemarkahan asc";
                
                $data = mysqli_query($sambungan,$sql);
                $a = 1;
                $bil = 1;
            
                while($pencapaian = mysqli_fetch_array($data)){
                    if($a == 1)
                        echo"<tr>
                                <td>".$bil."</td>
                                <td class='nama' style='text-align: center;'>".$pencapaian['namapasukan']."</td>";
                    if($a < 5)
                        echo"<td>".$pencapaian['kemenangan']."</td>";
                    
                    $a = $a + 1;
                    if($a == 4){
                        echo"<td>".$pencapaian['jumlahmata']."</td><td>".$pencapaian['kedudukan']."</td>      </tr>";
                        $a = 1;
                        $bil = $bil + 1;
                    }//tamat if
                }//tamat while
            ?>
            
        </table>
        <center><button class="cetak" onclick="window.print()">Cetak</button></center>
    </body>
</html>