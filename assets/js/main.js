
/* Open when someone clicks on the span element */
  function openNav() 
  {
    document.getElementById("navbar").style.width = "100%";
  }
  
  /* Close when someone clicks on the "x" symbol inside the overlay */
  function closeNav() 
  {
    document.getElementById("navbar").style.width = "0%";
  } 

// Expands portfolio card's information
  function expandPortfolioInfo()
  {

    var x = document.getElementById("testtesttest");
    // if (x.style.display === "none") {
    //   x.style.display = "block";
    // } else {
    //   x.style.display = "none";
    // }

    
      for (var i = 0; i < x.length; i++)
      {
        x[i].style.display = "block";
      }

  }


// When viewer scrolls make the button viewable
window.onscroll = function() {scrollFunction()};

var backToTopButton = document.getElementById("backToTop");

  function scrollFunction() 
  {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
    {
      backToTopButton.style.display = "block";
    } else 
    {
      backToTopButton.style.display = "none";
    }
  }

// When clicked go back to top
  function backToTop() 
  {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    behavior: 'smooth'; 
  }
// Get the modal
var modal = document.getElementById("contact-Modal");
var failedModal = document.getElementById("failed-contact-modal");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-contact-modal")[0];
var failedClose = document.getElementById("close-failed-modal");

  function closeFailedModal() 
  {
    failedModal.style.display = "none";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  
  function validateContactForm() {
    var validForm = true;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var emailAddress = document.getElementById("emailAddress").value;
    var messageField = document.getElementById("messageField").value;
    var validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(firstName) {
      document.getElementById("errorFirstName").innerHTML = "";
    } else {
      document.getElementById("errorFirstName").innerHTML = "First Name is required";
      document.getElementById("firstName").classList.add("form-error-styles");
      validForm = false;
    }

    if(lastName) {
      document.getElementById("errorLastName").innerHTML = "";
    } else {
      document.getElementById("errorLastName").innerHTML = "Last Name is required";
      document.getElementById("lastName").classList.add("form-error-styles");
      validForm = false;
    }
    if(!validEmail.test(emailAddress)) {
      document.getElementById("errorEmail").innerHTML = "Please enter a valid email";
      document.getElementById("emailAddress").classList.add("form-error-styles");
      validForm = false;
    }

    if(messageField) {
      document.getElementById("errorMessage").innerHTML = "";
    } else {
      document.getElementById("errorMessage").innerHTML = "Message is required";
      document.getElementById("messageField").classList.add("form-error-styles");
      validForm = false;
    }
    if(!validForm) {
      failedModal.style.display = "block";
      return false;
    } 



  }