(function ($) {

//=============== Events JQuery
$(document).ready(function() {

// ============ en cliquant sur les champs name et pass on affecte la valeur null aux Id "input_name" et "input_pass"
$("#input_name").click( function() {
$("#input_name").val('');
});
    $("#input_pass").click( function() {
$("#input_pass").val('');
}); // =========== End on click in <input> name and password

// ============== END Events JQuery
});

})(jQuery);