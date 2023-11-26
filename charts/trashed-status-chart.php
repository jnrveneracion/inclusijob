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

// Write the SQL query
$sql = "SELECT
            EMPLOYER_SIGNUP_INFO.company_name,
            COUNT(*) AS total_applicants,
            COUNT(CASE WHEN j.trash = 1 THEN j.employer_id END) AS total_companies_with_trashed_listings,
            COUNT(CASE WHEN j.trash = 0 THEN j.employer_id END) AS total_companies_with_active_listings
        FROM EMPLOYER_SIGNUP_INFO
        LEFT JOIN JOB_LISTING j ON EMPLOYER_SIGNUP_INFO.company_ID = j.employer_id
        GROUP BY j.employer_id;";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Process the data to create a radar chart
    $labels = array();
    $company_name= array();
    $dataTrashed = array();
    $dataActive = array();
    $count = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        // Truncate company names to a maximum of 20 characters for the chart
        $truncatedName = strlen($row['company_name']) > 20 ? substr($row['company_name'], 0, 20) . '...' : $row['company_name'];

        $company_name_row = $row['company_name'];
        // Use full company names in the table
        array_push($labels, $truncatedName);
        array_push($company_name, $company_name_row);
        array_push($dataTrashed, $row['total_companies_with_trashed_listings']);
        array_push($dataActive, $row['total_companies_with_active_listings']);
    }

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    // HTML and JavaScript part
    ?>
    <div style='max-width: 1000px;'>
        <div style='padding: 20px; margin-bottom: 20px;'>
            <canvas class="fs-3" id='radar-chart'></canvas>
        </div>

        <table class="table" style="margin-top: -90px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Total Active Listings</th>
                    <th>Total Trashed Listings</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labels as $key => $label) { ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $company_name[$key]; ?></td>
                        <td><?php echo $dataActive[$key]; ?></td>
                        <td><?php echo $dataTrashed[$key]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <script>
            Chart.defaults.plugins.legend.display = true;
            Chart.defaults.plugins.tooltip.enabled = true;
            Chart.defaults.font.size = 15;

            var colors = <?php echo json_encode($colors); ?>;
            var ctx = document.getElementById('radar-chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [
                        {
                            label: 'Trashed Listings',
                            data: <?php echo json_encode($dataTrashed); ?>,
                            borderWidth: 1,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        },
                        {
                            label: 'Active Listings',
                            data: <?php echo json_encode($dataActive); ?>,
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            pointLabels: {
                                font: {
                                    size: 14, // Adjust the font size for the labels
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Radar Chart - Companies with Trashed and Active Listings'
                        }
                    },
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
