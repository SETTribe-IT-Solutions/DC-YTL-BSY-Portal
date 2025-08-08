
<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>लॉगिन | जिल्हा परिषद, ठाणे</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
.login-container {
      max-width: 960px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      margin: 3rem auto;
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
    }

    .login-image,
    .login-form {
      flex: 1 1 50%;
      min-height: 450px;
    }

    .login-image {
      background: url('img/logo-ngo.png') no-repeat center center;
      background-size:contain;
    }

    .login-form {
      padding: 3rem 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #ffffff;
    }

    .login-form h4{
      text-align: center;
      font-weight: 700;
      color: #0d47a1;
      margin-bottom: 2rem;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #0d6efd;
    }

    .input-group-text {
      background: #fff;
      border-left: 0;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
    }

    .btn-primary:hover {
      background-color: #084298;
    }

    

    @media (max-width: 767px) {
      
      .login-container {
        flex-direction: column;
        margin: 1.5rem;
      }

      .login-image {
        display: none;
      }

      .login-form {
        padding: 2rem 1.2rem;
        margin-bottom: -41%;
      }
      .h5, h5 {
    font-size: 1.25rem;
    margin-top: -55%;
}
    }
  </style>
</head>
<body>

  <?php include('include/header_1.php'); ?>

<!-- Login Section -->
<div class="login-container">
  <!-- Left Side Image (hidden on mobile) -->
  <div class="login-image d-none d-md-block"></div>

  <!-- Right Side Form -->
  <div class="login-form">
    <h5>लॉग इन</h5>
    <form method="POST" action="login_db.php">
      <div class="mb-3">
        <label for="username" class="form-label">यूजरनेम / मोबाईल नंबर</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">पासवर्ड</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" required>
          <span class="input-group-text" onclick="togglePassword()">
            <i class="fa fa-eye" id="toggleIcon"></i>
          </span>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary" name="submit">लॉग इन</button>
      </div>
    </form>
  </div>
</div>

<?php include('include/footer_1.php'); ?>

<script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const icon = document.getElementById("toggleIcon");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>

</body>
</html>
