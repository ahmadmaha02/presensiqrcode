<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");

nocache;

//nilai
$filenya = "ifr_presensi_log_masuk.php";
$judul = "Display MASUK";
$judulku = "$judul";
$judulx = $judul;


$jml_detik = "15000";
$ke = "$filenya";







//detail
$qdatai = mysqli_query($koneksi, "SELECT * FROM orang_presensi ".
							"WHERE status = 'MASUK' ".
							"AND round(DATE_FORMAT(postdate, '%d')) = '$tanggal' ".
							"AND round(DATE_FORMAT(postdate, '%m')) = '$bulan' ".
							"AND round(DATE_FORMAT(postdate, '%Y')) = '$tahun' ".
							"ORDER BY postdate DESC");
$rdatai = mysqli_fetch_assoc($qdatai);

do
	{
	$ikdi = $ikdi + 1;

	//tiap orang
	$yuk_postdate = balikin($rdatai['postdate']);
	$yuk_status = balikin($rdatai['status']);
	$yuk_kode = balikin($rdatai['orang_kode']);
	$yuk_jamnama = balikin($rdatai['orang_nama']);
	$x_long = balikin($rdatai['lat_x']);
	$x_lat = balikin($rdatai['lat_y']);

	echo "[$ikdi]. <font color=green>$yuk_postdate. PRESENSI $yuk_status.</font>
	<br>
	$yuk_kode. 
	$yuk_jamnama
	<hr>";
	}
while ($rdatai = mysqli_fetch_assoc($qdatai));
?>


<script>setTimeout("location.href='<?php echo $ke;?>'", <?php echo $jml_detik;?>);</script>

<?php
exit();
?>
