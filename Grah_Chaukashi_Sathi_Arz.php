<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>गृह चौकशी फॉर्म</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */
        :root {
            --primary: #1a73e8;
            --secondary: #4285f4;
            --success: #34a853;
            --warning: #fbbc05;
            --danger: #ea4335;
            --info: #17a2b8;
            --light: #f8f9fa;
            --dark: #202124;
            --teal: #138496;
            --gold: #b8860b;
        }
        
        .form-container {
            /* max-width: 1000px; */
            margin: 30px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        
        .form-header {
            padding: 25px 30px;
            text-align: center;
            position: relative;
        }
        
        .form-header h3 {
            color: #1a73e8;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            letter-spacing: 0.5px;
        }
        
        .form-header::after {
            content: "";
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 6px;
            background: linear-gradient(90deg, var(--warning), var(--danger));
            border-radius: 3px;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-group-row {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            font-size: 1.05rem;
        }
        
        .required::after {
            content: " *";
            color: #e53935;
        }
        
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            outline: none;
        }
        
        .validation-error {
            color: #e53935;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
            font-weight: 500;
        }
        
        .question-block {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .question-block p {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        .radio-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .radio-option input[type="radio"] {
            width: 18px;
            height: 18px;
            accent-color: #3949ab;
        }
        
        .radio-option label {
            font-weight: 500;
            margin-bottom: 0;
        }
        
        .button-group {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 30px;
        }
        
        .btn {
            border-radius: 50px;
            padding: 12px 35px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 250px;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #43a047, #2e7d32);
            border: none;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #e53935, #b71c1c);
            border: none;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .form-footer {
            text-align: center;
            padding: 20px;
            background: #f5f5f5;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 0.95rem;
        }
        
        .table td, .table th { 
            vertical-align: middle; 
            text-align: center; 
        }
        
        .btn-sm { 
            padding: 2px 8px; 
        }

        #familyContainer {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        #crimeDetailsContainer {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        /* Wizard Styles */
        .wizard-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .wizard-progress::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background: #e9ecef;
            transform: translateY(-50%);
            z-index: 1;
        }
        
        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 4px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #6c757d;
            position: relative;
            z-index: 2;
        }
        
        .progress-step.active {
            border-color: var(--primary);
            color: var(--primary);
            background: white;
        }
        
        .progress-step.completed {
            border-color: var(--success);
            background: var(--success);
            color: white;
        }
        
        .step-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .wizard-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .wizard-step {
            display: none;
        }
        
        .wizard-step.active {
            display: block;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 900px) {
            .button-group {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .wizard-progress {
                overflow-x: auto;
                padding-bottom: 10px;
            }
            
            .progress-step {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
                flex-shrink: 0;
                margin: 0 5px;
            }
            
            .form-body {
                padding: 20px;
            }
            
            .question-block {
                padding: 15px;
            }
            
            .radio-options {
                flex-direction: column;
                gap: 10px;
            }

            .wizard-navigation {
                flex-direction: column;
                gap: 10px;
                margin-left: 30px;
            }
            
            .wizard-navigation .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include('include/header_1.php'); ?>
    <div class="form-container">
        <div class="form-header">
            <h3>गृह चौकशी फॉर्म</h3>
        </div>
        
        <div class="form-body">
            <!-- Wizard Progress -->
            <div class="wizard-progress">
                <div class="progress-step completed" data-step="1">1</div>
                <div class="progress-step" data-step="2">2</div>
                <div class="progress-step" data-step="3">3</div>
                <div class="progress-step" data-step="4">4</div>
                <div class="progress-step" data-step="5">5</div>
                <div class="progress-step" data-step="6">6</div>
                <div class="progress-step" data-step="7">7</div>
                <div class="progress-step" data-step="8">8</div>
                <div class="progress-step" data-step="9">9</div>
                <div class="progress-step" data-step="10">10</div>
                <div class="progress-step" data-step="11">11</div>
                <div class="progress-step" data-step="12">12</div>
                <div class="progress-step" data-step="13">13</div>
                <!-- <div class="progress-step" data-step="14">14</div> -->
            </div>
            
            <form id="homeForm" onsubmit="return validateForm()">
                <!-- Step 1: Personal Information -->
                <div class="wizard-step active" data-step="1">
                    <h4 class="step-title">वैयक्तिक माहिती</h4>
                    
                    <div class="row form-group-row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="nav">नाव</label>
                            <input type="text" class="form-control" name="nav" id="nav" placeholder="तुमचे पूर्ण नाव">
                            <div class="validation-error" id="navError"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="dob">जन्म तारीख व वर्ष</label>
                            <input type="date" class="form-control" name="dob" id="dob">
                            <div class="validation-error" id="dobError"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="jat">जात</label>
                            <select class="form-select" name="jat" id="jat">
                                <option value="">-- जात निवडा --</option>
                                <option>मराठा</option>
                                <option>माळी</option>
                                <option>धनगर</option>
                                <option>मुस्लिम</option>
                                <option>ब्राह्मण</option>
                                <option>इतर</option>
                            </select>
                            <div class="validation-error" id="jatError"></div>
                        </div>
                    </div>

                    <div class="row form-group-row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="ling">लिंग</label>
                            <select class="form-select" name="ling" id="ling">
                                <option value="">-- लिंग निवडा --</option>
                                <option>पुरुष</option>
                                <option>स्त्री</option>
                                <option>इतर</option>
                            </select>
                            <div class="validation-error" id="lingError"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="dharm">धर्म</label>
                            <select class="form-select" name="dharm" id="dharm">
                                <option value="">-- धर्म निवडा --</option>
                                <option>हिंदू</option>
                                <option>मुस्लिम</option>
                                <option>ख्रिश्चन</option>
                                <option>बौद्ध</option>
                                <option>जैन</option>
                                <option>इतर</option>
                            </select>
                            <div class="validation-error" id="dharmError"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="palaknav">पालकाचे नाव</label>
                            <input type="text" class="form-control" name="palaknav" id="palaknav" placeholder="पालकाचे पूर्ण नाव">
                            <div class="validation-error" id="palaknavError"></div>
                        </div>
                    </div>

                    <div class="row form-group-row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="aainav">आईचे नाव</label>
                            <input type="text" class="form-control" name="aainav" id="aainav" placeholder="आईचे पूर्ण नाव">
                            <div class="validation-error" id="aainav"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="palankarta">सध्याचे पालनकर्ता</label>
                            <input type="text" class="form-control" name="palankarta" id="aainav" placeholder="सध्याचे पालनकर्ता नाव">
                            <div class="validation-error" id="palankarta"></div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label required" for="palankarta">वडील / आई / परिवारातील सदस्याचे संपर्क क्र.</label>
                            <input type="text" class="form-control" name="palankarta" id="palankarta" placeholder="10 अंकी मोबाइल नंबर">
                            <div class="validation-error" id="palankarta"></div>
                        </div>
                    </div>
                    
                    <div class="row form-group-row">
                        <div class="mb-4">
                            <label class="form-label required" for="Sthayi_patta">स्थायी पत्ता</label>
                            <input type="textarea" class="form-control" name="Sthayi_patta" id="Sthayi_patta" placeholder="स्थायी पत्ता">
                            <div class="validation-error" id="Sthayi_patta"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="patta">संपूर्ण पत्ता</label>
                            <input type="textarea" class="form-control" name="patta" id="patta" placeholder="पूर्ण पत्ता">
                            <div class="validation-error" id="pattaError"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="purviPatta">पूर्वीचा निवास पत्ता</label>
                            <input type="text" class="form-control" name="purviPatta" id="purviPatta" placeholder="जर लागू असेल">
                            <div class="validation-error" id="purviPattaError"></div>
                        </div>  
                    

                    <div class="question-block">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <p class="mb-0">बालक अपंग आहे काय ?</p>
                            </div>

                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="apanga" id="apanga_ho" value="होय" class="form-check-input" onclick="toggleApangaOptions(true)">
                                    <label for="apanga_ho" class="form-check-label">होय</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="apanga" id="apanga_na" value="नाही" class="form-check-input" onclick="toggleApangaOptions(false)">
                                    <label for="apanga_na" class="form-check-label">नाही</label>
                                </div>
                            </div>

                            <!-- अपंगत्व निवड -->
                            <div class="col-md-4 mt-3" id="apangaOptions" style="display:none;">
                                <select class="form-control" name="apanga_type" id="apanga_type" onchange="toggleOtherInput(this.value)">
                                    <option value="" disabled selected>अपंगत्व निवडा</option>
                                    <option value="बहिरेपणा">अ. बहिरेपणा</option>
                                    <option value="मुख बधीरपणा">आ. मुख बधीरपणा</option>
                                    <option value="शारीरिक अपंगत्व">इ. शारीरिक अपंगत्व</option>
                                    <option value="मानसिक रुग्ण">ई. मानसिक रुग्ण</option>
                                    <option value="इतर">उ. इतर (असल्यास नमूद करा)</option>
                                </select>
                            </div>

                            <!-- इतर तपशील -->
                            <div class="col-md-4 mt-3" id="otherInput" style="display:none;">
                                <input type="text" class="form-control" name="apanga_other" placeholder="इतर तपशील लिहा">
                            </div>
                        </div>

                        <div class="validation-error" id="apangaError"></div>
                    </div>
                </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" disabled>मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(1)">पुढे</button>
                    </div>
                </div>
                
                
                <!-- Step 2: Family Information -->
                <div class="wizard-step" data-step="2">
                    <h4 class="step-title">कुटुंब माहिती</h4>
                    
                    <label class="form-label">कुटुंबाची माहिती</label>
                    <div id="familyContainer">
                        <!-- First Member -->
                        <div class="family-member rounded p-3 mb-3 position-relative"> 
                            <!-- ❌ Remove icon -->
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="removeMember(this)"></button>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">नाव</label>
                                    <input type="text" class="form-control" name="name[]" placeholder="तुमचे नाव">
                                    <div class="validation-error"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">लिंग</label>
                                    <select class="form-select" name="ling[]">
                                        <option value="" selected disabled>-- लिंग निवडा --</option>
                                        <option>पुरुष</option>
                                        <option>स्त्री</option>
                                        <option>इतर</option>
                                    </select>
                                    <div class="validation-error"></div>
                                </div>

                                <!-- शिक्षण -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">शिक्षण</label>
                                    <select class="form-select" name="shikshan">
                                        <option value="" selected disabled>-- निवडा --</option>
                                        <option>निरक्षर</option>
                                        <option>प्राथमिक</option>
                                        <option>माध्यमिक</option>
                                        <option>उच्च माध्यमिक</option>
                                        <option>पदवीधर</option>
                                        <option>पदव्युत्तर</option>
                                        <option>व्यावसायिक शिक्षण</option>
                                    </select>
                                </div>

                                 <!-- व्यवसाय -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">व्यवसाय</label>
                                    <select class="form-select" name="vyavasay">
                                        <option value="" selected disabled>-- निवडा --</option>
                                        <option>शेतकरी</option>
                                        <option>मजूर</option>
                                        <option>सरकारी नोकरी</option>
                                        <option>खाजगी नोकरी</option>
                                        <option>व्यवसायिक</option>
                                        <option>गृहिणी</option>
                                        <option>विद्यार्थी</option>
                                        <option>इतर</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">वय</label>
                                    <input type="number" class="form-control" name="age[]" placeholder="वय">
                                    <div class="validation-error"></div>
                                </div>

                                 <!-- आरोग्य -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">आरोग्य</label>
                                    <select class="form-select" name="arogya">
                                        <option value="" selected disabled>-- निवडा --</option>
                                        <option>सामान्य</option>
                                        <option>अपंग</option>
                                        <option>दीर्घकालीन आजार</option>
                                        <option>गंभीर आजार</option>
                                    </select>
                                </div>

                                <!-- मानसिक स्थिती -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">मानसिक स्थिती</label>
                                    <select class="form-select" name="mansik_sthiti">
                                        <option value="" selected disabled>-- निवडा --</option>
                                        <option>सामान्य</option>
                                        <option>तणावग्रस्त</option>
                                        <option>उदासीन</option>
                                        <option>मानसिक आजार</option>
                                        <option>माहित नाही</option>
                                    </select>
                                </div>

                                <!-- व्यसन -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">व्यसन</label>
                                    <select class="form-select" name="vyasan">
                                        <option value="" selected disabled>-- निवडा --</option>
                                        <option>नाही</option>
                                        <option>दारू</option>
                                        <option>तंबाखू</option>
                                        <option>गुटखा</option>
                                        <option>सिगारेट</option>
                                        <option>इतर</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">पीडित बालकासी नाते</label>
                                    <select class="form-select" name="relation[]">
                                        <option value="" selected disabled>-- नाते निवडा --</option>
                                        <option>आई</option>
                                        <option>वडील</option>
                                        <option>भाऊ</option>
                                        <option>बहीण</option>
                                        <option>आजी</option>
                                        <option>आजोबा</option>
                                        <option>इतर</option>
                                    </select>
                                    <div class="validation-error"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">वार्षिक उत्पन्न</label>
                                    <input type="text" class="form-control" name="annual_income" placeholder="तुमचे वार्षिक उत्पन्न">
                                    <div class="validation-error"></div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-success mt-2" onclick="addMember()">+ सदस्य जोडा</button>
                        </div>  
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 3: Family Relations -->
                <div class="wizard-step" data-step="3">
                    <h4 class="step-title">कुटुंबातील संबंध</h4>
                    
                    <div class="row mb-3 align-items-center">
                        <label class="form-label">
                            कुटुंबातील सदस्यांचे आपसी संबंध
                        </label>

                        <div class="row mb-3">
                            <!-- संबंध -->
                            <div class="col-md-6">
                                <label class="form-label">आपसी संबंध</label>
                                <select class="form-select" name="sambandh">
                                    <option value="">-- निवडा --</option>
                                    <option>वडील व आई</option>
                                    <option>वडील व बालक</option>
                                    <option>आई व बालक</option>
                                    <option>वडील व भावंड</option>
                                    <option>आई व भावंड</option>
                                    <option>बालक व भावंड</option>
                                    <option>बालक व नातेवाईक</option>
                                </select>
                            </div>

                            <!-- संबंधाचे स्वरूप -->
                            <div class="col-md-6">
                                <label class="form-label">संबंधाचे स्वरूप</label>
                                <select class="form-select" name="sambandh_sthiti">
                                    <option value="">-- निवडा --</option>
                                    <option>स्नेहपूर्ण</option>
                                    <option>विवादित</option>
                                    <option>माहित नाही</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Question 16 -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-12">
                            <label for="balak_vivahit" class="form-label">
                                १६. बालक विवाहित असेल तर पत्नी आणि मुलांचे नाव याबाबत सविस्तर तपशील
                            </label>
                            <textarea class="form-control" id="balak_vivahit" name="balak_vivahit" rows="3" placeholder="तपशील लिहा..."></textarea>
                            
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="lagu_nahi" name="balak_vivahit" value="लागु नाही">
                                <label class="form-check-label" for="lagu_nahi">
                                    लागू नाही
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Question 17 -->
                    <div class="mb-4">
                        <label class="form-label">
                            १७. कुटुंबातील सदस्य गुन्हेगारीमध्ये समावेश असल्यास विवरण – खालील प्रमाणे / लागू नाही
                        </label>

                        <div id="crimeDetailsContainer">
                            <!-- Single Row Template -->
                            <div class="crime-row p-3 mb-3 position-relative">
                                <!-- Remove Button -->
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="removeCrimeRow(this)"></button>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">क्र.</label>
                                        <input type="text" name="crime_no[]" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">नातेवाईक</label>
                                        <input type="text" name="relative[]" class="form-control" placeholder="नातेवाईक">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">गुन्हेगारीचे स्वरूप</label>
                                        <input type="text" name="crime_type[]" class="form-control" placeholder="गुन्ह्याचे स्वरूप">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">अपराध असल्याबाबतची स्थिती</label>
                                        <select name="crime_status[]" class="form-select">
                                            <option value="">-- निवडा --</option>
                                            <option>होय</option>
                                            <option>नाही</option>
                                            <option>प्रलंबित</option>
                                        </select>
                                    </div>

                                     <div class="col-md-4">
                                        <label class="form-label">अटक किवा कारागृह</label>
                                        <select name="jail_status[]" class="form-select">
                                            <option value="">-- निवडा --</option>
                                            <option>अटक</option>
                                            <option>कारागृह</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">शिक्षेचा अवधी / दिलेला दंड</label>
                                        <input type="text" name="punishment[]" class="form-control" placeholder="उदा. २ वर्षे / ₹5000 दंड">
                                    </div>
                                </div>
                                <!-- Add Button -->
                            <button type="button" class="btn btn-success mt-3" onclick="addCrimeRow()">+ जोडा</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(3)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 4: Additional Information -->
                <div class="wizard-step" data-step="4">
                    <h4 class="step-title">अतिरिक्त माहिती</h4>
                    
                    <div class="rounded mb-3">
                        <label class="form-label required" for="religion_belief">
                            १८. धर्माविषयी धर्माबद्दल – धर्म मानतो
                        </label>
                        <textarea name="religion_belief" class="form-control" rows="3" placeholder="धर्म मानतो याबद्दल तपशील लिहा..."></textarea>
                    </div>
                    
                    <div class="container-fluid mb-3">
                        <div class="row">
                            <!-- Question 19 -->
                            <div class="col-md-6">
                            <label class="form-label">१९. वर्तमान राहणीमान – सर्व साधारण स्वरूपाचे</label>

                            <div class="mb-2">
                                <label>धुम्रपान</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="smoking" value="होय"> होय</label>
                                <label><input type="radio" name="smoking" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>मद्यपान</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="drinking" value="होय"> होय</label>
                                <label><input type="radio" name="drinking" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>मादक पदार्थांचे सेवन करणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="drugs" value="होय"> होय</label>
                                <label><input type="radio" name="drugs" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>जुगार खेळणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="gambling" value="होय"> होय</label>
                                <label><input type="radio" name="gambling" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>भिक मागणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="begging" value="होय"> होय</label>
                                <label><input type="radio" name="begging" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>इतर काही</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="other_habit" value="होय" onclick="toggleTextbox('other_habit','otherHabitBox')"> होय</label>
                                <label><input type="radio" name="other_habit" value="नाही" onclick="toggleTextbox('other_habit','otherHabitBox')"> नाही</label>
                                </div>
                                <div id="otherHabitBox" style="display:none;" class="mt-2">
                                <input type="text" class="form-control" name="other_habit_text" placeholder="इतर काही लिहा">
                                </div>
                            </div>
                            </div>

                            <!-- Question 21 -->
                            <div class="col-md-6">
                                <label class="form-label">२१. बालकाच्या सवयी</label>

                            <div class="mb-2">
                                <label>१. दूरदर्शन / चित्रपट पाहणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="tv" value="होय"> होय</label>
                                <label><input type="radio" name="tv" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>२. घरी खेळणे / मित्रांसोबत खेळणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="playing" value="होय"> होय</label>
                                <label><input type="radio" name="playing" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>३. पुस्तक वाचणे</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="reading" value="होय"> होय</label>
                                <label><input type="radio" name="reading" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>४. धार्मिक आवड</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="religious" value="होय"> होय</label>
                                <label><input type="radio" name="religious" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>५. नृत्य / चित्रकला / नाटक / गायन</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="arts" value="होय"> होय</label>
                                <label><input type="radio" name="arts" value="नाही"> नाही</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>६. इतर काही</label>
                                <div class="d-flex">
                                <label class="me-3"><input type="radio" name="other_interest" value="होय" onclick="toggleTextbox('other_interest','otherInterestBox')"> होय</label>
                                <label><input type="radio" name="other_interest" value="नाही" onclick="toggleTextbox('other_interest','otherInterestBox')"> नाही</label>
                                </div>
                                <div id="otherInterestBox" style="display:none;" class="mt-2">
                                <input type="text" class="form-control" name="other_interest_text" placeholder="इतर काही लिहा">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(4)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(4)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 5: Education Information -->
                <div class="wizard-step" data-step="5">
                    <h4 class="step-title">शिक्षण माहिती</h4>
                    
                    <!-- Content for education information -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-12">
                            <label for="balak_vivahit" class="form-label">
                                २२. आवडीचे विषय / अभ्यास 
                            </label>
                            <input class="form-control" id="balak_vivahit" name="balak_vivahit" rows="3" placeholder="आवडीचे विषय / अभ्यास लिहा..."></input>
                        </div>
                    </div>
                    
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-12">
                            <label for="balak_vivahit" class="form-label">
                                २३. उत्कृष्ठ गुण व व्यक्तिमत्व विशेष –      
                            </label>
                            <input class="form-control" id="balak_vivahit" name="balak_vivahit" rows="3" placeholder="उत्कृष्ठ गुण व व्यक्तिमत्व लिहा..."></input>
                        </div>
                    </div>

                    <!-- २४ व २५ एका रांगेत -->
                    <div class="row">
                        <!-- २४. बालकाचे शिक्षणाबद्दल सविस्तर माहिती -->
                        <div class="col-md-6 mb-3">
                            <label><strong>२४. बालकाचे शिक्षणाबद्दल सविस्तर माहिती (योग्य ते ✔ करणे) –</strong></label><br>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_education" id="edu1" value="अशिक्षित">
                            <label class="form-check-label" for="edu1">अशिक्षित</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_education" id="edu2" value="शिक्षण ५ वी वर्गापर्यंत">
                            <label class="form-check-label" for="edu2">शिक्षण ५ वी वर्गापर्यंत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_education" id="edu3" value="शिक्षण ५ वी पेक्षा जास्त परंतु ८ वी पेक्षा कमी">
                            <label class="form-check-label" for="edu3">शिक्षण ५ वी पेक्षा जास्त परंतु ८ वी पेक्षा कमी</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_education" id="edu4" value="शिक्षण ८ वी पेक्षा जास्त परंतु दहावीपेक्षा कमी">
                            <label class="form-check-label" for="edu4">शिक्षण ८ वी पेक्षा जास्त परंतु दहावीपेक्षा कमी</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_education" id="edu5" value="शिक्षण दहावीपेक्षा जास्त">
                            <label class="form-check-label" for="edu5">शिक्षण दहावीपेक्षा जास्त</label>
                            </div>
                        </div>

                        <!-- २५. बालकाचे शेवटचे शिक्षण कुठे झाले -->
                        <div class="col-md-6 mb-3">
                            <label><strong>२५. बालकाचे शेवटचे शिक्षण कुठे झाले –</strong></label><br>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="last_education_place" id="place1" value="नगर परिषद / नगरपंचायत / पंचायत / ग्रामपंचायत">
                            <label class="form-check-label" for="place1">नगर परिषद / नगरपंचायत / पंचायत / ग्रामपंचायत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="last_education_place" id="place2" value="शासकीय / SC-ST कल्याण शाळा / OBC कल्याण शाळा">
                            <label class="form-check-label" for="place2">शासकीय / अनुसूचित जाती व जमातीची कल्याण शाळा / इतर मागासवर्ग कल्याण शाळा</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="last_education_place" id="place3" value="खाजगी शाळा">
                            <label class="form-check-label" for="place3">खाजगी शाळा</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="last_education_place" id="place4" value="NCLP अंतर्गत शाळा">
                            <label class="form-check-label" for="place4">NCLP अंतर्गत शाळा</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="last_education_place" id="place5" value="बालगृहात">
                            <label class="form-check-label" for="place5">बालगृहात</label>
                            </div>
                        </div>
                    </div>

                    <!-- २६ व २७ एका रांगेत -->
                    <div class="row">
                        <!-- २६. बालकाचे वर्गातील मित्र/सोबती यांच्या सोबतचे संबंध -->
                        <div class="col-md-6 mb-3">
                            <label><strong>२६. बालकाचे वर्गातील मित्र/सोबती यांच्या सोबतचे संबंध –</strong></label><br>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="relation_friends" id="relation1" value="चांगले स्नेहपूर्वक संबंध आहेत">
                            <label class="form-check-label" for="relation1">चांगले स्नेहपूर्वक संबंध आहेत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="relation_friends" id="relation2" value="सामान्य संबंध आहेत">
                            <label class="form-check-label" for="relation2">सामान्य संबंध आहेत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="relation_friends" id="relation3" value="वाईट संबंध आहेत">
                            <label class="form-check-label" for="relation3">वाईट संबंध आहेत</label>
                            </div>
                        </div>

                        <!-- २७. बालकासोबत शिक्षक व वर्ग मित्रांसोबतची वर्तणूक -->
                        <div class="col-md-6 mb-3">
                            <label><strong>२७. बालकासोबत शिक्षक व वर्ग मित्रांसोबतची वर्तणूक –</strong></label><br>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="behavior_teachers_friends" id="behavior1" value="चांगले स्नेहपूर्वक संबंध आहेत">
                            <label class="form-check-label" for="behavior1">चांगले स्नेहपूर्वक संबंध आहेत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="behavior_teachers_friends" id="behavior2" value="सामान्य संबंध आहेत">
                            <label class="form-check-label" for="behavior2">सामान्य संबंध आहेत</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="behavior_teachers_friends" id="behavior3" value="वाईट संबंध आहेत">
                            <label class="form-check-label" for="behavior3">वाईट संबंध आहेत</label>
                            </div>
                        </div>
                    </div>

                    <!-- २८. शाळा सोडण्याची कारणे -->
                    <div class="mb-3">
                        <label><strong>२८. शाळा सोडण्याची कारणे – (योग्य ते ✔ करणे)</strong></label>

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason1" value="अंतिम वर्गात अनुतीर्ण होणे">
                                <label class="form-check-label" for="reason1">अंतिम वर्गात अनुतीर्ण होणे</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason2" value="शाळेतील कार्यामध्ये आवड ठेवणे">
                                <label class="form-check-label" for="reason2">शाळेतील कार्यामध्ये आवड ठेवणे</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason3" value="बालकाप्रती शिक्षक नाराज असणे">
                                <label class="form-check-label" for="reason3">बालकाप्रती शिक्षक नाराज असणे</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason4" value="मित्रांसोबत दुर्व्यवहार">
                                <label class="form-check-label" for="reason4">मित्रांसोबत दुर्व्यवहार</label>
                            </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason5" value="कुटुंबाकडून आर्थिक पाठबळ असमर्थ">
                                <label class="form-check-label" for="reason5">कुटुंबाकडून आर्थिक पाठबळ असमर्थ</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason6" value="आई वडिलांचा आकस्मिक मृत्यू">
                                <label class="form-check-label" for="reason6">आई वडिलांचा आकस्मिक मृत्यू</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason7" value="शाळेत भीतीदायक वातावरण">
                                <label class="form-check-label" for="reason7">शाळेत भीतीदायक वातावरण</label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason8" value="शाळेत अतिशिस्त वातावरण">
                                <label class="form-check-label" for="reason8">शाळेत अतिशिस्त वातावरण</label>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason5" value="कुटुंबाकडून आर्थिक पाठबळ असमर्थ">
                                <label class="form-check-label" for="reason5">शाळेतील पळून गेल्यामुळे अनुपस्थिती </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason6" value="आई वडिलांचा आकस्मिक मृत्यू">
                                <label class="form-check-label" for="reason6">जवळची शाळा योग्य नाही </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason7" value="शाळेत भीतीदायक वातावरण">
                                <label class="form-check-label" for="reason7">शाळेत दुर्व्यवहार </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason8" value="शाळेत अतिशिस्त वातावरण">
                                <label class="form-check-label" for="reason8">शाळेत अपमानित होणे </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason8" value="शाळेत अतिशिस्त वातावरण">
                                <label class="form-check-label" for="reason8">शारीरिक दंड </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason8" value="शाळेत अतिशिस्त वातावरण">
                                <label class="form-check-label" for="reason8">शिक्षेचा प्रकार </label>
                            </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dropout_reason[]" id="reason8" value="शाळेत अतिशिस्त वातावरण">
                                <label class="form-check-label" for="reason8">इतर ( काही नमूद असतील तर )</label>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(5)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(5)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 6: Employment Information -->
                <div class="wizard-step" data-step="6">
                    <h4 class="step-title">रोजगार माहिती</h4>
                    
                    <!-- Content for employment information -->
                    <div class="row">
                        <!-- २९. व्यावसायिक प्रशिक्षण -->
                        <div class="col-md-6 mb-3">
                            <label for="training"><strong>२९. व्यावसायिक प्रशिक्षण ( जर काही असेल तर ) –</strong></label>
                            <input type="text" class="form-control" id="training" name="training" placeholder="तपशील लिहा">
                        </div>

                        <!-- ३०. रोजगारविषयी सविस्तर माहिती -->
                        <div class="col-md-6 mb-3">
                            <label for="employment"><strong>३०. रोजगारविषयी सविस्तर माहिती ( जर काही असेल तर ) –</strong></label>
                            <textarea class="form-control" id="employment" name="employment" rows="2" placeholder="तपशील लिहा"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ३१. प्राप्त उत्पनाबाबत माहिती -->
                        <div class="col-md-6 mb-3">
                            <label for="income"><strong>३१. प्राप्त उत्पनाबाबत माहिती –</strong></label>
                            <textarea class="form-control" id="income" name="income" rows="2" placeholder="तपशील लिहा"></textarea>
                        </div>

                        <!-- ३२. कार्याबाबत माहिती -->
                        <div class="col-md-6 mb-3">
                            <label for="work"><strong>३२. कार्याबाबत माहिती ( व्यावसायिक आवड नसल्यामुळे सोडल्याची कारणे व नोकरीमध्ये झालेला दुर्व्यवहार ) –</strong></label>
                            <textarea class="form-control" id="work" name="work" rows="2" placeholder="तपशील लिहा"></textarea>
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(6)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(6)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 7: Friends and Social Information -->
                <div class="wizard-step" data-step="7">
                    <h4 class="step-title">मित्र आणि सामाजिक माहिती</h4>
                    
                    <!-- Content for friends and social information -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">३३. मित्राची संगत (जर काही असेल तर) – (योग्य ते   करणे )</label>

                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend1" name="friends[]" value="सुशिक्षित">
                                <label class="form-check-label" for="friend1">सुशिक्षित</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend2" name="friends[]" value="अशिक्षित">
                                <label class="form-check-label" for="friend2">अशिक्षित किवा अनपड</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend3" name="friends[]" value="सम वयाचे">
                                <label class="form-check-label" for="friend3">सम वयाचे मित्र</label>
                            </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend4" name="friends[]" value="मोठे">
                                <label class="form-check-label" for="friend4">यापेक्षा मोठे मित्र</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend5" name="friends[]" value="लहान">
                                <label class="form-check-label" for="friend5">वयापेक्षा लहान/छोटे</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend6" name="friends[]" value="समलिंगी">
                                <label class="form-check-label" for="friend6">समलिंगी मित्र</label>
                            </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend7" name="friends[]" value="असमलिंगी">
                                <label class="form-check-label" for="friend7">असमलिंगी मित्र</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend8" name="friends[]" value="व्यसन">
                                <label class="form-check-label" for="friend8">व्यसन</label>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friend9" name="friends[]" value="गुंड">
                                <label class="form-check-label" for="friend9">अपराधी/गुंड प्रवृत्तीचे</label>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- ३४ -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">३४. मित्रासंबंधित बालकांचा व्यवहार</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_friend_behavior" id="cfb1" value="चांगला" >
                            <label class="form-check-label" for="cfb1">चांगला व्यवहार आहे</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="child_friend_behavior" id="cfb2" value="वाईट">
                            <label class="form-check-label" for="cfb2">वाईट व्यवहार आहे</label>
                            </div>
                        </div>

                        <!-- ३५ -->
                        <div class="col-md-6">
                            <label class="form-label ">३५. बालकाप्रति मित्रांचा व्यवहार</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="friend_child_behavior" id="fcb1" value="चांगला" >
                            <label class="form-check-label" for="fcb1">चांगला व्यवहार आहे</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="friend_child_behavior" id="fcb2" value="वाईट">
                            <label class="form-check-label" for="fcb2">वाईट व्यवहार आहे</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- ३६ -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">३६. शेजाऱ्यासोबतचे संबंध (शेजाऱ्याकडून मिळणारी वागणूक)</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="neighbor_relation" id="nr1" value="चांगली" >
                            <label class="form-check-label" for="nr1">चांगली</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="neighbor_relation" id="nr2" value="वाईट">
                            <label class="form-check-label" for="nr2">वाईट</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(7)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(7)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 8: Health Information -->
                <div class="wizard-step" data-step="8">
                    <h4 class="step-title">आरोग्य माहिती</h4>
                    
                    <!-- Content for health information -->
                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <label><strong>३७. बालकाची मानसिक स्थिती –</strong></label><br>
                            <input type="checkbox" name="mental_status[]" value="स्थिर"> स्थिर <br>
                            <input type="checkbox" name="mental_status[]" value="अस्थिर"> अस्थिर / चंचल <br>
                            <input type="checkbox" name="mental_status[]" value="भीतीग्रस्त"> भीतीग्रस्त <br>
                            <input type="checkbox" name="mental_status[]" value="आत्मविश्वासी"> आत्मविश्वासी <br>
                            <input type="checkbox" name="mental_status[]" value="उदास"> उदास / नैराश्यपूर्ण <br>
                        </div>

                        <div class="col-md-6">
                            <label><strong>३८. बालकाची शारीरिक स्थिती –</strong></label><br>
                            <input type="checkbox" name="physical_status[]" value="निरोगी"> निरोगी <br>
                            <input type="checkbox" name="physical_status[]" value="अशक्त"> अशक्त / कमकुवत <br>
                            <input type="checkbox" name="physical_status[]" value="आजारी"> आजारी <br>
                            <input type="checkbox" name="physical_status[]" value="अपंग"> अपंगत्व / विशेष गरजा <br>
                            <input type="checkbox" name="physical_status[]" value="कुपोषित"> कुपोषित <br>
                        </div>
                    </div>

                    <label><strong>३९. बालकाची आरोग्यविषयक स्थिती – (योग्य ते  करणे)</strong></label><br>

                    <div class="row mt-2">
                        <!-- अ -->
                        <div class="col-md-4 mb-3">
                            <label>अ. बालकांची आरोग्य विषयक स्थिती – </label>
                            <input type="text" name="general_health" class="form-control">
                        </div>

                        <!-- आ -->
                        <div class="col-md-4 mb-3">
                            <label>आ. श्वसनसंबंधित दोष – </label><br>
                            <label><input type="radio" name="respiratory" value="आहे"> आहे</label>
                            <label><input type="radio" name="respiratory" value="नाही"> नाही</label>
                            <label><input type="radio" name="respiratory" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- इ -->
                        <div class="col-md-4 mb-3">
                            <label>इ. बहिरेपणा – </label><br>
                            <label><input type="radio" name="hearing" value="आहे"> आहे</label>
                            <label><input type="radio" name="hearing" value="नाही"> नाही</label>
                            <label><input type="radio" name="hearing" value="माहित नाही"> माहित नाही</label>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ई -->
                        <div class="col-md-4 mb-3">
                            <label>ई. नेत्ररोग – </label><br>
                            <label><input type="radio" name="eye" value="आहे"> आहे</label>
                            <label><input type="radio" name="eye" value="नाही"> नाही</label>
                            <label><input type="radio" name="eye" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- उ -->
                        <div class="col-md-4 mb-3">
                            <label>उ. दंतरोग – </label><br>
                            <label><input type="radio" name="dental" value="आहे"> आहे</label>
                            <label><input type="radio" name="dental" value="नाही"> नाही</label>
                            <label><input type="radio" name="dental" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- ऊ -->
                        <div class="col-md-4 mb-3">
                            <label>ऊ. हृदयरोग – </label><br>
                            <label><input type="radio" name="heart" value="आहे"> आहे</label>
                            <label><input type="radio" name="heart" value="नाही"> नाही</label>
                            <label><input type="radio" name="heart" value="माहित नाही"> माहित नाही</label>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ऋ -->
                        <div class="col-md-4 mb-3">
                            <label>ऋ. चर्मरोग – </label><br>
                            <label><input type="radio" name="skin" value="आहे"> आहे</label>
                            <label><input type="radio" name="skin" value="नाही"> नाही</label>
                            <label><input type="radio" name="skin" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- ऌ -->
                        <div class="col-md-4 mb-3">
                            <label>ऌ. यौवन संबंधित रोग – </label><br>
                            <label><input type="radio" name="puberty" value="आहे"> आहे</label>
                            <label><input type="radio" name="puberty" value="नाही"> नाही</label>
                            <label><input type="radio" name="puberty" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- ऍ -->
                        <div class="col-md-4 mb-3">
                            <label>ऍ. आतडी संबंधित रोग – </label><br>
                            <label><input type="radio" name="intestine" value="आहे"> आहे</label>
                            <label><input type="radio" name="intestine" value="नाही"> नाही</label>
                            <label><input type="radio" name="intestine" value="माहित नाही"> माहित नाही</label>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ऎ -->
                        <div class="col-md-4 mb-3">
                            <label>ऎ. मनोरुग्ण संबंधित रोग – </label><br>
                            <label><input type="radio" name="mental" value="आहे"> आहे</label>
                            <label><input type="radio" name="mental" value="नाही"> नाही</label>
                            <label><input type="radio" name="mental" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- ए -->
                        <div class="col-md-4 mb-3">
                            <label>ए. शारीरिक अपंगत्व अथवा संबंधित रोग – </label><br>
                            <label><input type="radio" name="disability" value="आहे"> आहे</label>
                            <label><input type="radio" name="disability" value="नाही"> नाही</label>
                            <label><input type="radio" name="disability" value="माहित नाही"> माहित नाही</label>
                        </div>

                        <!-- क (इतर) -->
                        <div class="col-md-4 mb-3">
                            <label>क. इतर – </label><br>
                            <input type="checkbox" id="otherCheck"> निवडा
                            <input type="text" id="otherText" name="other_health" class="form-control mt-2" style="display:none;">
                        </div>
                    </div>
                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(8)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(8)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 9: Additional Details -->
                <div class="wizard-step" data-step="9">
                    <h4 class="step-title">अतिरिक्त तपशील</h4>
                    
                    <!-- Content for additional details -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">४०. बालकाला कोणते व्यसन आहे का ?</label>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" name="vyasan" id="vyasan_yes" value="होय" onclick="document.getElementById('vyasan_text').style.display='block'">
                                <label for="vyasan_yes">होय</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" name="vyasan" id="vyasan_no" value="नाही" onclick="document.getElementById('vyasan_text').style.display='none'">
                                <label for="vyasan_no">नाही</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3" id="vyasan_text" style="display:none;">
                        <div class="col-md-12">
                            <label class="form-label">(होय असल्यास)</label>
                            <input type="text" class="form-control" name="vyasan_details" placeholder="व्यसनाचे तपशील लिहा">
                        </div>
                    </div>

                    <div class="row mb-3">
                            <!-- Question 41 -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">४१. बालसमिती समोर हजर करण्यापूर्वी कोणासोबत राहत होता –</label>
                                <div class="mb-2">
                                    <input type="checkbox" id="with_parents" name="rahat2" value="आई वडील">
                                    <label for="with_parents">आई वडील – आई / वडील / दोघेही</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="with_siblings" name="rahat2" value="भावंड">
                                    <label for="with_siblings">भावंड</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="safe_relation" name="rahat2" value="सुरक्षित संबंध">
                                    <label for="safe_relation">सुरक्षित संबंध</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="with_friend" name="rahat2" value="मित्र">
                                    <label for="with_friend">मित्र</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="orphan" name="rahat2" value="अनाथ">
                                    <label for="orphan">अनाथ</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="night_home" name="rahat2" value="रात्रीचे आश्रय गृह">
                                    <label for="night_home">रात्रीचे आश्रय गृह</label>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="orphanage" name="rahat2" value="अनाथालय">
                                        <label for="orphanage">अनाथालय / वसतिगृह / याव्यतिरिक्त</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="orphanage_text" name="orphanage_details" placeholder="तपशील लिहा" style="display:none;">
                                    </div>
                                </div>
                            </div>

                            <!-- Question 42 -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">४२. इतर नातेवाईक (असल्यास नाते नमूद क्र.) –</label>
                                <input type="text" class="form-control" name="other_relative" placeholder="नाते नमूद करा">
                            </div>
                        </div>

                        <script>
                            document.getElementById('orphanage').addEventListener('change', function() {
                                document.getElementById('orphanage_text').style.display = this.checked ? 'block' : 'none';
                            });
                        </script>

                        <div class="row mb-3">
                        <!-- प्रश्न ४३ -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">४३. बालक घरातून पळण्यासंबंधित पूर्ववृत्त / प्रवृत्ती यापैकी काही –</label>
                            <textarea class="form-control" name="runaway_history" rows="3" placeholder="तपशील लिहा"></textarea>
                        </div>

                        <!-- प्रश्न ४४ -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">४४. घरी आई वडिलांची शिस्त व त्याबाबत बालकाची प्रतिक्रिया –</label>
                            <textarea class="form-control" name="parent_discipline" rows="3" placeholder="तपशील लिहा"></textarea>
                        </div>
                    </div>

                    
                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(9)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(9)">पुढे</button>
                    </div>
                </div>

                <!-- Step 10: Additional Details -->
                <div class="wizard-step" data-step="10">
                    <h4 class="step-title">अतिरिक्त तपशील</h4>
                    <div class="mb-3">
                    <label class="form-label fw-bold">४५. कुटुंब सोडल्याचे कारणे – (योग्य ते ✓ करणे) - लागू नाही</label>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <input type="checkbox" id="reason1" name="reasons[]" value="गैरवर्तणूक">
                            <label for="reason1">आई व वडील / संरक्षण / सावत्र आई वडील द्वारा होणारे गैरवर्तणूक</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason2" name="reasons[]" value="रोजगाराचा शोध">
                            <label for="reason2">रोजगाराचा शोध</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason3" name="reasons[]" value="मित्राचा प्रभाव">
                            <label for="reason3">मित्राचा प्रभाव</label>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <input type="checkbox" id="reason4" name="reasons[]" value="असमर्थता">
                            <label for="reason4">आई वडिलांची असमर्थता</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason5" name="reasons[]" value="अपराधी व्यवहार">
                            <label for="reason5">आई वडिलांचा अपराधी व्यवहार</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason6" name="reasons[]" value="दूर ठेवणे">
                            <label for="reason6">आई वडिलांपासून दूर ठेवणे</label>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <input type="checkbox" id="reason7" name="reasons[]" value="अचानक मृत्यू">
                            <label for="reason7">आई वडिलांचा अचानक मृत्यू</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason8" name="reasons[]" value="गरिबी">
                            <label for="reason8">गरिबी</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="reason9" name="reasons[]" value="इतर" onclick="toggleOtherReason()">
                            <label for="reason9">इतर (कृपया कारण लिहा)</label>
                            <input type="text" class="form-control mt-1" id="other_reason" name="other_reason" placeholder="कारण लिहा" style="display:none;">
                        </div>
                    </div>
                </div>

                <script>
                function toggleOtherReason() {
                    var checkbox = document.getElementById("reason9");
                    var textbox = document.getElementById("other_reason");
                    if (checkbox.checked) {
                        textbox.style.display = "block";
                    } else {
                        textbox.style.display = "none";
                    }
                }
                </script>

                <div class="mb-3">
                <label class="form-label fw-bold">४६. बालकाने कोणता अपराध केला आहे काय?</label>

                <div class="row">
                    <div class="col-md-2">
                        <input type="radio" id="crime_no" name="crime" value="नाही"  onclick="toggleCrimeTextbox(false)">
                        <label for="crime_no">नाही</label>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="crime_yes" name="crime" value="होय" onclick="toggleCrimeTextbox(true)">
                        <label for="crime_yes">होय</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="crime_details" name="crime_details" class="form-control" placeholder="अपराध लिहा" style="display:none;">
                    </div>
                </div>
            </div>

            <script>
            function toggleCrimeTextbox(show) {
                var textbox = document.getElementById("crime_details");
                textbox.style.display = show ? "block" : "none";
            }
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">४७. बालकावर होणारे अत्याचाराचे प्रभाव –</label>

                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="checkbox" id="verbal_abuse" name="abuse[]" value="शाब्दिक अत्याचार">
                        <label for="verbal_abuse">शाब्दिक अत्याचार</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="physical_abuse" name="abuse[]" value="शारीरिक अत्याचार">
                        <label for="physical_abuse">शारीरिक अत्याचार</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="sexual_abuse" name="abuse[]" value="यौन अत्याचार">
                        <label for="sexual_abuse">यौन अत्याचार – आई/वडील/भावंड/पाल्य/इतर </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="sexual_abuse_text" name="sexual_abuse_details"
                            placeholder="(कृपया कारण लिहा)" style="display:none;">
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('sexual_abuse').addEventListener('change', function() {
                document.getElementById('sexual_abuse_text').style.display = this.checked ? 'block' : 'none';
            });
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">४८. बालकावर होणाऱ्या अत्याचाराचे प्रकार –</label>

                <div class="row g-3">
                    <!-- अ. जेवण न देणे -->
                    <div class="col-md-3">
                        <input type="checkbox" id="deprived_food" name="abuse_type[]" value="जेवण न देणे">
                        <label for="deprived_food">जेवण न देणे</label>
                        <input type="text" class="form-control mt-1" id="deprived_food_text" name="deprived_food_details" placeholder="आई / वडील / भावंड / पाल्य / इतर" style="display:none;">
                    </div>

                    <!-- आ. मारहाण करणे -->
                    <div class="col-md-3">
                        <input type="checkbox" id="beating" name="abuse_type[]" value="मारहाण करणे">
                        <label for="beating">मारहाण करणे</label>
                        <input type="text" class="form-control mt-1" id="beating_text" name="beating_details" placeholder="आई / वडील / भावंड / पाल्य / इतर" style="display:none;">
                    </div>

                    <!-- इ. इजा / हानी -->
                    <div class="col-md-3">
                        <input type="checkbox" id="injury" name="abuse_type[]" value="इजा / हानी">
                        <label for="injury">इजा / हानी</label>
                        <input type="text" class="form-control mt-1" id="injury_text" name="injury_details" placeholder="आई / वडील / भावंड / पाल्य / इतर" style="display:none;">
                    </div>

                    <!-- ई. दूर ठेवणे -->
                    <div class="col-md-3">
                        <input type="checkbox" id="neglect" name="abuse_type[]" value="दूर ठेवणे">
                        <label for="neglect">दूर ठेवणे</label>
                        <input type="text" class="form-control mt-1" id="neglect_text" name="neglect_details" placeholder="आई / वडील / भावंड / पाल्य / इतर" style="display:none;">
                    </div>

                    <!-- उ. इतर -->
                    <div class="col-md-3">
                        <input type="checkbox" id="other_abuse" name="abuse_type[]" value="इतर">
                        <label for="other_abuse">इतर</label>
                        <input type="text" class="form-control mt-1" id="other_abuse_text" name="other_abuse_details" placeholder="इतर तपशील" style="display:none;">
                    </div>
                </div>
            </div>

            <script>
                // Function to toggle textboxes
                function toggleTextbox(checkboxId, textboxId) {
                    document.getElementById(checkboxId).addEventListener('change', function () {
                        document.getElementById(textboxId).style.display = this.checked ? 'block' : 'none';
                    });
                }

                toggleTextbox('deprived_food', 'deprived_food_text');
                toggleTextbox('beating', 'beating_text');
                toggleTextbox('injury', 'injury_text');
                toggleTextbox('neglect', 'neglect_text');
                toggleTextbox('other_abuse', 'other_abuse_text');
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">४८. बालकाचे शोषण –</label>

                <div class="row g-3">
                    <!-- अ. पगार न देता काम करून घेणे -->
                    <div class="col-md-4">
                        <input type="checkbox" id="no_salary" name="exploitation_type[]" value="पगार न देता काम करून घेणे">
                        <label for="no_salary">पगार न देता काम करून घेणे</label>
                    </div>

                    <!-- आ. कमीत कमी मजुरी देऊन काम करवून घेणे -->
                    <div class="col-md-4">
                        <input type="checkbox" id="low_wage" name="exploitation_type[]" value="कमीत कमी मजुरी देऊन काम करवून घेणे">
                        <label for="low_wage">कमीत कमी मजुरी देऊन काम करवून घेणे</label>
                    </div>

                    <!-- इ. इतर -->
                    <div class="col-md-4">
                        <input type="checkbox" id="other_exploitation" name="exploitation_type[]" value="इतर">
                        <label for="other_exploitation">इतर</label>
                        <input type="text" class="form-control mt-1" id="other_exploitation_text" name="other_exploitation_details" placeholder="कृपया नोंद करा" style="display:none;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox for "इ. इतर"
                document.getElementById('other_exploitation').addEventListener('change', function () {
                    document.getElementById('other_exploitation_text').style.display = this.checked ? 'block' : 'none';
                });
            </script>


                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(10)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(10)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 11: Additional Details -->
                <div class="wizard-step" data-step="11">
                    <h4 class="step-title">अतिरिक्त तपशील</h4>
                    <div class="mb-3">
                <label class="form-label fw-bold">
                    ४९. काय बालकाला आणल्या गेले होते / विकले गेले होते / चोरून आणले होते / अवैद्य व्यापार करण्यात आले होते काय ?
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="illegal_trade" id="illegal_trade_no" value="नाही" >
                        <label class="form-check-label" for="illegal_trade_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="illegal_trade" id="illegal_trade_yes" value="होय">
                        <label class="form-check-label me-2" for="illegal_trade_yes">होय</label>
                        <input type="text" class="form-control" id="illegal_trade_details" name="illegal_trade_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox next to "होय"
                document.getElementById('illegal_trade_yes').addEventListener('change', function() {
                    document.getElementById('illegal_trade_details').style.display = this.checked ? 'block' : 'none';
                });

                document.getElementById('illegal_trade_no').addEventListener('change', function() {
                    document.getElementById('illegal_trade_details').style.display = 'none';
                });
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५०. बालकाला भिक्षा मांगण्यासाठी कामावर लावण्यात आले होते काय ?
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="begging_work" id="begging_no" value="नाही" >
                        <label class="form-check-label" for="begging_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="begging_work" id="begging_yes" value="होय">
                        <label class="form-check-label me-2" for="begging_yes">होय</label>
                        <!-- <input type="text" class="form-control" id="begging_details" name="begging_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;"> -->
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५१. बालकाचा वापर अप्रवृत्ती समूहासोबत / प्रौढ व्यक्ती / समूहाकरिता / मादक पदार्थ वितरण करण्यासाठी वापर केला जातो काय ?
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="substance_use" id="substance_no" value="नाही" >
                        <label class="form-check-label" for="substance_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="substance_use" id="substance_yes" value="होय">
                        <label class="form-check-label me-2" for="substance_yes">होय</label>
                        <!-- <input type="text" class="form-control" id="substance_details" name="substance_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;"> -->
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५२. या अगोदर संस्था अंतर्गत / वैयक्तिक प्रकरण जर असेल तर –
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="previous_case" id="previous_case_no" value="नाही" >
                        <label class="form-check-label" for="previous_case_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="previous_case" id="previous_case_yes" value="होय">
                        <label class="form-check-label me-2" for="previous_case_yes">होय</label>
                        <input type="text" class="form-control" id="previous_case_details" name="previous_case_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox next to "होय"
                document.getElementById('previous_case_yes').addEventListener('change', function() {
                    document.getElementById('previous_case_details').style.display = this.checked ? 'block' : 'none';
                });

                document.getElementById('previous_case_no').addEventListener('change', function() {
                    document.getElementById('previous_case_details').style.display = 'none';
                });
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५३. अपराधी बद्दल माहिती
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="criminal_info" id="criminal_info_no" value="नाही" >
                        <label class="form-check-label" for="criminal_info_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="criminal_info" id="criminal_info_yes" value="होय">
                        <label class="form-check-label me-2" for="criminal_info_yes">होय</label>
                        <input type="text" class="form-control" id="criminal_info_details" name="criminal_info_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox next to "होय"
                document.getElementById('criminal_info_yes').addEventListener('change', function() {
                    document.getElementById('criminal_info_details').style.display = this.checked ? 'block' : 'none';
                });

                document.getElementById('criminal_info_no').addEventListener('change', function() {
                    document.getElementById('criminal_info_details').style.display = 'none';
                });
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५४. अपराधी सोबत बालकाची वर्तणूक
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="child_behavior" id="child_behavior_no" value="नाही" >
                        <label class="form-check-label" for="child_behavior_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="child_behavior" id="child_behavior_yes" value="होय">
                        <label class="form-check-label me-2" for="child_behavior_yes">होय</label>
                        <input type="text" class="form-control" id="child_behavior_details" name="child_behavior_details" placeholder="तपशील नमूद करा" style="display:none; max-width:200px;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox next to "होय"
                document.getElementById('child_behavior_yes').addEventListener('change', function() {
                    document.getElementById('child_behavior_details').style.display = this.checked ? 'block' : 'none';
                });

                document.getElementById('child_behavior_no').addEventListener('change', function() {
                    document.getElementById('child_behavior_details').style.display = 'none';
                });
            </script>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५५. पोलिसांना कळविण्यात आले होते काय ?
                </label>

                <div class="d-flex align-items-center gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="police_informed" id="police_no" value="नाही" >
                        <label class="form-check-label" for="police_no">नाही</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="police_informed" id="police_yes" value="होय">
                        <label class="form-check-label" for="police_yes">होय</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">
                    ५६. अपराधी विरुद्ध केलेली कार्यवाई (जर असेल तर नमूद करा)
                </label>

                <div class="d-flex align-items-center gap-3">
                    <!-- नाही -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="action_taken" id="action_no" value="नाही" >
                        <label class="form-check-label" for="action_no">नाही</label>
                    </div>

                    <!-- होय -->
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="action_taken" id="action_yes" value="होय">
                        <label class="form-check-label me-2" for="action_yes">होय</label>
                        <input type="text" class="form-control" id="action_details" name="action_details" placeholder="तपशील नमूद करा" style="display:none; max-width:250px;">
                    </div>
                </div>
            </div>

            <script>
                // Toggle textbox next to "होय"
                document.getElementById('action_yes').addEventListener('change', function() {
                    document.getElementById('action_details').style.display = this.checked ? 'block' : 'none';
                });

                document.getElementById('action_no').addEventListener('change', function() {
                    document.getElementById('action_details').style.display = 'none';
                });
            </script>

                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(11)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(11)">पुढे</button>
                    </div>
                </div>


                <!-- Step 12: Additional Details -->
                <div class="wizard-step" data-step="12">
                    <h4 class="step-title">इतर तपशील</h4>
                    <div class="mb-3">
                    <label class="form-label fw-bold">इतर काही (चौकशी व तपासणी संबंधित माहिती) –</label>

                    <div class="row g-3">
                        <!-- अ. भावनात्मक कारण -->
                        <div class="col-md-6">
                            <label class="form-label">अ. भावनात्मक कारण</label>
                            <input type="text" class="form-control" name="emotional_reason" placeholder="__________________________________________________">
                        </div>

                        <!-- आ. शारीरिक स्थिती -->
                        <div class="col-md-6">
                            <label class="form-label">आ. शारीरिक स्थिती</label>
                            <input type="text" class="form-control" name="physical_condition" value="चांगली" readonly>
                        </div>

                        <!-- इ. समझ -->
                        <div class="col-md-6">
                            <label class="form-label">इ. समझ</label>
                            <input type="text" class="form-control" name="intelligence" value="चांगली" readonly>
                        </div>

                        <!-- ई. सामाजिक व आर्थिक कारण -->
                        <div class="col-md-6">
                            <label class="form-label">ई. सामाजिक व आर्थिक कारण</label>
                            <input type="text" class="form-control" name="social_economic_reason" value="सामाजिक व आर्थिक परिस्थिती सर्व साधारण आहे." readonly>
                        </div>

                        <!-- उ. समस्याचे निवारण करण्यासाठी कारणे -->
                        <div class="col-md-6">
                            <label class="form-label">उ. समस्याचे निवारण करण्यासाठी कारणे</label>
                            <input type="text" class="form-control" name="problem_solving_reason" value="नाही" readonly>
                        </div>

                        <!-- ऊ. अपराधी असेल तर कारण / सहयोग कारण -->
                        <div class="col-md-6">
                            <label class="form-label">ऊ. अपराधी असेल तर कारण / सहयोग कारण</label>
                            <input type="text" class="form-control" name="criminal_reason" value="लागू नाही" readonly>
                        </div>

                        <!-- क. काळजी व संरक्षणासाठी बालकाची गरजांची कारणे -->
                        <div class="col-md-6">
                            <label class="form-label">क. काळजी व संरक्षणासाठी बालकाची गरजांची कारणे</label>
                            <input type="text" class="form-control" name="care_protection_reason" placeholder="_____________________________">
                        </div>

                        <!-- ख. मान्यवर अनुभवी व्यक्ती यांच्या कडून प्राप्त मार्गदर्शन -->
                        <div class="col-md-6">
                            <label class="form-label">ख. मान्यवर अनुभवी व्यक्ती यांच्या कडून प्राप्त मार्गदर्शन</label>
                            <input type="text" class="form-control" name="expert_guidance" value="नाही" readonly>
                        </div>

                        <!-- ग. सामाजिक तज्ञाचे मुल्यांकन -->
                        <div class="col-md-6">
                            <label class="form-label">ग. सामाजिक तज्ञाचे मुल्यांकन</label>
                            <input type="text" class="form-control" name="social_expert_evaluation" value="नाही" readonly>
                        </div>

                        <!-- घ. धार्मिक कारण -->
                        <div class="col-md-6">
                            <label class="form-label">घ. धार्मिक कारण</label>
                            <input type="text" class="form-control" name="religious_reason" value="नाही" readonly>
                        </div>

                        <!-- ङ. बालकाला कुटुंबात परत करण्यासाठी असलेल्या जोखमी बाबत -->
                        <div class="col-md-6">
                            <label class="form-label">ङ. बालकाला कुटुंबात परत करण्यासाठी असलेल्या जोखमी बाबत</label>
                            <input type="text" class="form-control" name="family_risk" value="नाही" readonly>
                        </div>

                        <!-- च. आगोदरची संख्या / प्रकरणाबाबत पूर्वीचा वैयक्तिक माहिती (जर असेल तर) -->
                        <div class="col-md-6">
                            <label class="form-label">च. आगोदरची संख्या / प्रकरणाबाबत पूर्वीचा वैयक्तिक माहिती (जर असेल तर)</label>
                            <input type="text" class="form-control" name="previous_case_info" placeholder="______">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">भेट देणारे अधिकारी कर्मचारी यांचे शिफारस व अभिप्राय –</label>

                    <div class="mb-2">
                        <label class="form-label">अधिकारी / कर्मचारी</label>
                        <textarea class="form-control" name="officer_feedback" rows="4" placeholder="शिफारस / अभिप्राय"></textarea>
                    </div>
                </div>

                    <div class="wizard-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(12)">मागे</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(12)">पुढे</button>
                    </div>
                </div>
                
                <!-- Step 13: Final Step with Submit Buttons -->
                <div class="wizard-step" data-step="13">
                    <h4 class="step-title">अंतिम पायरी</h4>
                    
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> सर्व माहिती यशस्वीरित्या भरली आहे. कृपया तपासा आणि सबमिट करा.
                    </div>
                    
                    <div class="button-group">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i> मंजूरीसाठी प्रस्ताव
                        </button>
                        <button type="button" class="btn btn-danger" onclick="showRejectConfirmation()">
                            <i class="fas fa-times-circle"></i> नकारासाठी प्रस्ताव
                        </button>
                    </div>
                    
                    <div class="wizard-navigation mt-4">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(13)">मागे</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include('include/footer_1.php'); ?> 

    <script>
        // Wizard functionality
        let currentStep = 1;
        const totalSteps = 14;
        
        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.wizard-step').forEach(el => {
                el.classList.remove('active');
            });
            
            // Show current step
            document.querySelector(`.wizard-step[data-step="${step}"]`).classList.add('active');
            
            // Update progress
            document.querySelectorAll('.progress-step').forEach(el => {
                const stepNum = parseInt(el.getAttribute('data-step'));
                el.classList.remove('active', 'completed');
                
                if (stepNum === step) {
                    el.classList.add('active');
                } else if (stepNum < step) {
                    el.classList.add('completed');
                }
            });
            
            currentStep = step;
        }
        
        function nextStep(step) {
            if (step < totalSteps) {
                showStep(step + 1);
            }
        }
        
        function prevStep(step) {
            if (step > 1) {
                showStep(step - 1);
            }
        }
        
        // Initialize the wizard
        showStep(1);
        
        // Your existing functions
        function toggleApangaOptions(show) {
            document.getElementById("apangaOptions").style.display = show ? "block" : "none";
            if (!show) {
                document.getElementById("otherInput").style.display = "none";
                document.getElementById("apanga_type").value = "";
            }
        }

        function toggleOtherInput(value) {
            document.getElementById("otherInput").style.display = (value === "इतर") ? "block" : "none";
        }
        
        function addMember() {
            let container = document.getElementById("familyContainer");
            let member = document.querySelector(".family-member");
            let clone = member.cloneNode(true);

            clone.querySelectorAll("input").forEach(input => input.value = "");
            clone.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

            container.appendChild(clone);
        }

        function removeMember(button) {
            let container = document.getElementById("familyContainer");
            if (container.children.length > 1) {
                button.parentElement.remove();
            } else {
                alert("किमान एक सदस्य असणे आवश्यक आहे.");
            }
        }
        
        function addCrimeRow() {
            let container = document.getElementById('crimeDetailsContainer');
            let firstRow = container.querySelector('.crime-row');
            let newRow = firstRow.cloneNode(true);

            newRow.querySelectorAll('input').forEach(input => input.value = '');

            container.appendChild(newRow);
        }

        function removeCrimeRow(button) {
            let container = document.getElementById('crimeDetailsContainer');
            if (container.querySelectorAll('.crime-row').length > 1) {
                button.closest('.crime-row').remove();
            } else {
                alert("किमान एक रकाना आवश्यक आहे.");
            }
        }
        
        function toggleTextbox(radioName, textboxId) {
            const selected = document.querySelector(`input[name="${radioName}"]:checked`);
            const textbox = document.getElementById(textboxId);
            if (selected && selected.value === "होय") {
                textbox.style.display = "block";
            } else {
                textbox.style.display = "none";
                textbox.querySelector("input").value = "";
            }
        }
        
        function validateForm() {
            // Your existing validation logic
            return true;
        }
        
        function showRejectConfirmation() {
            // Your existing rejection logic
            alert("नकारासाठी प्रस्ताव पाठवला जाईल.");
        }
        
        // Additional initialization for health section
        document.getElementById('otherCheck').addEventListener('change', function() {
            document.getElementById('otherText').style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>
</html>