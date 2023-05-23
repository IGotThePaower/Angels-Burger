document.getElementById("sendButton").addEventListener("click", function(event){
    event.preventDefault();  // Prevent form submission
  
    var name = document.getElementById("nameField").value;
    var email = document.getElementById("emailField").value;
    var message = document.getElementById("messageField").value;
  
    var contactData = {
      'name': name,
      'email': email,
      'message': message
    };
  
    // Save to local storage
    localStorage.setItem('contactData', JSON.stringify(contactData));
  
    // Clear fields
    document.getElementById("nameField").value = "";
    document.getElementById("emailField").value = "";
    document.getElementById("messageField").value = "";
  
    // Show feedback message
    document.getElementById("feedback").textContent = "Thank you! Your submission was successful.";
    
    // Remove the feedback message after 3 seconds
    setTimeout(function(){
      document.getElementById("feedback").textContent = "";
    }, 3000);
  });
  