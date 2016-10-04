$(document).ready(function() {
    $("#preview_button").click(function( event )
    {
        if(!validate_fileds())
            return false;

        $("#preview_div .message_name").text(name);
        $("#preview_div .message_email").text(email);
        $("#preview_div .message_message").text(message);

        $("#preview_div").show();
        $("#preview_div").addClass("bg-info");
    });

    $("#submit_button").click(function( event ) {
        if(!validate_fileds())
            return false;
    });




    function validate_fileds()
    {
        name = $("#name").val();
        email = $("#email").val();
        message = $("#message").val();

        if (name == "" || email == "" || message == "")
        {
            alert("you have empty fields");
            return false;
        }

        if (!is_valid_email_address(email))
        {
            alert("email is not valid");
            return false;
        }

        return true
    }

    function is_valid_email_address(email_address)
    {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(email_address);
    };
});