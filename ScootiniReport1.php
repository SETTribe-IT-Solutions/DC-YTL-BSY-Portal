
<!DOCTYPE html>
<html lang="mr">
<head>
    <?php include('include/connection.php') ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>लॉगिन | जिल्हा परिषद, ठाणे</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
 h1 {
            color: red;
            text-align: center;
            margin-top: 50px;
            font-size: 40px;
        }
  </style>
</head>
<body>

  <?php include('include/header_1.php'); ?>

<!-- Login Section -->
<div class="card-body">
                        
                        <h1 style="color:red"><b>स्क्रूटिनी (Level 1)</b></h1>
            <div class="table-responsive"> <!-- Responsive wrapper -->
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-dark">
                          <tr>
                            <th>SR. NO</th>
                            <th>संगोपनकर्त्याचे संपूर्ण नाव</th>
                            <th>लाभार्थ्याचे संपूर्ण नाव</th>
                            <th>जन्म तारीख</th>
                            <th>अधिवास</th>
                            <th>शिक्षण (बोनाफाईड प्रमाणपत्र)</th>
                            <th>व्यवसाय (पुरावा सादर करावा)</th>
                            <th>उत्पन्नाचे साधन</th>
                            <th>मासिक उत्पन्न</th>
                            <th>बँक खात्याची तपशील</th>
                            <th>बँकेचे नाव</th>
                            <th>खाते क्रमांक:</th>
                            <th>IFSC क्रमांक</th>
                            <th>घरचा पत्ता</th>
                            <th>कायमचा पत्ता</th>
                            <th>मोबाइल नंबर</th>
                            <th>कार्यालयाचा पत्ता</th>
                            <th>विवाह केव्हा झाला?</th>
                            <th>झालेल्या बालकांची संख्या</th>
                            <th>ह्यात पत्नी संख्या - एक / दोन</th>
                            <th>प्रमाणपत्र सादर करावे</th>
                            <th>Action</th>
                           
                          </tr>
                        </thead>

        <tbody>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <?php
      $sr = 1;
      $query = mysqli_query($conn, "SELECT * FROM balsangopan_form") or die($conn->error);
      while ($fetch = mysqli_fetch_assoc($query)) {

        ?>
        <td><?php echo $sr++; ?></td>
         <td><?php echo $fetch['sangopankartyache_name']; ?></td>
      
             <td><?php echo $fetch['labhartyanche_name']; ?></td>
             <td><?php echo $fetch['date_of_birth']; ?></td>
               <td><?php echo $fetch['adhivas']; ?></td>
                 <td><?php echo $fetch['shikshan']; ?></td>
             <td><?php echo $fetch['bussiness']; ?></td>
               <td><?php echo $fetch['utpanache_sadhan']; ?></td>
                    <td><?php echo $fetch['masik_utpann']; ?></td>
                    <td><?php echo $fetch['bank_info'] ?></td>
                    <td><?php echo $fetch['bank_name']; ?></td>
                    <td><?php echo $fetch['account_number']; ?></td>
                    <td><?php echo $fetch['ifsc_code']; ?></td>
             <td><?php echo $fetch['home_address']; ?></td>
             <td><?php echo $fetch['address2']; ?></td>
             <td><?php echo $fetch['mobile_number']; ?></td>
              <td><?php echo $fetch['office_address']; ?></td>
              <td><?php echo $fetch['marrige_info'] ?></td>
              <td><?php echo $fetch['child_info'] ?></td>
              <td><?php echo $fetch['wife_count'] ?></td>
              <td><?php echo $fetch['document'] ?></td>


             <td>
                <a href="approve.php?id=<?php echo $fetch['id']; ?>" class="btn btn-success btn-sm">मंजूर करा</a>
    <a href="reject.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-sm">नकार द्या</a>
             </td>
              
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
                    </div>
</div>

<?php include('include/footer_1.php'); ?>

</body>
</html>
