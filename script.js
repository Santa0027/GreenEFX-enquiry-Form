// (function () {
//   "use strict";
  

//     // Define displayError function outside the forEach loop
//         function displayError(thisForm, error) {
//             thisForm.querySelector('.loading').classList.remove('d-block');
//             thisForm.querySelector('.error-message').innerHTML = error;
//             thisForm.querySelector('.error-message').classList.add('d-block');
//         }

//     const forms = document.querySelectorAll('.formdetails');
//     forms.forEach(function (e) {
//       e.addEventListener('submit', function (event) {
//         event.preventDefault();

//         let action = thisForm.getAttribute('action');
//         let formData = new FormData(thisForm);
//         thisForm.reset();

//          if (recaptcha) {
//                 if (typeof grecaptcha !== "undefined") {
//                     grecaptcha.ready(function() {
//                         try {
//                             grecaptcha.execute(recaptcha, {action: 'form_submit'})
//                             .then(token => {
//                                 formData.set('recaptcha-response', token);
//                                 form_submit(thisForm, action, formData);
//                             })
//                         } catch(error) {
//                             displayError(thisForm, error);
//                         }
//                     });
//                 } else {
//                     displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
//                 }
//             } else {
//                 form_submit(thisForm, action, formData);
//               }
//         });
//     });
// });







// function form_submit(thisForm, action, formData) {
//         fetch(action, {
//             method: 'POST',
//             body: formData,
//             headers: {'X-Requested-With': 'XMLHttpRequest'}
//         })
//         .then(response => {
//             if (response.ok) {
//                 console.log(response);
//                 console.log(response.text());
//                 var data=response.statusText;
//                  console.log(data);
//                 return response.text();
                
//             } else {
//                 throw new Error(`${response.status} ${response.statusText} ${response.url}`);
//             }
//         })
//         .then(data => {
//             thisForm.querySelector('.loading').classList.remove('d-block');
//             console.log(data);
//             if (data.trim() == 'OK') {
//                 // console.log("working");

//                 thisForm.querySelector('.sent-message').classList.add('d-block');
//                 thisForm.reset();
//             } else {
//                 console.log("not working ");
//                 displayError(thisForm,"something went wrong .");
//             }
//         })
//         .catch((error) => {
//             displayError(thisForm,error);
//         });
//     }












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

other_course.addEventListener('change', function(event) {
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

