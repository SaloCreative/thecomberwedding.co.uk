$( document ).ready(function() {
   $('.add-note').click(function() {
       var $this = $(this);
       var $container = $this.closest( 'div.notes-field' );
       var $textarea = $container.find('textarea');
       var $fallback = $container.find('input');
       if($this.hasClass('added')) {
           $this.removeClass('added');
           $textarea.attr('disabled', 'disabled');
           $textarea.slideUp();
       } else {
           $textarea.slideDown();
           $this.addClass('added');
           $textarea.removeAttr('disabled');
       }
   });
   $('select.rsvp').on('change', function() {
       var $this = $(this);
       var $rsvp = $this.val();
       var $container = $this.closest( 'div.guest' );
       var $fieldset = $container.find('fieldset');
       if($rsvp == '1') {
           $fieldset.slideDown();
           $fieldset.removeAttr('disabled');
           $fieldset.find('select').removeAttr('disabled');
       } else {
           $fieldset.attr('disabled', 'disabled');
           $fieldset.find('select').attr('disabled', 'disabled');
           $fieldset.slideUp();
       }
   });
});