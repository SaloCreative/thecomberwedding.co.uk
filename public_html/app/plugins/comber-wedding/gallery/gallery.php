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
    <a href="#" class="button" data-reveal-id="myGallery">Upload Images</a>
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
    $html = '<div class="row">';
    foreach($gallery->returnAllAlbumIDs() as $album) {
        $userGallery = $gallery->getAlbumDetails($album);
        $html .= '<div class="column medium-4 gallery-image">';
        $html .= '<a href="/album/?albumid='.$userGallery->id.'"></a>';
        $html .= '<div class="gall-thumb-inner" style="background-image: url(\'/assets/thumbs/'.$userGallery->thumbnail.'\')">';
        $html .= '<p class="title">'.$userGallery->name.'</p>';
        $html .= '</div></div>';
    }
    $html .= '</div>';
    return $html;
}