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
    $form = new Form("saveMhs.php","Pendaftaran Mahasiswa Baru");
    $form->addTextBox("nis", 20);
    $form->addTextBox("nama", 80);
    $form->addRadioButton("gender",["Pria","Wanita"]);
    $form->addComboBox("agama",["Kristen","Katholik","Islam","Konghucu","Budha","Hindu"], "Islam");
    $form->addCheckBox("bahasa",["Indonesia","Inggris","Mandarin","Perancis","Jerman"]);
    $form->addTextBox("kota", 30);
    $form->show();
    ?>
</body>
</html>