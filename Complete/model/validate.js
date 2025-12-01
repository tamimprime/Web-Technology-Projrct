// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var fname = document.signupForm.fname.value;
    var lname = document.signupForm.lname.value;
    var email = document.signupForm.email.value;
    var gender = document.signupForm.gender.value;
    var address = document.signupForm.address.value;
    var username = document.signupForm.username.value;
    var password = document.signupForm.password.value;
    var role = document.signupForm.role.value;

    // Defining error variables with a default value
    var fnameErr = lnameErr = genderErr = addressErr = usernameErr = passwordErr = emailErr = roleErr = true;

    // Validate first name
    if (fname == "") {
        printError("fnameErr", "Please enter your first name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }

    // Validate last name
    if (fname == "") {
        printError("lnameErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lname) === false) {
            printError("lnameErr", "Please enter a valid name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }

    // Validate address
    if (address == "") {
        printError("addressErr", "Please enter your address");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(address) === false) {
            printError("addressErr", "Please enter a address");
        } else {
            printError("addressErr", "");
            addressErr = false;
        }
    }

    // Validate username
    if (username == "") {
        printError("usernameErr", "Please enter your username");
    } else {
        var regex = /^[a-zA-Z0-9]+$/;
        if (regex.test(username) === false) {
            printError("usernameErr", "Your username should contain alphabets and numbers");
        } else {
            printError("usernameErr", "");
            usernameErr = false;
        }
    }

    // Validate email address
    if (email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }

    // Validate password
    if (password == "") {
        printError("passwordErr", "Please enter your password");
    } else {
        var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if (regex.test(password) === false) {
            printError("passwordErr", "Password should contain at least one number, one uppercase character and one special character");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }

    // Validate gender
    if (gender == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    // Validate role
    if (role == "") {
        printError("roleErr", "Please select your role");
    } else {
        printError("roleErr", "");
        roleErr = false;
    }

    // Prevent the form from being submitted if there are any errors
    if ((fnameErr || emailErr || usernameErr || passwordErr || roleErr || lnameErr || genderErr || addressErr) == true) {
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "First Name: " + fname + "\n" +
            "Last Name: " + lname + "\n" +
            "Gender" + gender +"\n" +
            "Address: " + address + "\n" +
            "Email Address: " + email + "\n" +
            "Username: " + username + "\n" +
            "Password: " + password + "\n" +
            "Role: " + role + "\n";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }

};


// Toggle password visibility
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pass');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

// Login validation
function loginValidate() {
    var username = document.getElementById("user").value;
    var password = document.getElementById("pass").value;
    if (username == null || username == "") {
        alert("Please enter  the username.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }
    // alert('Login successful');

}