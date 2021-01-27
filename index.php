<?php
require_once('FarsiGD.php');

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $img = $_FILES['img'];

    header('Content-type: image/jpg');


    $image = new Imagick($img['tmp_name']);
    $draw = new ImagickDraw();
    // $pixel = new ImagickPixel( 'blue' );


    //$image->newImage(1200, 175, $pixel);


    $draw->setFillColor('#000000');


    $draw->setFont($file['tmp_name']);
    $draw->setFontSize(32);

    $draw->getTextEncoding();

    $name = ' محراب  کریم پور';
    $username = '3241917355';
    $birthDate = '24/12/1376';
    $bloodType = 'B-';
    $makeDate = '12/08/1396';
    $end = '26/11/1400';
    $farsi = new FarsiGD();
    $name = $farsi->persianText($name);
    $username = $farsi->fa_number($username);
    $birthDate = explode('/', $birthDate);
    $birthDate=array_reverse($birthDate);
    $birthD = '';
    foreach ($birthDate as $key=>$row) {
        if ($key!==0){
            $birthD = $birthD . '/' . $farsi->fa_number($row);
        }else{
            $birthD = $birthD . $farsi->fa_number($row);
        }
    }
    $makeDate=explode('/',$makeDate);
    $makeDate=array_reverse($makeDate);
    $DateM = '';
    foreach ($makeDate as $key => $row) {
        if ($key !== 0) {
            $DateM = $DateM . '/' . $farsi->fa_number($row);
        } else {
            $DateM = $DateM . $farsi->fa_number($row);
        }
    }

    $image->annotateImage($draw, 485, 265, 0, $name);
    $image->annotateImage($draw, 620, 325, 0, $username);
    $image->annotateImage($draw, 600, 388, 0, $birthD);
    $image->annotateImage($draw, 600, 430, 0, $bloodType);
    $image->annotateImage($draw, 590, 515, 0, $DateM);


    $image->setImageFormat('jpg');
    mkdir('ll');
    file_put_contents ("ll/test_1.jpg", $image); // works, or:


    echo $image;
}


?>
<br><br><br><br><br><br><br><br>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file">
    <br>
    <input type="file" name="img">
    <br>
    <input type="submit" name="submit" value="ارسال">
</form>
