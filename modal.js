//modal code
var modal = document.getElementById("loginModal");
var button =  document.getElementById("signInButton");
var button2 =  document.getElementById("signUpButton");
var close = document.getElementsByClassName("fa fa-times")[0];
var modalSignUp = document.getElementById("signupModal");
var openSignUp = document.getElementById("signUp");
var closeSignUp = document.getElementById("closeSignUp");

button.onclick = function() {
	modal.style.display = "block";
}
button2.onclick = function() {
	modalSignUp.style.display = "block";
}
close.onclick = function() {
	modal.style.display = "none";
}

closeSignUp.onclick = function() {
	modalSignUp.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modalSignUp) {
        modalSignUp.style.display = "none";
    }
}
openSignUp.onclick = function(){
	modal.style.display = "none";
	modalSignUp.style.display = "block";
}