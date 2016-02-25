$( document ).ready(function() {
   $('.add-note').click(function() {
       var $this = $(this);
       var $container = $this.closest( 'div.notes-field' );
       var $textarea = $container.find('textarea');
       if($this.hasClass('added')) {
           $this.removeClass('added');
           $textarea.slideUp();
       } else {
           $textarea.slideDown();
           $this.addClass('added');
       }
   });
   $('select.rsvp').on('change', function() {
       var $this = $(this);
       var $rsvp = $this.val();
       var $container = $this.closest( 'div.guest' );
       var $fieldset = $container.find('fieldset');
       if($rsvp == '1') {
           $fieldset.slideDown();
           $fieldset.find('select').attr('required', 'required');
       } else {
           $fieldset.find('select').removeAttr('required');
           $fieldset.slideUp();
       }
   });

    // Add new music choice =================
    var $musicWrapper = $('.form-field-insert');

    $('.add-new-row').click(function() {
        var $clonedField = $( 'div.music-insert' ).clone();
        $clonedField.find('input.song, input.artist').val('');
        $clonedField.appendTo( '.form-field-insert' ).removeClass('music-insert');
    });

    // Remove choice =========================

    $musicWrapper.on('click', '.remove-row',  function() {
        var $this = $(this);
        var $removeThis = $(this).closest('div.row');
        $removeThis.remove();
    });

});