<?php

require_once(__DIR__ . '/../database/connect.php');

class Gallery
{

    function __construct($ftoDB)
    {
        $this->ftoDB = $ftoDB;
    }

    /*
     * Return album list
     */
    public function returnAlbumList()
    {
        $html = '<div class="row">';
        foreach ($this->returnAllAlbumIDs() as $album) {
            $userGallery = $this->getAlbumDetails($album);
            $html .= '<div class="column medium-4 gallery-image">';
            $html .= '<a href="/photos/album/?albumid=' . $userGallery->id . '"></a>';
            $html .= '<div class="gall-thumb-inner" style="background-image: url(\'/assets/thumbs/' . $userGallery->thumbnail . '\')">';
            $html .= '<p class="title">' . $userGallery->name . '</p>';
            $html .= '</div></div>';
        }
        $html .= '<div class="column medium-4 gallery-image upload-images-tile">
            <a href="#" data-reveal-id="myGallery"></a>
            <div class="gall-thumb-inner">
                <p class="title">Upload your images</p>
            </div>
        </div>';
        $html .= '</div>';
        return $html;
    }

    /*
     * Return album list
     */
    public function returnAlbumContents($id)
    {
        $html = '<h1 style="padding-bottom: 20px;">Photos by '.$userGallery = $this->getAlbumDetails($id)->name.'</h1>';
        $html .= '<div class="row">';
        foreach ($this->getAlbumImages($id) as $image) {
            $title = '';
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'assets/originals/' . $image['image'])) {
                $title = 'caption="<a style=\'color: #fff\' href=\'/assets/originals/' . $image['image'] . '\' download>Download Hi-Res Version</a>"';
            }
            $html .= '<div class="column medium-4 gallery-image inner-gallery-lightbox">';
            $html .= '<a class="lightbox" rel="gallery" href="/assets/gallery/' . $image['image'] . '" '.$title.'></a>';
            $html .= '<div class="gall-thumb-inner" style="background-image: url(\'/assets/thumbs/' . $image['image'] . '\')">';
            $html .= '</div></div>';
        }
        $html .= '</div>';
        return $html;
    }

    /*
    * Get all the album user ID's
    */
    private function returnAllAlbumIDs()
    {
        $albums = array();
        try {
            $users = $this->ftoDB->query('SELECT DISTINCT(userID) FROM gallery');
            //Check there are songs
            if ($users->rowCount() > 0) {
                foreach ($users as $user) {
                    array_push($albums, $user["userID"]);
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $ftoDB = null;
        }
        return $albums;
    }

    /*
     * Prepare the user details for the album details
     */
    private function getAlbumDetails($id)
    {
        $album = new stdClass();
        $details = $this->getUserDetails($id);
        $thumbnail = $this->getGalleryThumbnail($id);
        $meta = $this->getUserMeta($id);
        $album->id = $id;
        if(!empty($meta)) {
            $album->name = $meta['label'];
        } else {
            $album->name = $details['name'];
        }
        $album->group_id = $details['id'];
        $album->thumbnail = $thumbnail["image"];
        return $album;
    }

    /*
     * Get the user meta if it exists
     */
    private function getUserMeta($id)
    {
        $getUser = $this->ftoDB->prepare('SELECT label FROM gallery_meta WHERE userID = ' . $id);
        $getUser->execute();
        $user = $getUser->fetch();
        return $user;
    }

    /*
     * Get the user details for the album thumbnails
     */
    private function getUserDetails($id)
    {
        $getUser = $this->ftoDB->prepare('SELECT id,name FROM guests_group WHERE user_id = ' . $id);
        $getUser->execute();
        $user = $getUser->fetch();
        return $user;
    }

    /*
     * Get a gallery thumbnail
     */
    private function getGalleryThumbnail($id)
    {
        $sql = $this->ftoDB->prepare('SELECT image FROM gallery WHERE userID = ' . $id . ' AND featured = 1 ORDER BY id ASC LIMIT 1');
        $sql->execute();
        $thumbnail = $sql->fetch();
        if (empty($thumbnail)) {
            $sqlModded = $this->ftoDB->prepare('SELECT image FROM gallery WHERE userID = ' . $id . ' ORDER BY id ASC LIMIT 1');
            $sqlModded->execute();
            $thumbnail = $sqlModded->fetch();
        }
        return $thumbnail;
    }

    /*
     * Get the user details for the album thumbnails
     */
    private function getAlbumImages($id)
    {
        $getImages = $this->ftoDB->prepare('SELECT * FROM gallery WHERE userID = ' . $id. ' ORDER BY id ASC');
        $getImages->execute();
        $images = $getImages->fetchAll();
        return $images;
    }
}

$gallery = new Gallery($ftoDB);