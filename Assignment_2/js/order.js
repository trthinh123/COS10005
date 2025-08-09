
function showAddress() {
    var deliveryMethod = document.getElementById("deliveryMethod");
    var inform = document.getElementById("inform");

    // Check if "Delivery" option is selected
    if (deliveryMethod.value === "delivery") {
        inform.style.display = "block";
    } else {
        inform.style.display = "none";
    }
}

function hideAddress() {
    var pick = document.getElementById("pick");
    var inform = document.getElementById("inform");
    if (pick.checked == true)  {
        inform.style.display = "none";
    }
}
function showCreditCardInfo() {
    var payOnline = document.getElementById("pay-online");
    var inform = document.getElementById("payment-inform");

    if (payOnline.checked === true) {
        inform.style.display = "block";
    } 
}
function hideCreditCardInfo() {
    var offline = document.getElementById("pay-on-pickup");
    var credit_car = document.getElementById("payment-inform");
    if (offline.checked == true)  {
        credit_car.style.display = "none";
    }
}


// Add event listener to "deliveryMethod" select element


function validate(){
    var Vanila = document.getElementById("vanila-checkbox").checked;
    var Socola = document.getElementById("strawbery-checkbox").checked;
    var Strawberry = document.getElementById("socola-checkbox").checked;
    var VanilaQuantity= document.getElementById("Vanila-Quantity").checked;
    var strawberyQuantity= document.getElementById("strawbery-Quantity").checked;
    var socolaQuantity= document.getElementById("socola-Quantity").checked;
    var deliveryMethod = document.getElementById("deliveryMethod").value;
    var Deliveryadress= document.getElementById("Delivery-ad").value;
    var billingDeliveryadress= document.getElementById("billing-ad").value;
    var email= document.getElementById("emails").value;
    var contactnumber= document.getElementById("contact-number").value;
    var payonpickup= document.getElementById("pay-on-pickup").checked;
    var payonline= document.getElementById("pay-online").checked;
  
    
    var America= document.getElementById("American-Express").checked;
    var creditnum= document.getElementById("card-number").value;
    
    var errMsg = "";
    if ((Vanila == "")&&(Socola == "") &&( Strawberry == "")) {
		errMsg += "At least one ice creams must be selected.\n";
	}

    
    
    if (email ==""){
        errMsg += "Please type the email address\n";
    }
    if (contactnumber ==""){
        errMsg +="Please type the contact numbers \n";
    }
    
    if ((payonline =="") && ((payonpickup) =="")){
        errMsg +="Payment method must be completed \n";

    }
    if ((document.getElementById("visa").checked) && ( creditnum.length !== 16)) {
		errMsg += "Visa card number has to be 16-digit.\n";
	}
	if ((document.getElementById("master-card").checked) && ( creditnum.length !== 16)) {
		errMsg += "Mastercard number has to be 16-digit.\n";
	}
	if ((document.getElementById("American-Express").checked) && ( creditnum.length !== 15)) {
		errMsg += "American Express card number has to be 15-digit.\n";
	}





    if (errMsg !== "") {
        alert(errMsg);
        return false; // Prevent form submission
    }
    
    

    return true; // Form is valid, allow submission
}
function init () {
	/* link the variables to the HTML elements */
  var regForm = 	document.getElementById("order-form");

	/* assigns functions to corresponding events */
  regForm.onsubmit = validate;
}

/* execute the initialisation function once the window*/
window.onload = init;