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
         <div class="text">login here</div>
         <form id="loginForm">
            <div class="data">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" placeholder="Please enter your email">
               <span id="emailError" class="error"></span>
            </div>
            <div class="data">
               <label for="password">Password</label>
               <input type="password" id="password" name="password" placeholder="Please enter your password">
               <span id="passwordError" class="error"></span>
            </div>
            <div class="btn">
               <div class="inner"></div>
               <button type="submit">login</button>
            </div>
            <div class="signup-link">
               register Now <a href="<?php echo BASEURL ?>AuthController/signuppage">Login now</a>
            </div>
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Corrected the jQuery source URL -->
   <script>
      $(document).ready(function() {
         $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            let form = $("#loginForm").serialize();
            $.ajax({
               url: "<?php echo BASEURL ?>/AuthController/login",
               method: 'post',
               data: form,
               success: function(res) {
               //  alert(res);
                  let response = $.parseJSON(res);
                  if (response.status === 400 && response.errors) {
                     let errorMessage = '<ul>';
                     for (let key in response.errors) {
                        errorMessage += '<li>' + response.errors[key] + '</li>';
                     }
                     errorMessage += '</ul>';
                     document.getElementById('errorList').innerHTML = errorMessage;
                     document.getElementById('errorAlert').classList.remove('d-none'); // Show the alert
                  }
                  else if (response.status === 401 && response.message) {
                    let errorMessage = '<li>' + response.message + '</li>';
                    $('#errorList').html(errorMessage);
                    $('#errorAlert').removeClass('d-none'); // Show the alert
                  } 
                  else if (response.status === 200) {
                     document.getElementById('errorAlert').classList.add('d-none'); // Hide the alert
                     // document.querySelector('.alert').classList.remove('d-none');
                     window.location.href = '<?php echo BASEURL ?>';
                     
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