<?php
//include("takvim.php");
$month = 2;
$year = 2023;


// Takvimin başlangıç tarihini hesaplayın
$firstDayOfMonth = date("N", strtotime("$year-$month-01"));

// Takvimdeki son gün sayısını hesaplayın
$daysInMonth = date("t", strtotime("$year-$month-01"));



// Takvim verilerini tabloya ekleyin
$currentDay = 1;

?>
<link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" />
<style>
    #renk:hover {
        background-color: green;
        cursor: pointer;
    }

    #renk:active {
        background-color: yellow;
    }

    #myModal {
        display: none;
        /* modal açık olmadığı sürece gizle */
        position: fixed;
        /* sabit bir konumda tut */
        z-index: 1;
        /* modalı en üst seviyede göster */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* scrollbar eklemek için gerekiyor */
        background-color: rgba(0, 0, 0, 0.7);
        /* arka planı koyu renk ile ört */
    }

    #sec:hover {
        background-color: black;
        color: white;
        cursor: pointer;
    }
</style>

<form action="index.php">
    <table style="width:100%; border:1px solid black;">
        <tr style="height:10px;">
            <td style="width:20%; border:1px solid black;">
                <table>
                    <tr>
                        <td>
                            <img src="mylogo.png" alt="mydata logo">
                        </td>
                        <td>
                            <?php echo date("H:i:s"); ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:80%; border:1px solid black;">
                <table>
                    <tr class="border ">
                        <td class="border">FİRMALAR</td>
                        <td class="border">MYDATA</td>
                        <td class="border">HESAPLAR</td>
                        <td class="border">TANIMLAR</td>
                        <td class="border">AYARLAR</td>
                    </tr>
                </table>
            </td>


        </tr>
        <tr style="height:80px;">
            <td style="width:20%; border:1px solid black;">
                <table>
                    <tr>
                        <form method="POST" action="index.php">
                            <td>
                                <select onchange="yil()" class="custom-select" id="year" name="year">
                                    <option selected value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                                <select onchange="ay()" class="custom-select" id="month" name="month">
                                    <option selected value="1">OCAK</option>
                                    <option value="2">ŞUBAT</option>
                                    <option value="3">MART</option>
                                    <option value="4">NİSAN</option>
                                    <option value="5">MAYIS</option>
                                    <option value="6">HAZİRAN</option>
                                    <option value="7">TEMMUZ</option>
                                    <option value="8">AGUSTOS</option>
                                    <option value="9">EYLÜL</option>
                                    <option value="10">EKİM</option>
                                    <option value="11">KASIM</option>
                                    <option value="12">ARALIK</option>
                                </select>
                            </td>
                        </form>

                    </tr>
                </table>




                <!--yeni takvim-->

                <?php
                // Takvim tablosunu oluşturun
                echo '<table style="width:100%;">';
                echo '<tr><th>Pzt</th><th>Sal</th><th>Çar</th><th>Per</th><th>Cum</th><th>Cmt</th><th>Paz</th></tr>';
                echo '<tr>';
                for ($i = 1; $i <= 42; $i++) {
                    if ($i < $firstDayOfMonth || $i >= $firstDayOfMonth + $daysInMonth) {
                        echo '<td></td>'; // Boş hücre
                    } else {
                        echo '<td id="sec" style="text-align:center" onclick="seanslar()">' . $currentDay . '</td>'; // Tarih bilgisi
                        $currentDay++;
                    }

                    if ($i % 7 == 0) {
                        echo '</tr><tr>'; // Yeni bir satıra geç
                    }
                }
                echo '</tr>';
                echo '</table>';
                ?>

                <!--yeni takvim bitis-->
                <br>
                <table style="width:100%; text-align:center;">
                    <tr class="border" style="width:100%; text-align:center;">
                        <td>sinema</td>
                        <td>asmerkez</td>
                        <td>gösteri</td>
                        <td>chiko</td>
                    </tr>
                </table>
                <h6 style="text-align:center; margin:0px;">Seanslar</h6>
                <table class="border" style="width:100%; text-align:center;">

                    <tr class="border">
                        <td class="border"><strong>ID</strong></td>
                        <td class="border"><strong>SAAT</strong></td>
                        <td class="border"><strong>GÖSTERİ</strong></td>
                        <td class="border"><strong>SİNEMA</strong></td>
                        <td class="border"><strong>BOŞ</strong></td>
                    </tr>
                    <tr class="border">
                        <td class="border">1</td>
                        <td class="border">13:39</td>
                        <td class="border">korupark</td>
                        <td class="border">alyazmalı</td>
                        <td class="border">11</td>
                    </tr>

                </table>
            </td>
            <td style="width:80%; border:1px solid black;">
                <table style="background-color:lightblue; border:1px solid black;">
                    <tr>
                        <h2 style="margin-bottom:0px; padding-bottom:0px;">Sütun:25 Satır:15 lik SALON</h2>
                    </tr>

                    <tr>
                        <?php
                        $satir=15;
                        $sutun=25;
                        for ($i = 1; $i <= $satir; $i++) { // satır sayısı
                            echo "<tr>"; // yeni bir satır oluştur
                            for ($j = 1; $j <= $sutun; $j++) { // sütun sayısı
                                echo "<td id='renk' style='border: 1px solid black; width:50px;' onclick='myFunction($i, $j)'> $i/$j </td>"; // hücre içeriği
                            }
                            echo "</tr>"; // satırı tamamla
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <table style="border:1px solid black;">

                <tr>
                    <marquee behavior="cinema" direction="cinema"
                        style="border:1px solid black; background-color:lightblue;">KAYIT ALANI 1</marquee>
                </tr>
                <tr>
                    <marquee behavior="cinema" direction="cinema"
                        style="border:1px solid black; background-color:#ececec;">
                        KAYIT ALANI 2</marquee>
                </tr>
            </table>
        </tr>
    </table>


</form>

<!--modal-->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SİNEMA BİLET OTOMASYONU</h5>
                <button onclick="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:500px;">
                <p>Koltuk Bilgileri</p>
                <table>

                    <tr style="border:1px solid black;">
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">SEÇİLİ KOLTUK</td>
                        <td style="border:1px solid black; text-align: center;"><span id="koltukNo"></span></td>
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">BİLET SAHİBİ</td>
                        <td style="border:1px solid black; text-align: center;">AYNUR SÖNMEZ</td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">TEL</td>
                        <td style="border:1px solid black; text-align: center;">0532 303 30 30</td>
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">SATIŞ TÜRÜ</td>
                        <td style="border:1px solid black; text-align: center;">YETİŞKİN</td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">TUTAR</td>
                        <td style="border:1px solid black; text-align: center;">50 TL</td>
                        <td class="bg-warning" style="border:1px solid black; text-align: center;">ÖDEME TÜRÜ</td>
                        <td style="border:1px solid black; text-align: center;">NAKİT</td>
                    </tr>


                </table>

            </div>
            <div class="modal-footer">
                <button onclick="sat()" type="button" class="btn btn-primary">SAT</button>
                <button onclick="degistir()" type="button" class="btn btn-primary">DEĞİŞTİR</button>
                <button onclick="alert('Rezerve işlemi yapıldı.')" type="button"
                    class="btn btn-primary">REZERVE</button>
                <button onclick="silvekapat()" type="button" class="btn btn-secondary" data-dismiss="modal">BİLETİ
                    SİL</button>
            </div>
        </div>
    </div>
</div>

<script>

    document.getElementById("year").value = "<?= $year ?>";
    document.getElementById("month").value = "<?= $month ?>";

    function myFunction(i, j) {

        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        var koltukNo = document.getElementById("koltukNo");
        koltukNo.innerHTML = i + "/" + j;


        return koltukNo;
    }
    /*modal fonsiyonları */
    function silvekapat() {
        alert('Seçili bilet siliniyor!');
        closeModal();
    }

    function degistir() {
        alert('Değiştirme işlemi yapıldı.');
        closeModal();
    }

    function sat() {
        alert('Bileti satma işlemi başarıyla yapıldı.');
        closeModal();
    }

    function closeModal() {
        // Modalı kapat
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
    // Sayfa yüklendiğinde modal'ı gizle
    window.onload = function () {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    };

    


</script>