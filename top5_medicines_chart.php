<?php
include 'include/connection.php';


$filter = "where d.id!=''";

if($_REQUEST['unit']!=""){
  $filter .= " AND d.teamId='{$_REQUEST['unit']}'";
}

if($_REQUEST['register']!=""){
  $filter .= " AND d.tableName='{$_REQUEST['register']}'";
}
// Fetch top 5 medicines by distributed quantity

$query = "SELECT m.medicineId, m.medicine, SUM(d.quantity) AS total_distributed
          FROM medicine m
          JOIN medicineDistribution d ON m.medicineId = d.medicine $filter
          GROUP BY m.medicineId
          ORDER BY total_distributed DESC
          LIMIT 5";

$result = mysqli_query($conn, $query);

$colors = ['#FF6F61', '#6B5B95', '#88B04B', '#F7CAC9', '#92A8D1']; // 5 unique colors

$data = [];
$index = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        "x" => $row['medicine'],
        "value" => (int)$row['total_distributed'],
        "fill" => $colors[$index % count($colors)]
    ];
    $index++;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Top 5 Distributed Medicines</title>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet">
  <style>
    html, body, #container {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>

<div id="container"></div>

<script>
  anychart.onDocumentReady(function () {
    var data = <?php echo json_encode($data); ?>;

    var chart = anychart.column();

    chart.animation(true);
    chart.title("Top 5 Most Distributed Medicines");

    var series = chart.column(data);

    // 👇 Show medicine name above the bars
    series.labels(true);
    series.labels()
      .enabled(true)
      .position("center-top")   // position label above bar
      .anchor("center-bottom")
      .offsetY(10)              // adjust spacing from top of bar
      .fontSize(12)
      .fontColor("#000")        // dark text
      .format('{%X}');          // show medicine name

    // Tooltip setup
    series.tooltip().titleFormat('{%X}');
    series.tooltip()
      .position('center-top')
      .anchor('center-bottom')
      .offsetX(0)
      .offsetY(5)
      .format('{%Value} units');

    chart.yScale().minimum(0);
    chart.yAxis().labels().format('{%Value}');
    chart.xAxis().title('Medicine');
    chart.yAxis().title('Quantity Distributed');
    chart.interactivity().hoverMode('by-x');
    chart.tooltip().positionMode('point');

    chart.container('container');
    chart.draw();
  });
</script>


</body>
</html>
