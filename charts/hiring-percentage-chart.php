<?php
include 'database/conn.php';

// Defined colors
$colors = array(
    'rgba(255, 99, 132, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(255, 205, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(201, 203, 207, 0.2)'
);

// Write the SQL query
$sql = "SELECT
            JOB_LISTING.job_title,
            COUNT(*) AS total_applicants
        FROM JOB_APPLICATION_STATUS
        JOIN JOB_LISTING ON JOB_LISTING.job_id = JOB_APPLICATION_STATUS.job_id
        GROUP BY JOB_LISTING.job_id;";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Process the data to create a polar area chart
    $labels = array();
    $dataTotalApplicants = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($labels, $row['job_title']);
        array_push($dataTotalApplicants, $row['total_applicants']);
    }

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    // HTML and JavaScript part
    ?>
    <div style='padding: 20px; max-width: 1000px;'>
        <canvas class="fs-3" id='polararea-chart'></canvas>
        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <script>
            Chart.defaults.plugins.legend.display = true;
            Chart.defaults.plugins.tooltip.enabled = true;
            Chart.defaults.font.size = 15;

            var colors = <?php echo json_encode($colors); ?>;
            var ctx = document.getElementById('polararea-chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        data: <?php echo json_encode($dataTotalApplicants); ?>,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Polar Area Chart - Total Applicants by Job Title'
                        }
                    },
                },
            });
        </script>
    </div>

    <!-- Table Section -->
    <div style='max-width: 1000px; margin-top: 0px;'>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>Total Applicants</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labels as $key => $label) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $label; ?></td>
                        <td><?php echo $dataTotalApplicants[$key]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    // If there are no results, show an error message
    echo "No results found";
}
?>
