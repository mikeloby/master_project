function checkUsername() {                            // Declare function
  var elMsg = document.getElementById('feedback');    // Get feedback element
  if (this.value.length < 10) {                        // If username too short
    elMsg.textContent = 'Username must be between 10 to 20 characters';  // Set msg
  } else {                                            // Otherwise
    elMsg.textContent = '';                           // Clear message
  }
}

function checkPassword() {                            // Declare function
  var elMsg = document.getElementById('feedback1');    // Get feedback element
  if (this.value.length < 10) {                        // If username too short
    elMsg.textContent = 'Password must be between 10 to 20 characters';  // Set msg
  } else {                                            // Otherwise
    elMsg.textContent = '';                           // Clear message
  }
}

function checkEmail() {                            // Declare function
  var elMsg = document.getElementById('feedback2'); 
  var email = document.getElementById('email');
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(email.value)) {                        
    elMsg.textContent = 'Please enter a valid email';  
  } else {                                           
    elMsg.textContent = '';                          
  }
}

var elUsername = document.getElementById('username'); // Get username input
elUsername.onblur = checkUsername;  // When it loses focus call checkuserName()

var elPassword = document.getElementById('password'); // Get username input
elPassword.onblur = checkPassword;  // When it loses focus call checkuserName()

var elEmail = document.getElementById('email'); // Get username input
elEmail.onblur = checkEmail;  // When it loses focus call checkuserName()