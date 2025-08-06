
<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>लॉगिन | जिल्हा परिषद, ठाणे</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #f1f3f5);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    .header {
      background: #ffffff;
      padding: 1.3rem;
      border-bottom: 3px solid #0d6efd;
      position: relative;
    }

    .header h4,
    .header h6 {
      margin: 0;
      font-weight: 600;
    }

    .header h4 {
      color: #0d47a1;
      font-size: 2rem;
    }

    .header h6 {
      color: #333;
      font-size: 0.95rem;
            margin-bottom: 0.5rem;

    }

    .header img {
      height: 70px;
    }

    .float-start,
    .float-end {
      position: absolute;
      top: 10px;
    }

    .float-start {
      left: 15px;
    }

    .float-end {
      right: 15px;
    }

    .mobile-header {
      display: none;
    }

    .mobile-logo {
      height: 60px;
    }

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
      background: url('img/login.jpg') no-repeat center center;
      background-size: cover;
    }

    .login-form {
      padding: 3rem 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #ffffff;
    }

    .login-form h5 {
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

    .footer {
      text-align: center;
      font-size: 14px;
      color: #666;
      margin-top: 2rem;
      padding: 1rem 0;
    }

    .footer a {
      color: #0d6efd;
      font-weight: 500;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 767px) {
      .float-start,
      .float-end {
        display: none !important;
      }

      .desktop-header {
        display: none;
      }

      .mobile-header {
        display: flex !important;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
      }

      .header {
        text-align: center;
      }

      .header h4 {
        font-size: 1.2rem;
      }

      .header h6 {
        font-size: 0.85rem;
      }

      .login-container {
        flex-direction: column;
        margin: 1.5rem;
      }

      .login-image {
        display: none;
      }

      .login-form {
        padding: 2rem 1.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <!-- Mobile View Header -->
    <div class="mobile-header d-md-none d-flex">
      <img src="img/Emblem.png" alt="Logo Left" class="mobile-logo" />
      <div class="text-center flex-grow-1">
                <h6>महाराष्ट्र शासन</h6>

        <h4>जिल्हा परिषद, ठाणे</h4>
      </div>
      <img src="img/thane.png" alt="Logo Right" class="mobile-logo" style="height: 90px"/>
    </div>

    <!-- Desktop View -->
    <img src="img/Emblem.png" alt="Logo Left" class="float-start d-none d-md-block">
    <img src="img/thane.png" alt="Logo Right" class="float-end d-none d-md-block" style="height: 90px">
    <div class="desktop-header d-none d-md-block text-center">
            <h6>महाराष्ट्र शासन</h6>

      <h4>जिल्हा परिषद, ठाणे</h4>
    </div>
  </div>

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

  <!-- Footer -->
  <!-- <div class="footer">
    Copyright © जिल्हाधिकारी कार्यालय ठाणे<br>
    Developed & Maintained by <a href="https://www.settribeitsolutions.com/" target="_blank">SETTribe</a>
  </div> -->
  <?php include('include/footer.php')?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      const icon = document.getElementById("toggleIcon");
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
