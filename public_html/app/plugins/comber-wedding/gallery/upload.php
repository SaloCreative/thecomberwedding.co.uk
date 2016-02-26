<?php
require '../../../../../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
Image::configure(array('driver' => 'gd'));

if (!empty($_POST['galleryNonce']) && !empty($_POST['userId']) && !empty($_POST['userEmail']) && $_POST['galleryNonce'] == '12r23tfwegwqt4yefew1^$@36gfu2fg239urt287rbc278vc2bvc7') {
    $wpUser = $_POST['userId'];
    $userEmail = $_POST['userEmail'];
    require_once('../database/identifyGuest.php');
    $originals = '../../../../assets/originals/';
    $gallery = '../../../../assets/gallery/';
    $thumbs = '../../../../assets/thumbs/';
    $todaysDate = time();
    $allowedSize = 15728640;
    $allowedFiles = array('jpg', 'JPG', 'jpeg', 'png', 'gif');

    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']["size"];
        $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $fileName = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        if($fileSize < $allowedSize && in_array($fileType, $allowedFiles)) {
            $fileNewName = $fileName . '-' . $todaysDate . '.' . $fileType;
            $img = Image::make($_FILES['file']['tmp_name']);
            $img->save($originals . $fileNewName);
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($gallery . $fileNewName);
            $img->fit(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbs . $fileNewName);

            try {
                $imageInsert = 'INSERT INTO gallery (image, userID, dateAdded) VALUES (?, ?, ?)';
                $insertImage = $ftoDB->prepare($imageInsert);
                $insertImage->execute(array($fileNewName, $wpUser, $todaysDate));
            } catch (PDOException $e) {
                throw new Exception('database error');
            }
        } else {
            throw new Exception('Not allowed');
        }
    } else {
        throw new Exception('No image');
    }
} else {
    throw new Exception('No user');
}