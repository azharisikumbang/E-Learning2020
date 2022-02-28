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

$sql = mysqli_query($con, "SELECT id, nik, nama_guru, email FROM tb_guru ORDER BY id_guru DESC");
$title = 'DAFTAR GURU BIMBINGAN BELAJAR ATTIN';
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
						<th>NIP / NIK</th>
						<th>Nama Guru</th>
						<th>Email</th>
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
							<td><?= $fetch['nik'] ?></td>
							<td><?= $fetch['nama_guru'] ?></td>
							<td><?= $fetch['email'] ?></td>
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