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
    $form = new Form("saveMhs.php","Tambah Data Mahasiswa Baru");
    $form->addTextBox("NIM", 8);
    $form->addTextBox("Nama");
    $form->addTextBox("Kota", 20);
    $form->addComboBox("Agama",["Kristen","Islam","Konghucu"], "Islam");
    $form->addCheckBox("Hobies",["Sepakbola","Futsal","Badminton"]);
    $form->addRadioButton("Gender",["Pria","Wanita"]);
    $form->show();
    ?>
</body>
</html>