// $(document).ready(function() {
//     $('#signupForm').on('submit', function(e) {
//         e.preventDefault();

//         // Clear previous errors
//         $('.error').text('');

//         // Get form data
//         var name = $('#name').val().trim();
//         var email = $('#email').val().trim();
//         var signupType = $('#signup-type').val();
//         var password = $('#password').val();
//         var cpassword = $('#cpassword').val();

//         // Client-side validation
//         var isValid = true;

//         if (name === '') {
//             $('#nameError').text('Name is required');
//             isValid = false;
//         }
//         if (email === '') {
//             $('#emailError').text('Email is required');
//             isValid = false;
//         }
//         if (signupType === '') {
//             $('#signupTypeError').text('Please select a signup type');
//             isValid = false;
//         }
//         if (password === '') {
//             $('#passwordError').text('Password is required');
//             isValid = false;
//         }
//         if (cpassword === '') {
//             $('#cpasswordError').text('Please confirm your password');
//             isValid = false;
//         }
//         if (password !== '' && cpassword !== '' && password !== cpassword) {
//             $('#cpasswordError').text('Passwords do not match');
//             isValid = false;
//         }

//         if (isValid) {
//             // Send data to server via AJAX
//             $.ajax({
//                 url: 'http://localhost/e-commerece/AuthController/register',
//                 method: 'POST',
//                 data: {
//                     name: name,
//                     email: email,
//                     signup_type: signupType,
//                     password: password,
//                     cpassword: cpassword
//                 },
//                 success: function(response) {
//                     try {
//                         var res = JSON.parse(response);
//                         if (res.success) {
//                             alert('Registration successful!');
//                             window.location.href = 'http://localhost/e-commerece/AuthController/loginpage';
//                         } else {
//                             // Display server-side validation errors
//                             if (res.errors.name) {
//                                 $('#nameError').text(res.errors.name);
//                             }
//                             if (res.errors.email) {
//                                 $('#emailError').text(res.errors.email);
//                             }
//                             if (res.errors.signup_type) {
//                                 $('#signupTypeError').text(res.errors.signup_type);
//                             }
//                             if (res.errors.password) {
//                                 $('#passwordError').text(res.errors.password);
//                             }
//                             if (res.errors.cpassword) {
//                                 $('#cpasswordError').text(res.errors.cpassword);
//                             }
//                         }
//                     } catch (e) {
//                         console.error('Invalid JSON response from server:', response);
//                         alert('An error occurred while processing your request. Please try again later.');
//                     }
//                 },
//                 error: function(xhr, status, error) {
//                     console.error('AJAX error:', status, error);
//                     alert('An error occurred while processing your request. Please try again later.');
//                 }
//             });
//         }
//     });
// });
 