<div class="columns large-12">
    <p>Thank you for responding to our invite! You can see the details of your RSVP below along with your menu choices.</p>
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
            <div class="columns medium-4">
                <p class="guest-name"><?= $name.' '.$surname; ?></p>
            </div>

            <div class="columns medium-8">
                <p class="rsvp-status"><?= $rsvpStatus[$rsvp]; ?></p>
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
    <a class="button small" href="#" data-reveal-id="myRSVP">Edit RSVP</a>
</div>