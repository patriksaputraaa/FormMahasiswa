<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <?php
    require_once("form.php");
    $form = new Form("saveMhs.php","Pendaftaran Member Komunitas Pemrograman");
    $form->addTextBox("Nama Lengkap", 40);
    $form->addTextBox("Umur", 5);
    $form->addTextBox("Alamat", 80);
    $form->addRadioButton("Gender",["Pria","Wanita"]);
    $form->addComboBox("Agama",["Kristen","Katholik","Islam","Konghucu","Budha","Hindu"], "Islam");
    $form->addCheckBox("Bidang yang dikuasai",["Mobile Programming","Data Analytics","Web Dev","Database System","UI/UX"]);
    $form->show();
    ?>
</body>
</html>