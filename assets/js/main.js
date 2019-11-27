
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
var failedClose = document.getElementsByClassName("failed-close-contact-modal")[0];

  // When the user clicks on span (x), close the modal
  failedClose.onclick = function() {
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
  window.onclick = function(event) {
    if (event.target == failedModal) {
      failedModal.style.display = "none";
    }
  }
  
  function validateContactForm() {
    var validForm = true;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var emailAddress = document.getElementById("emailAddress").value;
    var messageField = document.getElementById("messageField").value;
    
    if(firstName) {
      document.getElementById("errorFirstName").innerHTML = "";
    } else {
       document.getElementById("errorFirstName").innerHTML = "First Name is required";
      validForm = false;
    }

    if(lastName) {
      document.getElementById("errorLastName").innerHTML = "";
    } else {
       document.getElementById("errorLastName").innerHTML = "Last Name is required!";
      validForm = false;
    }

    if(emailAddress) {
      document.getElementById("errorEmail").innerHTML = "";
    } else {
       document.getElementById("errorEmail").innerHTML = "Email is required!";
      validForm = false;
    }

    if(messageField) {
      document.getElementById("errorMessage").innerHTML = "";
    } else {
       document.getElementById("errorMessage").innerHTML = "Email is required!";
      validForm = false;
    }
    if(!validForm) {
      failedModal.style.display = "block";
      return false;
    } 



  }