<div class="columns large-12">
    <p>Thank you for responding to our invite! You can see the details of your RSVP below along with your menu choices.</p>
    <?php
    foreach ($guests as $guest) {
        $name = $guest['name'];
        $rsvp = $guest['rsvp'];
        $starter = $guest['starter'];
        $main = $guest['main'];
        $dessert = $guest['dessert'];
        $guestID = $guest['id']; ?>
        <div class="guest row">
            <div class="columns medium-3">
                <?= $name; ?>
            </div>
            <?php if($rsvp !== '1') : ?>
            <div class="columns medium-9">
                <?= $rsvpStatus[$rsvp]; ?>
            </div>
            <?php else: ?>
            <div class="columns medium-9">
                <div class="row">
                    <div class="columns small-4">
                        <?= $transStarter[$starter]; ?>
                    </div>
                    <div class="columns small-4">
                        <?= $transMain[$main]; ?>
                    </div>
                    <div class="columns small-4">
                        <?= $transDessert[$dessert]; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php } ?>
    <a class="button small" href="#" data-reveal-id="myRSVP">Edit RSVP</a>
</div>