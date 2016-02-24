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
});