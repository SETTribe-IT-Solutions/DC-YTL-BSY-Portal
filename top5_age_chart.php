<?php
include('include/connection.php');

$unit = isset($_GET['unit']) ? mysqli_real_escape_string($conn, $_GET['unit']) : '';
$register = isset($_GET['register']) ? $_GET['register'] : '';

$filter = "WHERE age != ''";
if ($unit != '') {
  $filter .= " AND teamId = '$unit'";
}

if (!in_array($register, ['opdRegister', 'ancpncRegi', 'childRegister'])) {
  $register = ''; // fallback to union of all
}

if ($register != '') {
  $query = "SELECT age FROM $register $filter";
} else {
  $query = "
    SELECT age FROM opdRegister $filter
    UNION ALL
    SELECT age FROM ancpncRegi $filter
    UNION ALL
    SELECT age FROM childRegister $filter
  ";
}

$result = mysqli_query($conn, "
  SELECT age, COUNT(*) as count FROM (
    $query
  ) as all_ages
  GROUP BY age
  ORDER BY count DESC
  LIMIT 5
");

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = ["x" => $row['age'], "value" => (int)$row['count']];
}
?>

<div id="topAgesBarChart" style="width: 100%; height: 500px;"></div>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script>
  anychart.onDocumentReady(function () {
    var data = <?php echo json_encode($data); ?>;
    var chart = anychart.bar();

    chart.data(data);
    chart.title("Top 5 Most Frequent Ages");
    chart.xAxis().title("Age");
    chart.yAxis().title("Patient Count");
    chart.tooltip().format("{%x} years: {%value} patients");

    chart.container("topAgesBarChart");
    chart.draw();
  });
</script>
