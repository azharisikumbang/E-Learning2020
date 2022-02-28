<?php 

if (empty($_POST)) {
	http_response_code(400);
	exit();
}

include __DIR__ . './../../../config/db.php';

$idTugasSiswa = $_POST['id'];
$nilai = (double) $_POST['nilai'];
$sql = mysqli_query($con, "UPDATE tugas_siswa set nilai = '$nilai' where id_tgssiswa = $idTugasSiswa");

if (!$sql) {
	http_response_code(500);
	exit();
}

echo json_encode(['status' => 1]);


