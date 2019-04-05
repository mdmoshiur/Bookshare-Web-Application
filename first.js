var x = document.forms['myForm']['fname'].value;
var roll = document.forms['myForm']['roll'].value;
function validateForm() {
	// body...
	if(x== 'moshiur'){
		alert("fuck");
		return false;
	}
	if( roll != 1503113){
		alert('what is happening');
		return false;
	}
}