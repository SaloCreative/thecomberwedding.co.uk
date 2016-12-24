var Dropzone = require('dropzone');

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
    $('#menuTrigger').click(function() {
        var $this = $(this);
        $this.toggleClass('active');
        $('#navigation').slideToggle();
        $('#menu-wrapper').toggleClass('active');
    });

    // Add new music choices =================
    var $musicWrapper = $('.form-field-insert');

    $('.add-new-row').click(function() {
        var $clonedField = $( 'div.music-insert' ).clone();
        $clonedField.find('input.song, input.artist').val('');
        $clonedField.appendTo( '.form-field-insert' ).removeClass('music-insert');
        $(document).foundation('equalizer', 'reflow');
    });

    // Remove choice =========================

    $musicWrapper.on('click', '.remove-row',  function() {
        var $this = $(this);
        var $removeThis = $(this).closest('div.row');
        $removeThis.remove();
        $(document).foundation('equalizer', 'reflow');
    });

});

var maxImageWidth = 6000,
    maxImageHeight = 6000;
// "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.myWeddingGallery = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 15, // MB
    addRemoveLinks: false,
    acceptedFiles: '.jpg,.JPG,.jpeg,.png,.gif',
    dictDefaultMessage: '<h3>Drop images or click to upload</h3> <br> (max file size 10MB and images can\'t be more than 6000px in width or height)',
    init: function() {
        // Register for the thumbnail callback.
        // When the thumbnail is created the image dimensions are set.
        this.on("thumbnail", function(file) {
            // Do the dimension checks you want to do
            if (file.width > maxImageWidth || file.height > maxImageHeight) {
                file.rejectDimensions()
            }
            else {
                file.acceptDimensions();
            }
        });
    },
    accept: function(file, done) {
        file.acceptDimensions = done;
        file.rejectDimensions = function() { done("Image can't be more than 6000px in width or height"); };
    }
};