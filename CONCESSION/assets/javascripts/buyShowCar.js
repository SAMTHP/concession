// We save the buttons with their id
var buttonShow = document.getElementById('showForm');
var buttonHide = document.getElementById('hideForm');

// Funtion which show and hide the contact form
function showAndHide(buttonShow, buttonHide){
	var form = document.getElementById("contactForm");
	var hide = form.style.display = "none";

	buttonShow.onclick = function(){
	    if(hide){
		   	form.style.display = "block";
	    }
	}

	buttonHide.onclick = function(){
	  	form.style.display = "none";
	}
}

showAndHide(buttonShow, buttonHide);