// document.getElementById('myForm').addEventListener('submit', function(event) {
//         event.preventDefault(); // Prevent the default form submission
//         console.log("START");

//         var formData = new FormData(this);

//         // Create an AJAX request
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST','index.php', true);

//         xhr.onload = function() {
//             console.log("santha ");
//             if (xhr.status === 200) {
//                 document.getElementById('response').textContent = "Successfully submitted!";
//             } else {
//                 document.getElementById('response').textContent = 'An error occurred while submitting the form.';
//             }
//         };

//         xhr.send(formData); // Send the form data
//     });







//VALIDATION FOR THE PHONE  NUMBER


function isValidPhoneNumber(number) {
  const phoneUtil = require('libphonenumber-js');
  try {
    const parsedNumber = phoneUtil.parseAndKeepRawInput(number, 'US');
    return phoneUtil.isValidNumber(parsedNumber);
  } catch (error) {
    return false;
  }
}

// THE END

// THE VALIDATION FOR THE STATUS Option

const select = document.getElementById('status_select');
const statusInput = document.getElementById('status_input');

select.addEventListener('change', function(event) {
    // const selectedValue = this.value;
    const selectedValue = event.target.value; 
    console.log(selectedValue);

    if (selectedValue === 'other') {
      console.log("btn");
    statusInput.style.display = 'block'; // Show input if "Other" is selected
  } else {
    statusInput.style.display = 'none'; // Hide input otherwise
  }
});
 

// THE END

// THE VALIDATION FOR THE OTHER COURSE SELECTION Option


const other_course = document.getElementById('other_course');
const other_course_input = document.getElementById('other_course_input');

other_course.addEventListener('click', function(event) {
    // const selectedValue = this.value;
    const selectValue = event.target.value; 
    console.log(selectValue);

    if (selectValue === 'Yes') {
      console.log("btn");
    other_course_input.style.display = 'block'; // Show input if "Other" is selected
  } else {
    other_course_input.style.display = 'none'; // Hide input otherwise
  }
});

// THE END OF THE ......


// THE VALIDATION FOR THE OTHER COURSE SELECTION Option


const select_hearus = document.getElementById('select_hearus');
const hearus_input = document.getElementById('hearus_input');

select_hearus.addEventListener('change', function(event) {
    // const selectedValue = this.value;
    const selectValuefor_hearus = event.target.value; 
    console.log(selectValuefor_hearus);

    if (selectValuefor_hearus === 'other') {
      console.log("btn");
    hearus_input.style.display = 'block'; // Show input if "Other" is selected
  } else {
    hearus_input.style.display = 'none'; // Hide input otherwise
  }
});

// THE END OF THE ......

