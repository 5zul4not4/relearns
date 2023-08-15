var tabLinks = document.getElementsByClassName('tab-links');
var tabContents = document.getElementsByClassName('tab-contents');



        function openTab(tabName) {
            for (tabLink of tabLinks) {
                tabLink.classList.remove('active-link');
            }
            for (tabContent of tabContents) {
                tabContent.classList.remove('active-tab');
            }
            event.currentTarget.classList.add('active-link');
            document.getElementById(tabName).classList.add('active-tab');
        }

const navbar = document.querySelector('.navbar');
const menuList = document.querySelector('nav ul');

let prevScrollY = window.scrollY;

// Toggle the 'show' class for the menu list
document.querySelector('.fas.fa-bars').addEventListener('click', function () {
    menuList.classList.toggle('show');
});

// Add an event listener to close the menu when clicking outside
document.addEventListener('click', (event) => {
    if (!navbar.contains(event.target)) {
        menuList.classList.remove('show');
    }
});

// Auto-hide navigation menu on scroll
window.addEventListener('scroll', function() {
    const currentScrollY = window.scrollY;

    if (currentScrollY > prevScrollY) {
        navbar.classList.add('hidden');
    } else {
        navbar.classList.remove('hidden');
    }

    prevScrollY = currentScrollY;
});
    
const pass=document.querySelector("#password");
const pass2=document.querySelector("#confirmPassword");
const checkbox=document.querySelector("#check");
function switchVisibility(){
if(pass.getAttribute("type")==="password")
  pass.setAttribute("type","text");
else
  pass.setAttribute("type","password");
}

function checkpass(){
  if(pass.value===pass2.value){
  }
  else
  {
  checkbox.checked=false;
  alert('Password does not match!');
  }
}


  document.querySelector('form').addEventListener('submit', function(event) {
    var fileInput = document.getElementById('fileInput');
    var fileSize = fileInput.files[0].size; // Get the file size in bytes
    var maxSize = 1048576; // Define the maximum allowed file size in bytes (e.g., 1MB)
    var age = document.getElementById('age');
    if (fileSize > maxSize) {
      event.preventDefault(); // Prevent form submission
      alert('File size exceeds the limit. Please choose a smaller file.');
    }
     else if(pass.value!==pass2.value){
      event.preventDefault();
      alert("Password doesn't match!");
     }
     else if(age.value<18){
      event.preventDefault();
      alert("Your age is not qualified!");
      }
     else
      document.getElementById('myForm').submit();
  });

function openTermsAndConditions(event) {
event.preventDefault();
document.getElementById('termsModal').style.display = 'block';
}

function acceptTerms() {
document.getElementById('termsModal').style.display = 'none';
document.getElementById('myForm').submit();
}

function declineTerms() {
document.getElementById('termsModal').style.display = 'none';
alert('You must accept the terms and conditions to submit the form.');
}

function termsAndConditions(event) {
event.preventDefault();
document.getElementById('termstyle').style.display = 'block';
}
function readTerms() {
document.getElementById('termstyle').style.display = 'none';
}


/*
  document.getElementById("registrationForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  
  // Get form values
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastname").value;
  var gender = document.getElementById("gender").value;
  var age = document.getElementById("age").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var centerName = document.getElementById("centername").value;
  var centerAddress = document.getElementById("centeraddress").value;
  var qualification = document.getElementById("qualification").value;
  var experience = document.getElementById("experience").value;
  var interest = document.getElementById("interest").value;
  var subject = document.getElementById("subject").value;
  var mode = document.getElementById("mode").value;
  var map = document.getElementById("address").value;




  // Create a new window to print the details
  var printWindow = window.open('','Form');
  // Generate the content for printing
  var content = "<h2>Registration Details</h2>" +
                "<strong>Tutor Name:</strong> " + firstName +" " +lastName+
                "<br><strong>Gender:</strong> " + gender +
                "<br><strong>Age:</strong> " + age +
                "<br><strong>Contact:</strong> " + phone +
                "<br><strong>Email:</strong> " + email +
                "<br><strong>Tuition Center:</strong> " + centerName +
                "<br><strong>Tuition Address:</strong> " + centerAddress +
                "<br><strong>Education Qualification : </strong> " + qualification +
                "<br><strong>Class:</strong> " + interest +
                "<br><strong>Subject:</strong> " + subject +
                "<br><strong><input type='button' onclick='window.print()' value='Print'></strong> "

                // Add other fields' values in a similar manner

  // Set the content and print the window
  printWindow.document.open();
  printWindow.document.write(content);
  printWindow.document.close();
  

  // Reset the form
  document.getElementById("registrationForm");
});*/

function changeInputType() {
  var input = document.getElementById("contactInput");
  var value = input.value;

  // Checking if the value matches a phone number format
  var phoneRegex = /^[0-9()+-]*$/;
  if (phoneRegex.test(value)) {
    input.type = "tel";
    input.maxSize="10";
  }
  // Checking if the value matches an email format
  else if (value.includes("@")) {
    input.type = "email";
    
  }
  // If the value doesn't match any format, default to text
  else {
    input.type = "text";
  }
}


const optionsSelect = document.getElementById('options');
const otherInput = document.getElementById('otherInput');
const okButton = document.getElementById('okButton');

optionsSelect.addEventListener('change', function() {
  if (optionsSelect.value === 'other') {
    otherInput.style.display = 'block';
    okButton.style.display = 'block';
  } else {
    otherInput.style.display = 'none';
    okButton.style.display = 'none';
  }
});

okButton.addEventListener('click', function() {
  const inputValue = otherInput.value;
  const newOption = document.createElement('option');
  newOption.value = inputValue;
  newOption.textContent = inputValue;
  optionsSelect.appendChild(newOption);
  optionsSelect.value = inputValue; // Display the newly added value
  otherInput.style.display = 'none';
  okButton.style.display = 'none';
});

