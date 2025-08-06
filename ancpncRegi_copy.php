<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANC/PNC Register - Modern UI</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --primary-gradient: linear-gradient(135deg, #1b68ff 0%, #1b68ff 100%);
            --secondary-color: #f093fb;
            --accent-color: #4facfe;
            --success-color: #00d4aa;
            --warning-color: #ffc107;
            --danger-color: #ff6b6b;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 15px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1b68ff 0%, #1b68ff 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 0;
            max-width: 1200px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .form-header {
            background: var(--primary-gradient);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .form-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .form-header .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .form-body {
            padding: 40px;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--secondary-color);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .required {
            color: var(--danger-color);
            font-weight: 700;
        }

        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            z-index: 3;
        }

        .input-group .form-control {
            padding-left: 45px;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #1b68ff 0%, #1b68ff 100%);
            color: white;
            border: none;
            padding: 15px 20px;
            font-weight: 600;
        }

        .progress-bar {
            background: var(--primary-gradient);
            height: 6px;
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .floating-label {
            position: relative;
        }

        .floating-label .form-control::placeholder {
            color: transparent;
        }

        .floating-label .form-control:focus::placeholder {
            color: #999;
        }

        .floating-label label {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            background: white;
            padding: 0 8px;
            color: #666;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 2;
        }

        .floating-label .form-control:focus + label,
        .floating-label .form-control:not(:placeholder-shown) + label {
            top: 0;
            font-size: 0.8rem;
            color: var(--primary-color);
            font-weight: 500;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .form-header h1 {
                font-size: 2rem;
            }
            
            .form-body {
                padding: 20px;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
        }

        .animate-in {
            opacity: 0;
            transform: translateY(30px);
            animation: slideIn 0.6s ease forwards;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-row .col-md-6:nth-child(odd) {
            animation-delay: 0.1s;
        }

        .form-row .col-md-6:nth-child(even) {
            animation-delay: 0.2s;
        }

        .form-row .col-md-3:nth-child(1) { animation-delay: 0.1s; }
        .form-row .col-md-3:nth-child(2) { animation-delay: 0.2s; }
        .form-row .col-md-3:nth-child(3) { animation-delay: 0.3s; }
        .form-row .col-md-3:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <div class="form-header">
                <h1><i class="fas fa-user-nurse"></i> ANC/PNC Register</h1>
                <p class="subtitle">Antenatal and Postnatal Care Registration System</p>
            </div>

            <div class="form-body">
                <form class="needs-validation" novalidate>
                    <!-- Location Information -->
                    <div class="card animate-in">
                        <div class="card-header">
                            <i class="fas fa-map-marker-alt"></i> Location Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Taluka <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-building input-icon"></i>
                                            <input type="text" class="form-control" value="Sample Taluka" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Village <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-home input-icon"></i>
                                            <input type="text" class="form-control" value="Sample Village" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Information -->
                    <div class="card animate-in">
                        <div class="card-header">
                            <i class="fas fa-user"></i> Patient Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name of Mother <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-user input-icon"></i>
                                            <input type="text" class="form-control" placeholder="Enter mother's name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Mother Contact No <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-phone input-icon"></i>
                                            <input type="tel" class="form-control" placeholder="Enter contact number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name of Husband <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-user input-icon"></i>
                                            <input type="text" class="form-control" placeholder="Enter husband's name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Husband Contact No <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-phone input-icon"></i>
                                            <input type="tel" class="form-control" placeholder="Enter contact number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name of ASHA <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-user-nurse input-icon"></i>
                                            <input type="text" class="form-control" placeholder="Enter ASHA name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ASHA Contact No <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-phone input-icon"></i>
                                            <input type="tel" class="form-control" placeholder="Enter contact number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Information -->
                    <div class="card animate-in">
                        <div class="card-header">
                            <i class="fas fa-stethoscope"></i> Medical Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Patient Category <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select Patient Category</option>
                                            <option value="ANC">ANC</option>
                                            <option value="PNC">PNC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Height <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-ruler-vertical input-icon"></i>
                                            <input type="text" class="form-control" placeholder="cm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Weight <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-weight input-icon"></i>
                                            <input type="text" class="form-control" placeholder="kg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">UPT <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-vial input-icon"></i>
                                            <input type="text" class="form-control" placeholder="UPT result" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">LMP <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-calendar input-icon"></i>
                                            <input type="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">EDD <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-calendar-check input-icon"></i>
                                            <input type="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">HB <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-tint input-icon"></i>
                                            <input type="text" class="form-control" placeholder="g/dL" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clinical Tests -->
                    <div class="card animate-in">
                        <div class="card-header">
                            <i class="fas fa-flask"></i> Clinical Tests & Vitals
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">BP <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-heartbeat input-icon"></i>
                                            <input type="text" class="form-control" placeholder="mmHg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">CBC <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-microscope input-icon"></i>
                                            <input type="text" class="form-control" placeholder="CBC result" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Viral Marker <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select Viral Marker</option>
                                            <option value="HIV">HIV</option>
                                            <option value="HbsAg">HbsAg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Blood Group <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Blood Sugar <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-cube input-icon"></i>
                                            <input type="text" class="form-control" placeholder="mg/dL" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Urine for Albumin <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="Positive">Positive</option>
                                            <option value="Negative">Negative</option>
                                            <option value="Not done">Not done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Sonography Status <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="Done">Done</option>
                                            <option value="Not done">Not done</option>
                                            <option value="Scheduled">Scheduled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">High Risk Mother <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Treatment & Care -->
                    <div class="card animate-in">
                        <div class="card-header">
                            <i class="fas fa-pills"></i> Treatment & Care
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">TT Dose <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-syringe input-icon"></i>
                                            <input type="text" class="form-control" placeholder="TT dose" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">TT Booster <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-syringe input-icon"></i>
                                            <input type="text" class="form-control" placeholder="TT booster" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Iron/Calcium Dose <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-pills input-icon"></i>
                                            <input type="text" class="form-control" placeholder="Iron/Calcium dose" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Referral <span class="required">*</span></label>
                                        <div class="input-group">
                                            <i class="fas fa-hospital input-icon"></i>
                                            <input type="text" class="form-control" placeholder="Referral details" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">PM Surkshit Matriyan Abhiyan <span class="required">*</span></label>
                                        <select class="form-select" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Remarks <span class="required">*</span></label>
                                        <textarea class="form-control" rows="3" placeholder="Enter remarks here..." required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center animate-in">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Submit Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });

        // Add some interactive effects
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>