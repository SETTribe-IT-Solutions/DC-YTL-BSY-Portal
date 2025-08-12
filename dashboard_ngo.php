<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>जिल्हा बाल संरक्षण कक्ष डॅशबोर्ड</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
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
        
        /* body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7f0 100%);
            font-family: 'Segoe UI', 'Nirmala UI', 'Arial', sans-serif;
            min-height: 100vh;
            padding: 20px;
        } */
        
        .dashboard-container {
            max-width: 1400px;
            margin: 20px auto;
            padding: 25px;
            background: white;
            /* border-radius: 18px; */
            /* box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12); */
        }
        
        /* .dashboard-header {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 6px 20px rgba(26, 115, 232, 0.3);
            position: relative;
            overflow: hidden;
        } */
        
        /* .dashboard-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0) 70%);
            z-index: 0;
        } */
        
        .dashboard-title {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
            color: var(--primary);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }
        
        .dashboard-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 6px;
            background: linear-gradient(90deg, var(--warning), var(--danger));
            border-radius: 3px;
        }
        
        .dashboard-subtitle {
            font-size: 1.2rem;
            opacity: 0.92;
            margin-top: 10px;
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 45px 0 25px;
            padding-bottom: 12px;
            border-bottom: 3px solid var(--primary);
            color: var(--dark);
            position: relative;
        }
        
        .section-title::after {
            content: "";
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 90px;
            height: 3px;
            background: var(--warning);
        }
        
        
        .filter-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            margin-bottom: 35px;
            margin-top: 2rem;
        }
        
        .chart-container {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            margin-top: 45px;
            position: relative;
            overflow: hidden;
        }
        
        .chart-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .chart-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--primary);
            text-align: center;
            position: relative;
        }
        
        .chart-title::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--warning);
        }
        
        .stats-summary {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            margin-top: 40px;
            border-top: 4px solid var(--primary);
        }
        
        .summary-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--primary);
            text-align: center;
        }
        
        .stats-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #e0e0e0;
        }
        
        .stats-row:last-child {
            border-bottom: none;
        }
        
        .stats-label {
            font-weight: 600;
            color: #555;
            font-size: 1.1rem;
        }
        
        .stats-value {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.2rem;
        }
        
        
        .btn-filter {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 10px 25px;
            transition: all 0.3s;
            margin-top: 2rem;
        }
        
        .btn-filter:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 115, 232, 0.4);
        }
        
        .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 115, 232, 0.15);
        }
        
        @media (max-width: 768px) {
            .dashboard-title {
                font-size: 1.5rem;
            }
            .dashboard-subtitle {
                font-size: 1rem;
            }
            .section-title {
                font-size: 1.5rem;
            }
            .chart-container {
                padding: 20px 15px;
                margin-top: 0px;
            }
        }

        .counter{
    color: #fff;
    font-family: 'Poppins', sans-serif;
    text-align: center;
    width: 210px;
    min-height: 246px;
    padding: 25px 0 0;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.counter:after{
    content: '';
    background: linear-gradient(to right, #eff0f2, #fefefe);
    height: 152px;
    width: 152px;
    border-radius: 15px;
    border: 3px solid #fff;
    box-shadow: 5px 0 8px rgba(0, 0, 0, 0.2);
    transform: translateX(-50%) rotate(45deg);
    position: absolute;
    top: 25px;
    left: 50%;
    z-index: -1;
}
.counter .counter-value{
    background:#fe8c00;
    font-size: 25px;
    font-weight: 600;
    letter-spacing: 2px;
    width: 100%;
    padding: 10px 0 6px;
    border-radius: 10px;
    box-shadow: inset 0 0 6px rgba(0,0,0,0.6),0 0 0 2px #fff;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
}
.counter .counter-icon{
    background: linear-gradient(to right,#fe8c00,#f83600);
    font-size: 30px;
    line-height: 60px;
    width: 60px;
    height: 60px;
    margin: 0 auto 20px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 4px 4px 4px rgba(0,0,0,0.4);
}
.counter h3{
    color: #f83600;
    font-size: 17px;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 22px;
    padding: 0 30px;
    margin: 0 0 15px;
}
.counter.green .counter-value{ background: #01c700; }
.counter.green .counter-icon{ background: linear-gradient(to right,#01c700,#019b01); }
.counter.green h3{ color: #019b01; }
.counter.blue .counter-value{ background: #28a9e2; }
.counter.blue .counter-icon{ background: linear-gradient(to right,#28a9e2,#0057c5); }
.counter.blue h3{ color: #0057c5; }
.counter.gray .counter-value{ background: #36474f; }
.counter.gray .counter-icon{ background: linear-gradient(to right,#36474f,#0d0e10); }
.counter.gray h3{ color: #0d0e10; }
@media screen and (max-width:990px){
    .counter{ margin-bottom: 40px; }
}   

    </style>
</head>
<body>
    <?php include('include/header_1.php'); ?>
    <div class="dashboard-container">
        <div class="dashboard-header text-center">
            <h1 class="dashboard-title">DCPO कर्मचारी/NGO डॅशबोर्ड</h1>
            <!-- <p class="dashboard-subtitle">बालकांच्या संरक्षणासाठी वास्तविक-वेळ डेटा आणि विश्लेषण</p> -->
        </div>

        <div class="filter-container">
            <div class="row align-items-center">
                <div class="col-md-3 mb-3 mb-md-0">
    <label class="form-label fw-bold">वर्ष निवडा:</label>
    <select class="form-select" id="yearSelect"></select>
</div>
                <!-- <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">जिल्हा निवडा:</label>
                    <select class="form-select">
                        <option>पुणे</option>
                        <option>मुंबई</option>
                        <option>नागपूर</option>
                        <option>नाशिक</option>
                    </select>
                </div> -->
                <!-- <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">तालुका निवडा:</label>
                    <select class="form-select">
                        <option>सर्व तालुके</option>
                        <option>हवेली</option>
                        <option>पुरंदर</option>
                        <option>बारामती</option>
                    </select>
                </div> -->
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-filter w-100 py-2">
                        <i class="fas fa-filter me-2"></i>फिल्टर लागू करा
                    </button>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <h3 class="section-title">स्कूटिनी १</h3>
        <div class="row">
            <div class="col-md-4 col-sm-6">
            <div class="counter">
                <div class="counter-content">
                    <div class="counter-icon">
                      <!-- Home Icon -->
                      <i class="fas  fa-search"></i>
                    </div>
                    <h3>गृह चौकशी साठी प्राप्त अर्ज</h3>
                </div>
                <span class="counter-value">50</span>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>गृह चौकशी झालेले अर्ज</h3>
                </div>
                <span class="counter-value">8</span>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter blue">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <h3>गृह चौकशी न झालेले अर्ज </h3>
                </div>
                <span class="counter-value">17</span>
            </div>
        </div>
    </div>




        <!-- Graphs Section -->
        <div class="chart-container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="chart-title">गृह चौकशी साठी प्राप्त अर्ज(2024-2025)</div>
                    <canvas id="annualScrutinyChart"></canvas>
                </div>
                <div class="col-md-12">
                    <div class="chart-title">गृह चौकशी न झालेले अर्ज(2024-2025)</div>
                    <canvas id="annualHomeInquiryChart"></canvas>
                </div>
            </div>
        </div>

    </div>
<?php include('include/footer_1.php'); ?>
    <script>
        // Months for the charts
        const months = ['जाने', 'फेब्रु', 'मार्च', 'एप्रि', 'मे', 'जून', 'जुलै', 'ऑग', 'सप्टें', 'ऑक्टो', 'नोव्हें', 'डिसें'];
        
        // Annual Scrutiny Chart
        const scrutinyCtx = document.getElementById('annualScrutinyChart');
        new Chart(scrutinyCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'प्राप्त अर्ज',
                        data: [85, 92, 78, 105, 120, 135, 142, 130, 115, 98, 110, 125],
                        backgroundColor: '#4285f4',
                        borderColor: '#1a73e8',
                        borderWidth: 1
                    },
                    {
                        label: 'मंजूर अर्ज',
                        data: [60, 65, 55, 75, 85, 95, 100, 92, 80, 70, 75, 88],
                        backgroundColor: '#34a853',
                        borderColor: '#2e8b47',
                        borderWidth: 1
                    },
                    {
                        label: 'नाकारलेले अर्ज',
                        data: [5, 8, 10, 12, 15, 18, 20, 15, 12, 10, 8, 12],
                        backgroundColor: '#ea4335',
                        borderColor: '#d32f2f',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        title: {
                            display: true,
                            text: 'अर्जांची संख्या',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        });
        
        // Annual Home Inquiry Chart
        const homeInquiryCtx = document.getElementById('annualHomeInquiryChart');
        new Chart(homeInquiryCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'प्राप्त अर्ज',
                        data: [45, 52, 60, 65, 70, 75, 80, 78, 72, 65, 62, 68],
                        backgroundColor: '#17a2b8',
                        borderColor: '#138496',
                        borderWidth: 1
                    },
                    {
                        label: 'पूर्ण झालेले',
                        data: [30, 35, 42, 48, 50, 55, 58, 56, 50, 45, 42, 48],
                        backgroundColor: '#ff9800',
                        borderColor: '#f57c00',
                        borderWidth: 1
                    },
                    {
                        label: 'प्रलंबित',
                        data: [15, 17, 18, 17, 20, 20, 22, 22, 22, 20, 20, 20],
                        backgroundColor: '#6c757d',
                        borderColor: '#5a6268',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        title: {
                            display: true,
                            text: 'अर्जांची संख्या',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        });

        
    </script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
      
$(document).ready(function(){
$('.counter-value').each(function(){
$(this).prop('Counter',0).animate({
Counter: $(this).text()
},{
duration: 3500,
easing: 'swing',
step: function (now){
$(this).text(Math.ceil(now));
}
});
});
});
    </script>

    <script>
document.addEventListener("DOMContentLoaded", function(){
    let select = document.getElementById("yearSelect");
    let currentYear = new Date().getFullYear();

    for(let year = 2000; year <= currentYear; year++){
        let option = document.createElement("option");
        option.value = year;
        option.textContent = ${year}-${year+1};
        select.appendChild(option);
    }

    // Optional: Select current year by default
     select.value = currentYear;
});
</script>
</body>
</html>
