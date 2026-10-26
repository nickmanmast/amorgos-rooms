function checkForm(){

    var fname = document.getElementById("firstName").value;
    var lname = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var pnumber = document.getElementById("phone").value;
    var adults = document.getElementById("numa").value;
    var kids = document.getElementById("numk").value;
    var arrivalDate = document.getElementById("ardate").value;
    var departureDate = document.getElementById("depdate").value;
    var pets = document.getElementById("pet").value;
    var comments = document.getElementById("comments").value;
    const form = document.getElementById("form");

    form.addEventListener('submit', (e) => {
    if (fname == "") {
        alert("Name field must not be empty");
        return false;
      }else if(fname.length < 2){
        alert("Name must be at least 2 characters long");
        return false;
      }

      if (lname == "") {
        alert("Lastname field must not be empty");
        return false;
      }else if(lname.length < 2){
        alert("Lastname must be at least 2 characters long");
        return false;
      }

      if (email == "") {
        alert("Email field must not be empty");
        return false;
      } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(email)) {
          alert("Email is not in a valid format");
          return false;
        }
      }

      if (pnumber == "") {
        alert("Phone number field must not be empty");
        return false;
      } else if(pnumber.length < 10 || pnumber.length > 15){
        alert("Phone number must be between 10 and 15 characters long");
        return false;
      }

      if (adults == "") {
        alert("Adults field must not be empty");
        return false;
      } else if(adults < 1){
        alert("Adults must be a number greater than 0");
        return false;
      }

      if (arrivalDate == "") {
        alert("Arrival date field must not be empty");
        return false;
      } 

    })  

}

/*function checkForm() {
    // Clear previous error messages
    document.getElementById('firstNameError').textContent = '';
    document.getElementById('lastNameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('phoneError').textContent = '';
    document.getElementById('arrivalError').textContent = '';
    document.getElementById('departureError').textContent = '';

    // Get input field values
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById("phone").value;
    var arrival = document.getElementById('arrival').value;
    var departure = document.getElementById('departure').value;

    // Validate input fields
    let valid = true;

    // Validate first name
    if (firstName.length < 2) {
        alert("First name must be at least 2 characters long.");
        return false;
    }

    // Validate last name
    if (lastName.length < 2) {
        alert("Last name must be at least 2 characters long.");
        return false;
    }

    // Validate email

    if (email == "") {
      alert("Email field must not be empty");
      return false;
    } else {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!re.test(email)) {
        alert("Email is not in a valid format");
        return false;
      }
    }

    // Validate phone number
    const phonePattern = /^[0-9]{10,15}$/;
    if (!phonePattern.test(phone)) {
        document.getElementById('phoneError').textContent = 'Phone number must be between 10 and 15 digits.';
        valid = false;
    }

    // Validate arrival date
    const today = new Date().toISOString().split('T')[0];
    if (arrival < today) {
        document.getElementById('arrivalError').textContent = 'Arrival date cannot be in the past.';
        valid = false;
    }

    // Validate departure date
    if (departure <= arrival) {
        document.getElementById('departureError').textContent = 'Departure date must be after the arrival date.';
        valid = false;
    }

    // If form is valid, submit it
    if (valid) {
        alert("Form submitted successfully!");
        return true; // Allow form submission
    } else {
        return false; // Prevent form submission
    }

  return true;     
}*/