<?php
$pageTitle = 'Contact me';
include('./templates/header.html');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    DEFINE('DB_USER', 'david');
    DEFINE('DB_PASSWORD', 'cs1520isawesome');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'personalsite');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR
    die('Could not establish connection to SQL server: ' . mysqli_connect_error());

    mysqli_set_charset($dbc, 'utf8');

    $Name = mysqli_real_escape_string($dbc, trim(stripslashes($_POST['Name'])));
    $Email = mysqli_real_escape_string($dbc, trim(stripslashes($_POST['Email'])));
    $Phone = mysqli_real_escape_string($dbc, trim(stripslashes($_POST['Phone_Number'])));
    $ContactReason = mysqli_real_escape_string($dbc, trim(stripslashes($_POST['Contact_Reason'])));

    $q = "INSERT INTO contacts(name, email, phone, reason)
          VALUES ('$Name', '$Email','$Phone', '$ContactReason') ";

    $r = mysqli_query($dbc, $q);

    if ($r && mysqli_affected_rows($dbc) == 1) {

        # tell user they are registered successfully
        echo "<p>Contact Received Thank You!</p>";

    } else {

        # tell user their profile could not be created
        echo "<p>Contact info not received.</p>";

        # give debug info
        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
    }
}
?>
<form id="contactme" method="post" action="#">
    <br/>
    <label for="name">Name:</label>
    <input id="name" type="text" name="Name" placeholder="required">
    <br/><br/>
    <label for="email">Email:</label>
    <input id="email" type="email" name="Email" placeholder="required">
    <br/><br/>
    <label for="phonenumber"> Phone Number:</label>
    <input id="phonenumber" type ="text" name="Phone_Number">
    <br/><br/>
    <label for="contactreason">Reason for Contact:</label>
    <textarea id="contactreason" name="Contact_Reason" rows="3" cols="1" placeholder="Please enter a brief description"></textarea>
    <br/><br/><br/>
    <button id="submitinfo" type="submit">Contact Me</button>

    <div id="dialogs" style="display:none;">
        <div id="dialog-box" title="Required Field">
            <span id="dialogIcon" class="imgInfo" style="float:left;margin:10px 15px 10px 10px;"></span>
            <p style="font-size:.9em;line-height:1.7em;"><label id="dialogMessage" style="width:100%;text-align: left;">Please fill out the required fields before submitting.</label></p>
            <!--<p id="subtitle" style="font-size:.7em; margin-bottom:-.5em;">Click OK to continue or click Email to send this issue to the webmaster.</p>-->
        </div>
    </div>
</form>

<script type="text/javascript">
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
    });
</script>
<?php
include('./templates/footer.html');
?>