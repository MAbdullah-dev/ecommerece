<?php
class AuthController extends framwork {
    public $AuthModel;
    public function __construct() {
        $this->helper('link');
        $this->AuthModel = $this->model('AuthModel'); // Include AuthModel
    }
    public function signuppage()
    {
        $this->view('auth/signup');
    }

    public function register() {
        $name = $this->input('name');
        $email = $this->input('email');
        $signup_type = $this->input('signup_type');
        $password = $this->input('password');
        $cpassword = $this->input('cpassword');

        // Validation code...
        $errors = array();

        if (empty($name)) {
            $errors[] = 'Please enter your name.';
        }

        if (empty($email)) {
            $errors[] = 'Please enter your email address.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        } else {
            // Check if email already exists
            $existingUser = $this->AuthModel->findUserByEmail($email);
            if ($existingUser) {
                $errors[] = 'Email already exists.';
            }
        }

        if (empty($signup_type)) {
            $errors[] = 'Please select a signup type.';
        }

        if (empty($password)) {
            $errors[] = 'Please enter a password.';
        }

        if (empty($cpassword)) {
            $errors[] = 'Please confirm your password.';
        } elseif ($password != $cpassword) {
            $errors[] = 'Passwords do not match.';
        }

        // If there are validation errors, return them
        if (!empty($errors)) {
            echo json_encode(['status' => 400, 'errors' => $errors]);
            exit;
        }

        // Validation succeeded, proceed with registration
        // Call register method of AuthModel to insert data
        $inserted = $this->AuthModel->register([
            'signup_type' => $signup_type,
            'email' => $email,
            'password' => $password,
            'name' => $name
        ]);

        // Check if data was inserted successfully
        if ($inserted) {
            // Return success response
            echo json_encode(['status' => 200, 'message' => 'User registered successfully']);
        } else {
            // Return error response
            echo json_encode(['status' => 500, 'message' => 'Failed to register user']);
        }
    }
    public function loginpage()
    {
        $this->view('auth/login');
    }
    public function login() 
    {
        // header('Content-Type: application/json'); // Ensure JSON response

        $email = $this->input('email');
        $password = $this->input('password');

        // Validation code...
        $errors = array();

        if (empty($email)) {
            $errors['email'] = 'Please enter your email address.';
        }

        if (empty($password)) {
            $errors['password'] = 'Please enter your password.';
        }

        // If there are validation errors, return them
        if (!empty($errors)) {
            echo json_encode(['status' => 400, 'errors' => $errors]);
            exit;
        }

        // Check if the user exists and the password matches
        $user = $this->AuthModel->findUserByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            // Set session variables or any other login logic here
            $this->setSession('usgit initer_id', $user->id);
            $this->setSession('user_name', $user->name);
            $this->setSession('user_role', $user->role_id);

            // Return success response
            echo json_encode(['status' => 200, 'message' => 'Login successful']);
        } else {
            // Return error response
            echo json_encode(['status' => 401, 'message' => 'Invalid email or password']);

            $errors['login'] = 'Invalid email or password';
        }
    }
}
?>
