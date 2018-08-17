$(document).ready(function () {
    $("#limit").change(function () {
        value = $("#limit").val();
        $.ajax({
            "url": baseurl + "gcms/users/shownumber",
            "type": "POST",
            "data": "value=" + value,
            "success": function (result) {
                location.reload();
            }
        })
    });
})

$(document).ready(function () {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.gcms_add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>';
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});