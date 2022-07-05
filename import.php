<?php
  include('sambungan.php');
  include('urusetia_menu.php');

if(isset($_POST["submit"])){
    $namajadual=$_POST['namatable'];
    $namafail=$_FILES['namafail']['name'];
    
    //ambil data dari mana pun boleh
    $sementara=$_FILES['namafail']['tmp_name'];
    move_uploaded_file($sementara,$namafail);
    
    $fail=fopen($namafail,"r");
    while(!feof($fail)){
        
        $medan=explode(",",fgets($fail));
        
        $berjaya=false;

        if(strtolower($namajadual)==="hakim"){
            
            $idhakim=trim($medan[0]);
            $namahakim=trim($medan[1]);
            $password=trim($medan[2]);
            $sql="insert into hakim(idhakim, namahakim, password) values('$idhakim','$namahakim','$password')";
            if(mysqli_query($sambungan,$sql))
                $berjaya=true;
            else
                echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        }//tamat if
        
        if(strtolower($namajadual)==="murid"){
            $idmurid=trim($medan[0]);
            $namamurid=trim($medan[1]);
            $password=trim($medan[2]);
            
            $sql="insert into murid(idmurid, namamurid, password) values('$idmurid','$namamurid','$password')";
            if(mysqli_query($sambungan,$sql))
                $berjaya=true;
            else
                echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        }//tamat if
        
        if(strtolower($namajadual)==="pasukan"){
            
            $idpasukan=trim($medan[0]);
            $namapasukan=trim($medan[1]);
            $ketuapasukan=trim($medan[2]);
            $kelas=trim($medan[3]);
            $idhakim=trim($medan[4]);
            $idurusetia=trim($medan[5]);
            $sql="insert into pasukan(idpasukan, namapasukan, ketuapasukan, kelas, idhakim, idurusetia) values('$idpasukan','$namapasukan','$ketuapasukan','$kelas','$idhakim','$idurusetia')";
            if(mysqli_query($sambungan,$sql))
                $berjaya=true;
            else
                echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        }//tamat if
    }//tamat while
    
    if($berjaya==true)
        echo"<script>alert('Berjaya import.');</script>";
    else
        echo"<script>alert('Tidak berjaya import.');</script>";
    echo "<script>window.location = 'import.php'</script>";
    mysqli_close($sambungan);
    }
?>

<html>
   <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
    
    <body>
        <h3 class="panjang">IMPORT DATA</h3>
        <form class="panjang"action="import.php"method="post"
              enctype="multipart/form-data"class="import">
        
        <table>
             <tr>
                 <td class="warna">Jadual</td>
                 <td>
                     <select name="namatable">
                     <option>Hakim</option>
                     <option>Murid</option>
                     <option>Pasukan</option>
                     </select>
                 </td>
            </tr>
            
            <tr>
                <td class="warna">Nama fail</td>
                <td><input type="file" name="namafail" accept=".txt"></td>
            </tr>
        </table>
        <button class="import" type="submit" name="submit">Import</button>
    </form>
</body>
</html>

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