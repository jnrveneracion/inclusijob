<?php
include 'database/conn.php';

// Write the SQL query to retrieve job title data
$sql = "SELECT job_title, COUNT(job_title) AS job_title_count FROM JOB_LISTING GROUP BY job_title ORDER BY job_title_count DESC LIMIT 3;";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Process the data to create a chart
    $labels = array();
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Assuming job_title is the field name for job titles
        array_push($labels, $row['job_title']);
        array_push($data, $row['job_title_count']);
    }

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);
?>
<!-- HTML and JavaScript part -->
<div style='padding: 20px;'>
    <canvas id='job-title-chart'></canvas>
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
    <script>
        Chart.defaults.plugins.legend.display = true;
        Chart.defaults.plugins.tooltip.enabled = true;
        Chart.defaults.font.size = 15;

        var ctx = document.getElementById('job-title-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        '#007BFF',
                        '#007BFF',
                        '#007BFF',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // Add any additional options here
            }
        });
    </script>
</div>
<?php
} else {
    // If there are no results, show an error message
    echo "No results found";
}
?>
