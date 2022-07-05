<?php
    include("murid_menu.php");
?>

<html>
    <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
    <body>
        <h3 class="pendek">PILIHAN PASUKAN</h3>
        <form class="pendek" action="pencapaian_cetak.php" method="post">
            
            <select name="idpasukan" style="text-align: center;">
                <?php
                    include('sambungan.php');
                    $sql = "select * from pasukan";
                    $data = mysqli_query($sambungan,$sql);
                    while ($pasukan = mysqli_fetch_array($data)){
                        echo"<option value='$pasukan[idpasukan]'>$pasukan[namapasukan]</option>";
                    }
                ?>
                </select>
            <button class="papar" type="submit">Papar</button>
        </form>
    
    </body>
</html>