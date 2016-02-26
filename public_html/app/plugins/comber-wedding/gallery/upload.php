<?php
require '../../../../../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
Image::configure(array('driver' => 'gd'));

$originals = '../../../../assets/originals/';
$gallery = '../../../../assets/gallery/';
$thumbs = '../../../../assets/thumbs/';
$todaysDate = time();
$allowedSize = 2097152;
$allowedFiles = array('jpg', 'JPG', 'jpeg', 'png', 'gif');

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']["size"];
    $fileType = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $fileName = pathinfo($_FILES['file']['name'],PATHINFO_FILENAME);
    $fileNewName = $fileName . '-' . $todaysDate . '.'.$fileType;

    $img = Image::make($_FILES['file']['tmp_name']);

    $img->save($originals. $fileNewName);

    $img->resize(1200, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
    $img->save($gallery. $fileNewName);

    $img->fit(350, 350, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($thumbs. $fileNewName);

    //TODO: save to database
} else {
    throw new Exception('No image');
}