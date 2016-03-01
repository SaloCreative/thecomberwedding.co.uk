<form action="<?= plugins_url();?>/comber-wedding/gallery/upload.php" class="dropzone" id="myWeddingGallery">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
    <?php //Pass user details to save action to crudely verify
    $current_user = wp_get_current_user();
    $userEmail = $current_user->user_login;
    $wpUser = $current_user->ID; ?>
    <input type="hidden" name="userId" value="<?= $wpUser; ?>" />
    <input type="hidden" name="userEmail" value="<?= $userEmail; ?>" />
    <input type="hidden" name="galleryNonce" value="12r23tfwegwqt4yefew1^$@36gfu2fg239urt287rbc278vc2bvc7" />
</form>