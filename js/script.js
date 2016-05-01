/**
 * Created by David on 3/13/2016.
 */
src="https://code.jquery.com/jquery-1.10.2.js"

$(document).ready(function() {
    // set focus to first available input when page ready
    $('form:first *:input[type!=hidden]:first').focus();

    // show modal dialog to user if they submitted a form
    //      without filling out all of the required fields
    $('form').submit(function(event) {
        // get all the required inputs into an array.
        var requiredInputs = $(this).find(':input[placeholder]');
        var reqFieldsAllDone = true;
        var firstFieldNotCompleted;

        // make sure all required fields have been filled out
        $(requiredInputs).each(function(){
            if (this.value === '') {
                // all required fields not filled
                reqFieldsAllDone = false;

                // remember the first field NOT yet completed by the user
                if (!firstFieldNotCompleted) { firstFieldNotCompleted = this; }
            }
        }); 

        // show dialog that user must fill out all required fields
        if (reqFieldsAllDone === false) {
            // prevent the submit action
            event.preventDefault();

            $("#dialog-box").dialog({
                resizable: false,
                draggable: false,
                modal: true,
                buttons: {
                    OK: function() {
                        // close the modal dialog
                        $(this).dialog("close");

                        // set focus to the first required field
                        //      not yet completed
                        $(firstFieldNotCompleted).focus();
                    }
                }
            });
        }
    });

	var jumboHeight = $('.jumbotron').outerHeight();
	function parallax(){
	    var scrolled = $(window).scrollTop();
	    $('.bg').css('height', (jumboHeight-scrolled) + 'px');
	}

	$(window).scroll(function(e){
	    parallax();
	});
});