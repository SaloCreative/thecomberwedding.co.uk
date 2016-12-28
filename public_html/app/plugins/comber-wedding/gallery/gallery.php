<?php
//Build form for upload
function comber_gallery_upload() {

    if(is_user_logged_in()) {
        $output = comber_gallery_upload_build();
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('gallery_upload', 'comber_gallery_upload');

function comber_gallery_upload_build() {
    ob_start(); ?>
    <a href="#" class="button gallery-upload-btn" data-reveal-id="myGallery">Upload Images</a>
    <div id="myGallery" class="reveal-modal" data-reveal aria-labelledby="Gallery Upload" aria-hidden="true" role="dialog">
        <?php require_once('uploadForm.php'); ?>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <?php return ob_get_clean();
}

//Build gallery list output
function comber_galleries_view() {

    if(is_user_logged_in()) {
        $output = comber_galleries_view_build();
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('galleries', 'comber_galleries_view');

function comber_galleries_view_build() {
    require_once(__DIR__.'/galleryOutput.php');
    return $gallery->returnAlbumList();
}

//Build the gallery output
function comber_gallery_view() {
    if(is_user_logged_in()) {
        $output = comber_gallery_view_build();
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('album_contents', 'comber_gallery_view');

function comber_gallery_view_build() {
    require_once(__DIR__.'/galleryOutput.php');
    $id = intval($_GET['albumid']);
    return $gallery->returnAlbumContents($id);
}