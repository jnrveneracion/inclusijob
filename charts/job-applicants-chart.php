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

// Defined colors
$borderColors = array(
     'rgba(255, 99, 132, 1)',
     'rgba(255, 159, 64, 1)',
     'rgba(255, 205, 86, 1)',
     'rgba(75, 192, 192, 1)',
     'rgba(54, 162, 235, 1)',
     'rgba(153, 102, 255, 1)',
     'rgba(201, 203, 207, 1)'
);

// Write the SQL query
$sql = "SELECT SUM(applied) AS total_applied,
               SUM(under_review) AS total_under_review,
               SUM(shortlisted) AS total_shortlisted,
               SUM(interview) AS total_interview,
               SUM(rejected) AS total_rejected,
               SUM(hired) AS total_hired
        FROM JOB_APPLICATION_STATUS;";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
     // Process the data
     $labels = array('Applied', 'Under Review', 'Shortlisted', 'Interview', 'Rejected', 'Hired');
     $data = array();

     // Fetch the result as an associative array
     $row = mysqli_fetch_assoc($result);

     // Populate the data array
     $data[] = $row['total_applied'];
     $data[] = $row['total_under_review'];
     $data[] = $row['total_shortlisted'];
     $data[] = $row['total_interview'];
     $data[] = $row['total_rejected'];
     $data[] = $row['total_hired'];

     // Close the result set
     mysqli_free_result($result);

     // Close the database connection
     mysqli_close($conn);

     // HTML and JavaScript part
     ?>
     <div style='max-width: 800px;'>
          <div style='padding: 20px; margin-bottom: 20px;'>
               <canvas class="fs-3" id='bar-chart'></canvas>
          </div>

          <table class="table" style="margin-top: 0px;">
               <thead>
                    <tr>
                         <th>Status</th>
                         <th>Total Count</th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($labels as $key => $label) { ?>
                         <tr>
                              <td><?php echo $label; ?></td>
                              <td><?php echo $data[$key]; ?></td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>

          <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
          <script>
               Chart.defaults.plugins.legend.display = false;
               Chart.defaults.plugins.tooltip.enabled = true;
               Chart.defaults.font.size = 15;

               var colors = <?php echo json_encode($colors); ?>;
               var ctx = document.getElementById('bar-chart').getContext('2d');
               var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                         labels: <?php echo json_encode($labels); ?>,
                         datasets: [
                              {
                                   label: 'Job Application Status',
                                   data: <?php echo json_encode($data); ?>,
                                   backgroundColor: colors,
                                   borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255, 205, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(201, 203, 207, 1)'
                                   ],
                                   borderWidth: 2
                              }
                         ]
                    },
                    options: {
                         responsive: true,
                         scales: {
                              y: {
                                   beginAtZero: true
                              }
                         },
                         plugins: {
                              legend: {
                                   position: 'top',
                              },
                              title: {
                                   display: true,
                                   text: 'Bar Chart - Job Application Status'
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