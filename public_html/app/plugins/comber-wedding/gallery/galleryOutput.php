<?php

require_once(__DIR__.'/../database/connect.php');

class Gallery {

    function __construct($ftoDB) {
        $this->ftoDB = $ftoDB;
    }

    /*
     * Get all the album thumbnails
     */
    public function returnAllAlbumIDs() {
        $albums = array();
        try {
            $users = $this->ftoDB->query('SELECT DISTINCT(userID) FROM gallery');
            //Check there are songs
            if ($users->rowCount() > 0) {
                foreach($users as $user) {
                    array_push($albums, $user["userID"]);
                }
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            $ftoDB = null;
        }
        return $albums;
    }

    public function getAlbumDetails($id) {
        $album = new stdClass();
        $details = $this->getUserDetails($id);
        $thumbnail = $this->getGalleryThumbnail($id);
        $album->id = $id;
        $album->name = $details['name'];
        $album->group_id = $details['id'];
        $album->thumbnail = $thumbnail["image"];
        return $album;
    }

    /*
     * Get the user details for the album thumbnails
     */
    private function getUserDetails($id) {
        $getUser = $this->ftoDB->prepare('SELECT id,name FROM guests_group WHERE user_id = '.$id);
        $getUser->execute();
        $user = $getUser->fetch();
        return $user;
    }

    /*
     * Get a gallery thumbnail
     */
    private function getGalleryThumbnail($id) {
        $sql = $this->ftoDB->prepare('SELECT image FROM gallery WHERE userID = '.$id.' AND featured = 1 ORDER BY id ASC LIMIT 1');
        $sql->execute();
        $thumbnail = $sql->fetch();
        if(empty($thumbnail)) {
            $sqlModded = $this->ftoDB->prepare('SELECT image FROM gallery WHERE userID = '.$id.' ORDER BY id ASC LIMIT 1');
            $sqlModded->execute();
            $thumbnail = $sqlModded->fetch();
        }
        return $thumbnail;
    }
}

$gallery = new Gallery($ftoDB);