<?php
include 'database/conn.php';

// Defined colors
$colors = array(
    '#005aa380',
    '#0066b880',
    '#0072cd80',
    '#007bff80',
    '#1d8cff80',
    '#3399ff80',
    '#4eb2ff80'
);

// Write the SQL query to retrieve job title data
$sql = "SELECT employment_type, COUNT(employment_type) AS employment_type_count FROM JOB_LISTING GROUP BY employment_type;";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Process the data to create a chart
    $labels = array();
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Assuming job_title is the field name for job titles
        array_push($labels, $row['employment_type']);
        array_push($data, $row['employment_type_count']);
    }

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    // HTML and JavaScript part
    ?>
    <div style='padding: 20px; width: 400px; margin-top: 35px;'>
        <canvas id='job-type-chart'></canvas>
        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <script>
            Chart.defaults.plugins.legend.display = true;
            Chart.defaults.plugins.tooltip.enabled = true;
            Chart.defaults.font.size = 12;

            var colors = <?php echo json_encode($colors); ?>;
            var ctx = document.getElementById('job-type-chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            pointLabels: {
                                display: true,
                                centerPointLabels: true,
                                font: {
                                    size: 14,
                                    weight: 500
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: false,
                            text: 'Chart.js Polar Area Chart With Centered Point Labels'
                        }
                    }
                },
            });
        </script>
    </div>
    <?php
} else {
    // If there are no results, show an error message
    echo "No results found";
}
?>
