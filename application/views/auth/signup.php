<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Signup Form Design | CodingNepal</title>
   <?php linkCSS('css/authcss/signup.css') ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
   <div class="center">
      <div class="container">
         <div class="alert alert-warning alert-dismissible fade show d-none" id="errorAlert" role="alert">
            <strong>ERRORS!</strong>
            <ul id="errorList"></ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" id="errorAlert" aria-label="Close"></button>
         </div>
         <label class="close-btn fas fa-times" title="close"></label>
         <div class="text">Signup Here</div>
         <form id="signupForm">
            <div class="data">
               <label for="name">Name</label>
               <input type="text" id="name" name="name" placeholder="Please enter your Name">
               <span id="nameError" class="error"></span>
            </div>
            <div class="data">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" placeholder="Please enter your email">
               <span id="emailError" class="error"></span>
            </div>
            <div class="data">
               <label for="signup-type">Signup As</label>
               <select id="signup-type" name="signup_type">
                  <option value="">Please select the option</option>
                  <option value="2">Seller</option>
                  <option value="3">Buyer</option>
               </select>
               <span id="signupTypeError" class="error"></span>
            </div>
            <div class="data">
               <label for="password">Password</label>
               <input type="password" id="password" name="password" placeholder="Please enter your password">
               <span id="passwordError" class="error"></span>
            </div>
            <div class="data">
               <label for="cpassword">Confirm Password</label>
               <input type="password" id="cpassword" name="cpassword" placeholder="Please confirm the password">
               <span id="cpasswordError" class="error"></span>
            </div>
            <div class="btn">
               <div class="inner"></div>
               <button type="submit">Sign Up</button>
            </div>
            <div class="signup-link">
               Already a member? <a href="<?php echo BASEURL ?>AuthController/loginpage">Login now</a>
            </div>
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Corrected the jQuery source URL -->
   <script>
      $(document).ready(function() {
         $('#signupForm').on('submit', function(e) {
            e.preventDefault();
            let form = $("#signupForm").serialize();
            $.ajax({
               url: "<?php echo BASEURL ?>/AuthController/register",
               method: 'post',
               data: form,
               success: function(res) {
                  let response = $.parseJSON(res);
                  if (response.status === 400 && response.errors) {
                     let errorMessage = '<ul>';
                     for (let key in response.errors) {
                        errorMessage += '<li>' + response.errors[key] + '</li>';
                     }
                     errorMessage += '</ul>';
                     document.getElementById('errorList').innerHTML = errorMessage;
                     document.getElementById('errorAlert').classList.remove('d-none'); // Show the alert
                  } else if (response.status === 200) {
                     document.getElementById('errorAlert').classList.add('d-none'); // Hide the alert
                     // document.querySelector('.alert').classList.remove('d-none');
                     
                  } else {
                     document.getElementById('errorAlert').classList.add('d-none'); // Hide the alert

                     // Handle other error cases
                  }

               }
            })
         })
      });
   </script>
</body>

</html>