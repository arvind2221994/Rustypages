function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    //var p = document.createElement("input");
 
    // Add the new element to our form. 
    //form.appendChild(p);
    //p.name = "p";
    //p.type = "hidden";
    //p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    //password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, name, roll, hostel, email, password, conf) {
     // Check each field has a value
    if (uid.value == ''        || 
          name.value == ''  || 
          roll.value == ''  || 
          hostel.value == '' ||
          email.value == ''  || 
          password.value == ''|| 
          conf.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/;
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
    
    re = /^([a-zA-Z]{2})([0-9]{2})[a-zA-Z]([0-9]{3})/;
    if(!re.test(form.roll_no.value)) { 
        alert("Please enter a valid roll no."); 
        form.roll_no.focus();
        return false; 
    }
    
    re = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    if(!re.test(form.email.value)) { 
        alert("Incorrect Email ID"); 
        form.email.focus();
        return false; 
    }
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 8) {
        alert('Passwords must be at least 8 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /^[a-z0-9_-]{6,18}$/  ; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    //var p = document.createElement("input");
 
    // Add the new element to our form. 
    //form.appendChild(p);
    //p.name = "p";
    //p.type = "hidden";
    //p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    //password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}
