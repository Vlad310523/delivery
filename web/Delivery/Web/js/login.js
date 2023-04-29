$("# LoginForm").submit(function(event) {
var username = $("# inputUsername").val();
var password = $("# inputPassword").val();
$.GetJSON ("./AJAX/ajax_login.php?Username =" + username + "& password = " + password,
function (result) {
if (result.status == 'true') {
$("# SignIn").removeAttr("hidden");
$("# ContinueUsername").text(username);
$("# LoginForm").hide();
$("# LoginAlert").hide();
} else {
$("# LoginAlert").removeAttr("hidden");
$("# LoginErrorMessage").text(result.message);
}
});
return false;
});
