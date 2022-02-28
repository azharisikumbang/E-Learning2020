<?php 
session_start();

if (!isset($_SESSION['Admin'])) {
	header('Location: ./../../index.php');
	exit();
}

if (!($_SESSION['Admin'])) {
	header('Location: ./../../index.php');
	exit();
}

include './../../config/db.php';

$sql = mysqli_query($con, "SELECT s.id_siswa, s.nis, s.nama_siswa, s.jk, k.kelas, j.jurusan from tb_siswa s left join tb_master_jurusan j on j.id_jurusan = s.id_jurusan left join tb_master_kelas k on k.id_kelas = s.id_kelas order by id_siswa desc");
$title = 'DAFTAR SISWA BIMBINGAN BELAJAR ATTIN';
$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<style type="text/css">
		body{
			font-family: Verdana, Geneva, Tahoma, sans-serif;

		}
		@media print {
			body {
				print-color-adjust: exact;
				-webkit-print-color-adjust: exact;
			}
		}
	</style>
	<script type="text/javascript">
		window.onload = function() {
			window.print();
		}
	</script>
</head>
<body>
	<div>
		<div>
			<center>
				<img src="../../vendor/images/logo1.png" width="100">
				<h4><?= $title ?></h4>
			</center>
		</div>
		<div>
			<table style="width: 100%;border-collapse: collapse;" border="1" cellpadding="6px">
				<thead>
					<tr style="height: 40px;background-color: #00BCD4;">
						<th style="width: 32px">No</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Jenis Kelamin</th>
						<th>Kelas</th>
						<th>Jurusan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (mysqli_num_rows($sql) < 1) { ?>
						<tr>
							<td colspan="4" style="text-align: center">Tidak ada data.</td>
						</tr>
					<?php } else {
						$no = 1;
						while ($fetch = mysqli_fetch_assoc($sql)) { ?>
						 <tr>
							<td style="text-align: center"><?= $no++ ?></td>
							<td><?= $fetch['nis'] ?? '-' ?></td>
							<td><?= $fetch['nama_siswa'] ?? '-' ?></td>
							<td><?= (strtoupper($fetch['jk']) == 'L') ? 'Laki-laki' : 'Perempuan' ?></td>
							<td><?= strtoupper($fetch['kelas'] ?? '-') ?></td>
							<td><?= strtoupper($fetch['jurusan'] ?? '-') ?></td>
						</tr>   
					<?php } 
						} ?>
				</tbody>
			</table>
		</div>
		<div style="padding-top: 22px; display: flex; justify-content: end">
			<div style="display: flex; flex-direction: column; justify-content: space-between; width: 220px; height: 180px; text-align: center">
				<div>
					<p>Agam, ....... <?= sprintf("%s %s", $bulan[date('n') - 1], date('Y')) ?></p>
					<p>Petugas</p>
				</div>
				<div>
					( FEBRIZAL )
				</div>
			</div>
		</div>
	</div>
</body>
</html>