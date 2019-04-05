// variables 
var name = document.forms['signup']['name'].value;
var password = document.forms['signup']['password'].value;
var repeat_password = document.forms['signup']['repeat_password'].value;


function validate_signup(){
	// body...
	if(password != repeat_password){
		alert("two passwords don't match !");
		return false;
	}
}
