<?php
    include("sambungan.php");

    if(isset($_GET['idpasukan']))
        $idpasukan = $_GET['idpasukan'];
        $sql = "DELETE FROM pencapaian WHERE idpasukan = '$idpasukan'";
        $result = mysqli_query($sambungan, $sql);

        if($result)
            echo "<script>alert('Berjaya padam.')</script>";
        else
            echo "<script>alert('Tidak berjaya padam.')</script>";
        echo "<script>window.location = 'hakim_pasukan.php';</script>";
        
?>