const form = document.getElementById("test-questions");

form.addEventListener("submit", function (event) {
  event.preventDefault();
  const question1 = form.elements.question1.value;
  const question2 = form.elements.question2.value;
  const question3 = form.elements.question3.value;
  const question4 = form.elements.question4.value;
  const question5 = form.elements.question5.value;
  const question6 = form.elements.question6.value;
  const question7 = form.elements.question7.value;
  const question8 = form.elements.question8.value;
  const question9 = form.elements.question9.value;
  const question10 = form.elements.question10.value;

  let score = 0;
  if (question1 === "A") {
    score += 1;
  }
  if (question2 === "C") {
    score += 1;
  }
  if (question3 === "A") {
    score += 1;
  }
  if (question4 === "B") {
    score += 1;
  }
  if (question5 === "B") {
    score += 1;
  }
  if (question6 === "B") {
    score += 1;
  }
  if (question7 === "A") {
    score += 1;
  }
  if (question8 === "A") {
    score += 1;
  }
  if (question9 === "A") {
    score += 1;
  }
  if (question10 === "B") {
    score += 1;
  }
  document.getElementById("test-result").innerHTML = "Your score is " + score + " out of 10.";
});


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
