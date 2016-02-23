$( document ).ready(function() {
   $('.add-note').click(function() {
       var $this = $(this);
       var $container = $this.closest( 'div.notes-field' );
       var $textarea = $container.find('textarea');
       var $fallback = $container.find('input');
       if($this.hasClass('added')) {
           $textarea.slideUp();
           $this.removeClass('added');
           $fallback.removeAttr('disabled');
       } else {
           $textarea.slideDown();
           $this.addClass('added');
           $fallback.attr('disabled', 'disabled');
       }
   });
   $('select.rsvp').on('change', function() {
       var $this = $(this);
       var $rsvp = $this.val();
       var $container = $this.closest( 'div.guest' );
       var $fieldset = $container.find('fieldset');
       if($rsvp == '1') {
           $fieldset.slideDown();
       } else {
           $fieldset.slideUp();
       }
   });
});