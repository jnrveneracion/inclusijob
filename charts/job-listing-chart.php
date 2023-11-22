<?php
include 'database/conn.php';

// Write the SQL query to retrieve job listing data by date
$sql = "SELECT DATE_FORMAT(date_added, '%Y-%m-%d') AS date_formatted, COUNT(*) AS total_job_listed FROM JOB_LISTING GROUP BY DATE_FORMAT(date_added, '%Y-%m-%d');";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
     // Process the data to create a chart
     $labels = array();
     $data = array();
     $cumulativeCount = 0; 

     while ($row = mysqli_fetch_assoc($result)) {
          $formattedDate = date('F j', strtotime($row['date_formatted']));
          array_push($labels, $formattedDate);
          $cumulativeCount += $row['total_job_listed'];
          array_push($data, $cumulativeCount);
     }

     // Close the result set
     mysqli_free_result($result);

     // Close the database connection
     mysqli_close($conn);

     // Display the chart using Chart.js
     echo "<div style='padding: 20px;'>";
     echo "<canvas id='job-listing-chart'></canvas>";
     echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
     echo "<script>";
     echo "Chart.defaults.plugins.legend.display = false;";
     echo "Chart.defaults.plugins.tooltip.enabled = true;";
     echo "Chart.defaults.font.size = 15;";
     echo "var ctx = document.getElementById('job-listing-chart').getContext('2d');";
     echo "var chart = new Chart(ctx, {";
     echo "    type: 'line',";
     echo "    data: {";
     echo "        labels: " . json_encode($labels) . ",";
     echo "        datasets: [{";
     echo "            label: 'Total job listed',";
     echo "            data: " . json_encode($data) . ",";
     echo "            backgroundColor: 'color(srgb 0.0237 0.23 0.475)',";
     echo "            pointRadius: 10,";
     echo "            borderColor: '#2184f7',";
     echo "            tension: 0.1,";
     echo "            borderWidth: 5";
     echo "        }]";
     echo "    },";
     echo "    options: {";
     echo "        scales: {";
     echo "            x: {";
     echo "                grid: {";
     echo "                    display: true,";
     echo "                }";
     echo "            },";
     echo "            y: {";
     echo "                display: false,";
     echo "                beginAtZero: true";
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