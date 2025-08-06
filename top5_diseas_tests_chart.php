<?php
include('include/connection.php');

$unit = isset($_REQUEST['unit']) ? mysqli_real_escape_string($conn, $_REQUEST['unit']) : '';
$register = isset($_REQUEST['register']) ? $_REQUEST['register'] : '';

$filter = "WHERE Diseases != ''";
if ($unit != '') {
    $filter .= " AND teamId = '$unit'";
}

$data = [];

if ($register == 'opdRegister') {
    $query = "SELECT Diseases as test_type FROM opdRegister $filter";
} elseif ($register == 'ancpncRegi') {
    $query = "SELECT Diseases FROM ancpncRegi $filter";
} elseif ($register == 'childRegister') {
    $query = "SELECT Diseases FROM childRegister $filter";
} else {
    // No register selected — use all 3
    $query = "
        SELECT Diseases as test_type FROM opdRegister $filter
        UNION ALL
        SELECT Diseases FROM ancpncRegi $filter
        UNION ALL
        SELECT Diseases FROM childRegister $filter
    ";
}

// Final grouping
$result = mysqli_query($conn, "
    SELECT test_type, COUNT(*) as count FROM (
        $query
    ) as all_tests
    GROUP BY test_type
    ORDER BY count DESC
    LIMIT 5
");

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
    chart.title("Top 5 Most Prescribed Disease Tests");
    chart.labels().position("outside");
    chart.legend().title().enabled(true).text("Diseases").padding([0, 0, 10, 0]);
    chart.legend().position("right");
    chart.legend().itemsLayout("vertical");
    chart.tooltip().format("{%x}: {%value} cases");

    chart.container('labTestPieChart');
    chart.draw();
  });
</script>
