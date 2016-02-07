<div class="columns large-12">
    <p>Thank you for responding to our invite! You can see the details of your RSVP below along with your menu choices. You can change your meal choices up until 2 weeks prior to the wedding.</p>
    <?php
    foreach ($guests as $guest) {
        $name = $guest['name'];
        $rsvp = $guest['rsvp'];
        $starter = $guest['starter'];
        $main = $guest['main'];
        $dessert = $guest['dessert'];
        $guestID = $guest['id']; ?>
        <div class="guest">
            <div class="columns medium-3">
                <?= $name; ?>
            </div>
            <div class="columns medium-3">
                <?= $rsvpStatus[$rsvp]; ?>
            </div>
            <div class="columns medium-6">
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
        </div>
    <?php } ?>
    <div class="columns large-12">
        <input type="submit" class="button" value="RSVP" />
    </div>
</div>