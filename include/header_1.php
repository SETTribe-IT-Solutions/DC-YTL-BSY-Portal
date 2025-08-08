<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>बालसंगोपन योजना पोर्टल</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body{
            margin: 0;
        }
        /* Component-specific styles */
        .bsy-component {
            --primary-color: #113e5c;
            --accent-color: #f7931e;
            --light-color: #ffffff;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', 'Devanagari Sangam MN', sans-serif;
        }
        
        .bsy-component * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Header styles */
        .bsy-header {
            background: var(--primary-color);
            padding: 10px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .bsy-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .bsy-header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .bsy-logo img {
            /* height: 120px; */
            height: 80px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.1));
        }

        .bsy-title-section {
            flex: 1;
            text-align: center;
            /* padding: 0 30px; */
            padding: 0 20px;
        }

        .bsy-main-title {
            /* font-size: clamp(1.8rem, 4vw, 2.8rem); */
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 700;
            color: var(--light-color);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 8px;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .bsy-sub-title {
            /* font-size: clamp(1.1rem, 2.5vw, 1.6rem); */
            font-size: clamp(1rem, 2.5vw, 1.4rem); 
            font-weight: 500;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            line-height: 1.3;
        }

        .bsy-decorative-line {
            width: 100px;
            height: 3px;
            background: var(--light-color);
            /* margin: 15px auto; */
            margin: 10px auto;
            border-radius: 2px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Navbar styles */
        .bsy-navbar {
            background-color: var(--light-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .bsy-navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .bsy-nav-brand {
            display: flex;
            align-items: center;
            padding: 12px 0;
        }

        .bsy-nav-brand span {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .bsy-nav-links {
            display: flex;
            list-style: none;
        }

        .bsy-nav-links > li {
            position: relative;
        }

        .bsy-nav-links > li > a {
            display: flex;
            align-items: center;
            padding: 18px 20px;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            gap: 8px;
        }

        .bsy-nav-links > li > a:hover {
            color: var(--accent-color);
        }

        .bsy-nav-links > li > a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .bsy-nav-links > li > a:hover::after {
            width: 80%;
        }

        .bsy-nav-links > li > a.active {
            color: var(--accent-color);
            font-weight: 600;
        }

        .bsy-nav-links > li > a.active::after {
            width: 80%;
            background: var(--accent-color);
        }

        /* Login Dropdown Styles */
        .bsy-dropdown {
            position: relative;
        }
        
        .bsy-dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .bsy-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--light-color);
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
        
        .bsy-dropdown:hover .bsy-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .bsy-dropdown-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.2s ease;
            gap: 10px;
        }
        
        .bsy-dropdown-menu a:hover {
            background: #f5f9ff;
            color: var(--accent-color);
        }
        
        .bsy-dropdown-menu a i {
            width: 20px;
            text-align: center;
            color: var(--accent-color);
        }

        .bsy-navbar-toggler {
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
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .bsy-header {
                padding: 15px 10px;
            }

            .bsy-header-container {
                gap: 15px;
            }

            .bsy-logo img {
                height: 60px;
            }

            .bsy-title-section {
                padding: 0 15px;
            }

            .bsy-main-title {
                font-size: clamp(1.4rem, 5vw, 2rem);
                margin-bottom: 5px;
            }

            .bsy-sub-title {
                font-size: clamp(0.9rem, 3vw, 1.2rem);
            }

            .bsy-decorative-line {
                width: 60px;
                height: 2px;
                margin: 10px auto;
            }

            /* Navbar Mobile Styles */
            .bsy-navbar-container {
                padding: 0;
                flex-wrap: wrap;
            }
            
            .bsy-navbar-toggler {
                display: block;
            }
            
            .bsy-nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 75%;
                height: 100vh;
                background: var(--primary-color);
                flex-direction: column;
                align-items: flex-start;
                padding-top: 80px;
                transition: all 0.5s ease;
                z-index: 1000;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
            }
            
            .bsy-nav-links.active {
                right: 0;
            }
            
            .bsy-nav-links li {
                width: 100%;
            }
            
            .bsy-nav-links > li > a {
                color: var(--light-color);
                padding: 15px 30px;
                font-size: 1.2rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .bsy-nav-links > li > a:hover {
                background: rgba(255, 255, 255, 0.05);
                color: var(--light-color);
            }
            
            .bsy-nav-links > li > a::after {
                display: none;
            }
            
            .bsy-nav-links > li > a.active {
                background: rgba(255, 255, 255, 0.1);
                color: var(--light-color);
            }
            
            /* Mobile dropdown */
            .bsy-dropdown {
                width: 100%;
            }
            
            .bsy-dropdown-menu {
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
            
            .bsy-dropdown.active .bsy-dropdown-menu {
                max-height: 300px;
            }
            
            .bsy-dropdown-menu a {
                color: rgba(255, 255, 255, 0.8);
                padding-left: 45px;
                font-size: 1rem;
            }
            
            .bsy-dropdown-menu a:hover {
                background: rgba(255, 255, 255, 0.05);
                color: var(--light-color);
            }
            
            .bsy-dropdown-toggle::after {
                content: '▼';
                font-size: 0.7rem;
                transition: transform 0.3s ease;
                margin-left: 5px;
            }
            
            .bsy-dropdown.active .bsy-dropdown-toggle::after {
                transform: rotate(180deg);
            }
        }

        @media (max-width: 480px) {
            .bsy-header {
                padding: 12px 8px;
            }

            .bsy-header-container {
                gap: 10px;
            }

            .bsy-logo img {
                /* height: 50px; */
                height: 63px;
            }

            .bsy-decorative-line {
                width: 50px;
            }
        }
        .fa-close:before, .fa-multiply:before, .fa-remove:before, .fa-times:before, .fa-xmark:before {
    content: "\f00d";
    color: white;
}

    @keyframes slideLeft {
  from {
    transform: translateX(-50px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideRight {
  from {
    transform: translateX(50px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    transform: translateY(50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

/* Animation utility classes */
.animate-slide-left {
  animation: slideLeft 1s ease-out forwards;
}

.animate-slide-right {
  animation: slideRight 1s ease-out forwards;
}

.animate-slide-up {
  animation: slideUp 1s ease-out forwards;
}

    </style>
</head>
<body>
    <!-- Component container with unique class prefix -->
    <div class="bsy-component">
        <!-- Header -->
        <header class="bsy-header">
            <div class="bsy-header-container">
                <div class="bsy-logo">
                    <img src="img/BSY_logo1.png" alt="बालसंगोपन योजना"  class="animate-slide-up">
                </div>
                
                <div class="bsy-title-section">
                    <h1 class="bsy-main-title animate-slide-left">बालसंगोपन योजना पोर्टल</h1>
                    <div class="bsy-decorative-line"></div>
                    <h2 class="bsy-sub-title animate-slide-right">जिल्हाधिकारी कार्यालय, यवतमाळ</h2>
                </div>
                
                <div class="bsy-logo">
                    <img src="img/yojana_img.png" alt="बालसंगोपन योजना" class="animate-slide-up">
                </div>
            </div>
        </header>

        <!-- Navigation Bar -->
        <nav class="bsy-navbar">
            <div class="bsy-navbar-container">
                <div class="bsy-nav-brand">
                    <span>बालसंगोपन योजना</span>
                </div>
                
                <button class="bsy-navbar-toggler" id="bsy-navbarToggler">
                    <i class="fas fa-bars"></i>
                </button>
                
                <ul class="bsy-nav-links" id="bsy-navLinks">
                    <li><a href="#" class="active"><i class="fas fa-home"></i> होम</a></li>
                    <li><a href="#"><i class="fas fa-info-circle"></i> योजना बद्दल</a></li>
                    <li><a href="#"><i class="fas fa-file-export"></i> अर्ज सबमिट करा</a></li>
                    <li><a href="#"><i class="fas fa-link"></i> महत्वाची लिंक</a></li>
                    <li><a href="#"><i class="fas fa-phone-alt"></i> संपर्क</a></li>
                    <li class="bsy-dropdown">
                        <a href="#" class="bsy-dropdown-toggle"><i class="fas fa-user"></i> लॉगिन <i class="fas fa-chevron-down"></i></a>
                        <ul class="bsy-dropdown-menu">
                        <a href="#"><i class="fas fa-user-shield"></i> प्रशासक लॉगिन</a>
                        <a href="#"><i class="fas fa-user-edit"></i> अर्जदार लॉगिन</a>
                        <a href="#"><i class="fas fa-user-tie"></i> कर्मचारी लॉगिन</a>
                        <a href="#"><i class="fas fa-user-check"></i> पालक लॉगिन</a>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    <script>
        // Scoped JavaScript for the component
        (function() {
            // Mobile navbar toggle functionality
            const navbarToggler = document.getElementById('bsy-navbarToggler');
            const navLinks = document.getElementById('bsy-navLinks');
            
            if (navbarToggler) {
                navbarToggler.addEventListener('click', () => {
                    navbarToggler.classList.toggle('active');
                    navLinks.classList.toggle('active');
                    
                    // Toggle icon
                    const icon = navbarToggler.querySelector('i');
                    if (navLinks.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                        document.body.style.overflow = 'hidden';
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                        document.body.style.overflow = '';
                    }
                });
            }
            
            // Close navbar when clicking on a link
            if (navLinks) {
                document.querySelectorAll('.bsy-nav-links > li > a').forEach(link => {
                    link.addEventListener('click', (e) => {
                        // Handle dropdown toggle on mobile
                        if (window.innerWidth <= 992 && link.parentElement.classList.contains('bsy-dropdown')) {
                            e.preventDefault();
                            link.parentElement.classList.toggle('active');
                        } else {
                            if (navLinks.classList.contains('active')) {
                                navLinks.classList.remove('active');
                                navbarToggler.classList.remove('active');
                                const icon = navbarToggler.querySelector('i');
                                icon.classList.remove('fa-times');
                                icon.classList.add('fa-bars');
                                document.body.style.overflow = '';
                            }
                        }
                    });
                });
            }
            
            // Close navbar when clicking outside
            document.addEventListener('click', (e) => {
                const isNavLink = e.target.closest('.bsy-nav-links');
                const isToggler = e.target.closest('#bsy-navbarToggler');
                
                if (!isNavLink && !isToggler && navLinks && navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                    if (navbarToggler) {
                        navbarToggler.classList.remove('active');
                        const icon = navbarToggler.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                    }
                    document.body.style.overflow = '';
                }
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                const dropdowns = document.querySelectorAll('.bsy-dropdown');
                dropdowns.forEach(dropdown => {
                    if (!dropdown.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            });
            
            // Close menu when window is resized above 992px
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    if (navLinks && navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                    }
                    if (navbarToggler && navbarToggler.classList.contains('active')) {
                        navbarToggler.classList.remove('active');
                        const icon = navbarToggler.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                    }
                    document.body.style.overflow = '';
                    
                    // Close all dropdowns
                    document.querySelectorAll('.bsy-dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });
        })();
    </script>
</body>
</html>