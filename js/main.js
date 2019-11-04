/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("navbar").style.width = "100%";
  }
  
  /* Close when someone clicks on the "x" symbol inside the overlay */
  function closeNav() {
    document.getElementById("navbar").style.width = "0%";
  } 

var backToTopButton = document.getElementById("backToTop");


// When viewer scrolls make the button viewable
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
}

// When clicked go back to top
function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}