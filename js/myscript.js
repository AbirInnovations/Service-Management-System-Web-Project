function validateForm() {
    var isValid = true; // Start with a valid form assumption
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var password = document.forms["myForm"]["password"].value;
    var mobile_number = document.forms["myForm"]["mobile_number"].value;

    // Clear previous errors
    // document.getElementById("nameerror").innerHTML = "";
    // document.getElementById("emailerror").innerHTML = "";
    // document.getElementById("passworderror").innerHTML = "";
    // document.getElementById("mobile_number_error").innerHTML = "";


    if (/[\d]/.test(name)) {
        document.getElementById("nameerror").innerHTML = "Name must not contain numbers.";
        isValid = false;
    }


    if (email.length > 30 || !email.includes('@') || !email.includes('.')) {
        document.getElementById("emailerror").innerHTML = "Email must be less than 30 characters and contain @ and .";
        isValid = false;
    }


    if (!/[@#$&]/.test(password)) {
        document.getElementById("passworderror").innerHTML = "Password must contain at least one special character (@, #, $, or &).";
        isValid = false;
    }

   
    if (mobile_number.length > 11) {
        document.getElementById("mobile_number_error").innerHTML = "Mobile number must not be longer than 11 digits.";
        isValid = false;
    }

    // Only proceed if all validations pass
    return isValid;
}
function checkAreaAvailability() {
    console.log("Function called.");
    var areaName = document.getElementById("areaName").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log("Ready state: " + this.readyState + ", status: " + this.status);
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "http://localhost/midproject/controllers/checkArea.php?area=" + areaName, true); //areaName as a query parameter
    xhttp.send();
}

function showServices() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let services = JSON.parse(this.responseText); //parses the JSON response text into a JavaScript object
            let output = '<tr><th>Service Type</th><th>Units Available</th></tr>';

            for (let service of services) {
                output += `
                    <tr>
                        <td>${service.service_type}</td>
                        <td>${service.units_available}</td>
                    </tr>
                `;
            }
            document.getElementById("result").innerHTML = output;
        }
    };
    xhttp.open("GET", "../models/serviceModel.php", true);
    xhttp.send();
}

