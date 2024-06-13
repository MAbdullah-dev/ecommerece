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
<div class="container">
   
   <div class="card shadow p-4 mx-auto mt-5" style="max-width: 500px;">
       <div class="alert alert-warning alert-dismissible fade show d-none" id="errorAlert" role="alert">
           <strong>ERRORS!</strong>
           <ul id="errorList"></ul>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
        <h2 class="text-center mb-4">Signup Here</h2>
        <form id="signupForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Please enter your Name">
                <span id="nameError" class="error"></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Please enter your email">
                <span id="emailError" class="error"></span>
            </div>

            <div class="mb-3">
                <label for="signup-type" class="form-label">Signup As</label>
                <select id="signup-type" name="signup_type" class="form-select" onchange="toggleStoreNameField()">
                    <option value="">Please select the option</option>
                    <option value="2">Seller</option>
                    <option value="3">Buyer</option>
                </select>
                <span id="signupTypeError" class="error"></span>
            </div>

            <div id="storeNameField" class="mb-3" style="display: none;">
                <label for="storeName" class="form-label">Store Name</label>
                <input type="text" id="storeName" name="storeName" class="form-control" placeholder="Enter your store name">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Please enter your password">
                <span id="passwordError" class="error"></span>
            </div>

            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Please confirm the password">
                <span id="cpasswordError" class="error"></span>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>

            <div class="text-center mt-3">
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
    // Function to toggle storeNameField based on signup type
    function toggleStoreNameField() {
        var role = $('#signup-type').val(); // Get the selected value from signup-type dropdown
        var storeNameField = $('#storeNameField'); // Store the storeNameField element
        
        if (role === '2') { // Check if role value is '2' (Seller)
            storeNameField.show(); // Show storeNameField
        } else {
            storeNameField.hide(); // Hide storeNameField
        }
    }

    // Call toggleStoreNameField initially to set the initial state based on signup_type
    toggleStoreNameField();

    // Handle form submission
    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this).serialize(); // Serialize form data

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
                    $('#errorList').html(errorMessage); // Set error message
                    $('#errorAlert').removeClass('d-none'); // Show the alert
                } else if (response.status === 200) {
                    $('#errorAlert').addClass('d-none'); // Hide the alert
                    window.location.href = '<?php echo BASEURL ?>AuthController/loginpage'; // Redirect to login page
                } else {
                    $('#errorAlert').addClass('d-none'); // Hide the alert

                    // Handle other error cases
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log any errors to console
            }
        });
    });

    // Bind onchange event to signup-type dropdown to toggle storeNameField
    $('#signup-type').on('change', function() {
        toggleStoreNameField(); // Call toggleStoreNameField whenever signup-type changes
    });
});
</script>

   </script>
</body>

</html>