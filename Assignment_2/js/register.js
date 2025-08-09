function validate (){
    var nameuser= document.getElementById("name-user").value;
    var email= document.getElementById("emails").value;
    var males = document.getElementById("male").checked;
    var females = document.getElementById("female").checked;
    var contactnumber= document.getElementById("contact-number").value;
    var pw1 = document.getElementById("pass").value;
    var pw2 = document.getElementById("re-pass").value;
    var postcode = document.getElementById("postcode").value;
    var errMsg = "";
    if (nameuser==""){
        errMsg += "User name cannot be empty.\n";
    }
    if (email ==""){
        errMsg += "Email cannot be empty!\n";
    }
    if((males =="") && (females =="")){
        errMsg += "Gender must completed\n";

    }
    if (contactnumber ==""){
        errMsg += "Contact number cannot be empty \n";
    }
    if(pw1 ==""){
        errMsg += "Password cannot be empty \n";
    }if (pw1.length < 9) {
		errMsg += "Password has to be at least 8 characters long.\n";
    }
    if (pw2 ==""){
        errMsg += "Retyped password must be completed \n";
    }if (pw1 != pw2) {
		errMsg += "Passwords do not match.\n";
	}
    if (!postcode.match(/^(?=.*\d).{4}$/)) {
		errMsg += "Postcode has to be 4-digit.\n";
	}
    
    
    if (errMsg !== "") {
        alert(errMsg);
        return false; // Prevent form submission
    }
    
    

    return true; // Form is valid, allow submission

}
function init () {
	/* link the variables to the HTML elements */
  var regForm = 	document.getElementById("reg-form");

	/* assigns functions to corresponding events */
  regForm.onsubmit = validate;
}

/* execute the initialisation function once the window*/
window.onload = init;