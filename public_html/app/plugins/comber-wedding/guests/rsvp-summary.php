<div class="columns large-12">
    <?php
    foreach ($guests as $guest) {
        $name = $guest['name'];
        $surname = $guest['surname'];
        $rsvp = $guest['rsvp'];
        $starter = $guest['starter'];
        $main = $guest['main'];
        $dessert = $guest['dessert'];
        $guestID = $guest['id']; ?>
        <div class="guest row rsvp-summary">
            <div class="columns medium-12">
                <p class="guest-name"><?= $name.' '.$surname; ?> - <span><?= $rsvpStatus[$rsvp]; ?></span></p>
            </div>
            <?php if($rsvp == '1') : ?>
                <div class="columns medium-4">
                    <div class="panel"><?= $transStarter[$starter]; ?></div>
                </div>
                <div class="columns medium-4">
                    <div class="panel"><?= $transMain[$main]; ?></div>
                </div>
                <div class="columns medium-4">
                    <div class="panel"><?= $transDessert[$dessert]; ?></div>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
    <?php //<a class="button" href="#" data-reveal-id="myRSVP">Edit RSVP</a> ?>
</div>