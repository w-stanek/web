element = document.querySelector('#navUl'); //change to your ID
function myFunction(x) {
  if (!(x.matches)) { // If media query doesnt matches
    element.removeAttribute('data-toggle');
    element.removeAttribute('data-target');
  } else {
    element.setAttribute("data-toggle", "collapse");
    element.setAttribute("data-target", "#navbarNav");
  }
}

var x = window.matchMedia("(max-width: 992px)") //chnage to your menu collapse breakpoint
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes 