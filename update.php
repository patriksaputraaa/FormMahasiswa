<?php
require_once("index.php");
require_once("tabel.php");
$nis = $_GET["update"];
$siswa = new Tabel("localhost","root","","akademik","siswa");
$sql = "SELECT * FROM siswa WHERE nis='$nis'";
$old_data = $siswa->getRow($sql);
extract($old_data);
$form = new Form("sendupdate.php","Pendaftaran Mahasiswa Baru");
$form->addTextBox("nis", 20, $nis);
$form->addTextBox("nama", 80, $nama);
$form->addRadioButton("gender",["Pria","Wanita"], $gender);
$form->addComboBox("agama",["Kristen","Katholik","Islam","Konghucu","Budha","Hindu"], $agama);
$form->addCheckBox("bahasa", ["Indonesia", "Inggris", "Mandarin", "Perancis", "Jerman"], $bahasa);
$form->addTextBox("kota", 30, $kota);
echo "<p>".$bahasa."</p>";
$form->show();
?>