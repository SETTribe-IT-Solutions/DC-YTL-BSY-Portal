<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>बालसंगोपन योजना पोर्टल</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* body {
            font-family: 'Arial', 'Devanagari Sangam MN', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        } */

        .header {
            background: #113e5c;
            padding: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .logo-left img, .logo-right img {
            width: 100%;
            height: 120px;
            object-fit: contain;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.1));
        }

        .title-section {
            flex: 1;
            text-align: center;
            padding: 0 30px;
        }

        .main-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 8px;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .sub-title {
            font-size: clamp(1.1rem, 2.5vw, 1.6rem);
            font-weight: 500;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            line-height: 1.3;
        }

        .decorative-line {
            width: 100px;
            height: 3px;
            background: white;
            margin: 15px auto;
            border-radius: 2px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* NAVBAR STYLES */
        .navbar {
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            padding: 12px 0;
        }

        .nav-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .nav-brand span {
            font-size: 1.2rem;
            font-weight: 600;
            color: #113e5c;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links > li > a {
            display: block;
            padding: 18px 20px;
            text-decoration: none;
            color: #113e5c;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links > li > a:hover {
            color: #f7931e;
        }

        .nav-links > li > a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: #f7931e;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-links > li > a:hover::after {
            width: 80%;
        }

        .nav-links > li > a.active {
            color: #f7931e;
            font-weight: 600;
        }

        .nav-links > li > a.active::after {
            width: 80%;
            background: #f7931e;
        }

        /* Login Dropdown Styles */
        .dropdown {
            position: relative;
        }
        
        .dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            min-width: 220px;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 100;
        }
        
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: #113e5c;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-menu a:hover {
            background: #f5f9ff;
            color: #f7931e;
        }
        
        .dropdown-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: #f7931e;
        }

        .navbar-toggler {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1001;
        }

        .toggler-icon {
            display: block;
            width: 25px;
            height: 3px;
            background: #113e5c;
            position: relative;
            transition: all 0.3s ease;
        }

        .toggler-icon::before,
        .toggler-icon::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 3px;
            background: #113e5c;
            left: 0;
            transition: all 0.3s ease;
        }

        .toggler-icon::before {
            top: -8px;
        }

        .toggler-icon::after {
            top: 8px;
        }

        .navbar-toggler.active .toggler-icon {
            background: transparent;
        }

        .navbar-toggler.active .toggler-icon::before {
            top: 0;
            transform: rotate(45deg);
            background: #fff;
        }

        .navbar-toggler.active .toggler-icon::after {
            top: 0;
            transform: rotate(-45deg);
            background: #fff;
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .header {
                padding: 15px 10px;
            }

            .header-container {
                gap: 15px;
            }

            .logo-left img, .logo-right img {
                height: 60px;
            }

            .title-section {
                padding: 0 15px;
            }

            .main-title {
                font-size: clamp(1.4rem, 5vw, 2rem);
                margin-bottom: 5px;
            }

            .sub-title {
                font-size: clamp(0.9rem, 3vw, 1.2rem);
            }

            .decorative-line {
                width: 60px;
                height: 2px;
                margin: 10px auto;
            }

            /* Navbar Mobile Styles */
            .navbar-container {
                padding: 0;
                flex-wrap: wrap;
            }
            
            .navbar-toggler {
                display: block;
            }
            
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 75%;
                height: 100vh;
                background: #113e5c;
                flex-direction: column;
                align-items: flex-start;
                padding-top: 80px;
                transition: all 0.5s ease;
                z-index: 1000;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
            }
            
            .nav-links.active {
                right: 0;
            }
            
            .nav-links li {
                width: 100%;
            }
            
            .nav-links > li > a {
                color: #fff;
                padding: 15px 30px;
                font-size: 1.2rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .nav-links > li > a:hover {
                background: rgba(255, 255, 255, 0.05);
                color: #fff;
            }
            
            .nav-links > li > a::after {
                display: none;
            }
            
            .nav-links > li > a.active {
                background: rgba(255, 255, 255, 0.1);
                color: #fff;
            }
            
            /* Mobile dropdown */
            .dropdown {
                width: 100%;
            }
            
            .dropdown-menu {
                position: static;
                background: transparent;
                box-shadow: none;
                min-width: 100%;
                padding: 0;
                opacity: 1;
                visibility: visible;
                transform: none;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            
            .dropdown.active .dropdown-menu {
                max-height: 300px;
            }
            
            .dropdown-menu a {
                color: rgba(255, 255, 255, 0.8);
                padding-left: 45px;
                font-size: 1rem;
            }
            
            .dropdown-menu a:hover {
                background: rgba(255, 255, 255, 0.05);
                color: #fff;
            }
            
            .dropdown-toggle::after {
                content: '▼';
                font-size: 0.7rem;
                transition: transform 0.3s ease;
            }
            
            .dropdown.active .dropdown-toggle::after {
                transform: rotate(180deg);
            }
        }

        @media (max-width: 480px) {
            .header {
                padding: 12px 8px;
            }

            .header-container {
                gap: 10px;
            }

            .logo-left img, .logo-right img {
                height: 50px;
            }

            .decorative-line {
                width: 50px;
            }
        }

    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo-left">
                <!-- <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='45' fill='%23fff'/><path d='M30 40h40v20H30z' fill='%23113e5c'/><circle cx='35' cy='45' r='2' fill='%23fff'/><circle cx='50' cy='45' r='2' fill='%23fff'/><circle cx='65' cy='45' r='2' fill='%23fff'/><rect x='32' y='52' width='36' height='2' fill='%23fff'/><rect x='32' y='56' width='36' height='2' fill='%23fff'/><text x='50' y='80' text-anchor='middle' fill='%23113e5c' font-size='10' font-weight='bold' font-family='Arial'>BSY</text></svg>" alt="सरकारी चिन्ह"> -->
                 <img src ="../img/BSY_logo1.png" alt="बालसंगोपन योजना">
            </div>
            
            <div class="title-section">
                <h1 class="main-title">बालसंगोपन योजना पोर्टल</h1>
                <div class="decorative-line"></div>
                <h2 class="sub-title">जिल्हाधिकारी कार्यालय, यवतमाळ</h2>
            </div>
            
            <div class="logo-right">
                <!-- <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%23fff'/><rect x='10' y='10' width='80' height='20' fill='%23ff6b35'/><rect x='10' y='40' width='80' height='20' fill='%23fff'/><rect x='10' y='70' width='80' height='20' fill='%2300a551'/><circle cx='50' cy='50' r='15' fill='%2300a551'/><path d='M50 35l3 10h10l-8 6 3 10-8-6-8 6 3-10-8-6h10z' fill='%23fff'/></svg>" alt="राष्ट्रीय चिन्ह"> -->
                 <img src ="../img/BSY_logo2.png" alt="बालसंगोपन योजना">
            </div>
        </div>
    </header>

    <!-- NAVIGATION BAR -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="nav-brand">
                <span>बालसंगोपन योजना</span>
            </div>
            
            <button class="navbar-toggler" id="navbarToggler">
                <span class="toggler-icon"></span>
            </button>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="#" class="active">होम</a></li>
                <li><a href="#">योजना बद्दल</a></li>
                <li><a href="#">अर्ज सबमिट करा</a></li>
                <!-- <li><a href="#">अर्ज तपासा</a></li> -->
                <li><a href="#">महत्वाची लिंक</a></li>
                <!-- <li><a href="#">सूचना</a></li> -->
                <li><a href="#">संपर्क</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">लॉगिन <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <a href="#"><i class="fas fa-user-shield"></i> प्रशासक लॉगिन</a>
                        <a href="#"><i class="fas fa-user-edit"></i> अर्जदार लॉगिन</a>
                        <a href="#"><i class="fas fa-user-tie"></i> कर्मचारी लॉगिन</a>
                        <a href="#"><i class="fas fa-user-check"></i> पालक लॉगिन</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    
    

    <script>
        // Mobile navbar toggle functionality
        const navbarToggler = document.getElementById('navbarToggler');
        const navLinks = document.getElementById('navLinks');
        
        navbarToggler.addEventListener('click', () => {
            navbarToggler.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
        
        // Close navbar when clicking on a link
        document.querySelectorAll('.nav-links > li > a').forEach(link => {
            link.addEventListener('click', (e) => {
                // Handle dropdown toggle on mobile
                if (window.innerWidth <= 992 && link.parentElement.classList.contains('dropdown')) {
                    e.preventDefault();
                    link.parentElement.classList.toggle('active');
                } else {
                    navLinks.classList.remove('active');
                    navbarToggler.classList.remove('active');
                }
            });
        });
        
        // Close navbar when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !navbarToggler.contains(e.target)) {
                navLinks.classList.remove('active');
                navbarToggler.classList.remove('active');
            }
        });
    </script>

</body>
</html>