<?php
include '../database/conn.php';

// SQL queries for each status
$queryUnderReview = "SELECT DATE_FORMAT(under_review_date, '%Y-%m-%d') AS date_formatted, COUNT(*) AS under_review_count FROM JOB_APPLICATION_STATUS WHERE under_review = 1 GROUP BY DATE_FORMAT(under_review_date, '%Y-%m-%d')";
$queryScheduledInterview = "SELECT DATE_FORMAT(interview_date, '%Y-%m-%d') AS date_formatted, COUNT(*) AS scheduled_interview_count FROM JOB_APPLICATION_STATUS WHERE interview = 1 GROUP BY DATE_FORMAT(interview_date, '%Y-%m-%d')";
$queryHired = "SELECT DATE_FORMAT(hired_date, '%Y-%m-%d') AS date_formatted, COUNT(*) AS hired_count FROM JOB_APPLICATION_STATUS WHERE hired = 1 GROUP BY DATE_FORMAT(hired_date, '%Y-%m-%d')";

// Execute the queries
$resultUnderReview = mysqli_query($conn, $queryUnderReview);
$resultScheduledInterview = mysqli_query($conn, $queryScheduledInterview);
$resultHired = mysqli_query($conn, $queryHired);

// Check if there are any results for all three queries
if (mysqli_num_rows($resultUnderReview) > 0 || mysqli_num_rows($resultScheduledInterview) > 0 || mysqli_num_rows($resultHired) > 0) {
    // Process the data to create a chart
    $labels = array();
    $dataUnderReview = array();
    $dataScheduledInterview = array();
    $dataHired = array();

    // Process Under Review data
    while ($row = mysqli_fetch_assoc($resultUnderReview)) {
        $labels[] = $row['date_formatted'];
        array_push($dataUnderReview, $row['under_review_count']);
    }

    // Process Scheduled Interview data
    while ($row = mysqli_fetch_assoc($resultScheduledInterview)) {
        $labels[] = $row['date_formatted'];
        array_push($dataScheduledInterview, $row['scheduled_interview_count']);
    }

    // Process Hired data
    while ($row = mysqli_fetch_assoc($resultHired)) {
        $labels[] = $row['date_formatted'];
        array_push($dataHired, $row['hired_count']);
    }

    // Close the result sets
    mysqli_free_result($resultUnderReview);
    mysqli_free_result($resultScheduledInterview);
    mysqli_free_result($resultHired);

    // Close the database connection
    mysqli_close($conn);

   // Display the chart using Chart.js
echo "<div style='padding: 20px;'>";
echo "<canvas id='status-chart'></canvas>";
echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
echo "<script>";
echo "Chart.defaults.plugins.legend.display = true;";
echo "Chart.defaults.plugins.tooltip.enabled = true;";
echo "Chart.defaults.font.size = 15;";
echo "var ctx = document.getElementById('status-chart').getContext('2d');";
echo "var chart = new Chart(ctx, {";
echo "    type: 'line',";
echo "    data: {";
echo "        labels: " . json_encode($labels) . ",";
echo "        datasets: [";
echo "            {";
echo "                label: 'Under Review',";
echo "                data: " . json_encode($dataUnderReview) . ",";
echo "                borderColor: 'blue',";
echo "                borderWidth: 2,";
echo "                fill: false,";
echo "                tension: 0.1,";
echo "            },";
echo "            {";
echo "                label: 'Scheduled Interview',";
echo "                data: " . json_encode($dataScheduledInterview) . ",";
echo "                borderColor: 'green',";
echo "                borderWidth: 2,";
echo "            },";
echo "            {";
echo "                label: 'Hired',";
echo "                data: " . json_encode($dataHired) . ",";
echo "                borderColor: 'red',";
echo "                borderWidth: 2,";
echo "            }";
echo "        ]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
echo "                beginAtZero: false,";
echo "                min: 1,";
echo "                stepSize: 1,";
echo "                precision: 0,";
echo "            }";
echo "        }";
echo "    }";
echo "});";
echo "</script>";
echo "</div>";


} else {
    // If there are no results, show an error message
    echo "No results found";
}
?>
