<?php
include("urusetia_menu.php");
include('sambungan.php');
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">PASUKAN CARIAN</h3>
<form class="panjang" action="pasukan_carian2.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Pasukan</td>
            <td>
                <select name="idpasukan">
                    <?php
                        $sql = "select * from pasukan";
                        $data = mysqli_query($sambungan, $sql);
                        while ($pasukan = mysqli_fetch_array($data)) {
                            echo "<option value='$pasukan[idpasukan]'>$pasukan[idpasukan] ($pasukan[namapasukan])</option>";
                        } // tamat while
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <button class="cari" type="submit">Search</button>
</form>

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