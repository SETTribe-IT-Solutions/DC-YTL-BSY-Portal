<?php
include('include/connection.php');


$filter = "where id!=''";

if($_REQUEST['unit']!=""){
  $filter .= " AND teamId='{$_REQUEST['unit']}'";
}

if($_REQUEST['register']!=""){
  $filter .= " AND tableName='{$_REQUEST['register']}'";
}

$data = [];
$query = "SELECT test_type, COUNT(*) as count FROM labtests $filter GROUP BY test_type ORDER BY count DESC LIMIT 5";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = ["x" => $row['test_type'], "value" => (int)$row['count']];
}
?>

<div id="labTestPieChart" style="width: 100%; height: 500px;"></div>

<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script>
  anychart.onDocumentReady(function () {
    var data = <?php echo json_encode($data); ?>;

    var chart = anychart.pie();

    chart.data(data);
    chart.title("Top 5 Most Performed Lab Tests");

    // Labels and formatting
    chart.labels().position("outside");
    chart.legend().title().enabled(true).text("Lab Tests").padding([0, 0, 10, 0]);
    chart.legend().position("right");
    chart.legend().itemsLayout("vertical");
    chart.tooltip().format("{%x}: {%value} tests");

    chart.container('labTestPieChart');
    chart.draw();
  });
</script>
