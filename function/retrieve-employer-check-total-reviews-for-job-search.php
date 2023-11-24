<?php
session_start();
include "../database/conn.php";

$query = "SELECT
          EMPLOYER_SIGNUP_INFO.company_name,
          EMPLOYER_SIGNUP_INFO.company_ID,
          COUNT(*) AS total_review,
          ROUND(AVG(star_review_7), 1) AS star_review_7_average,
          ROUND(AVG(star_review_7), 1) AS star_review_7_average2,
          ROUND(AVG(star_review_1), 1) AS star_review_1_average
          FROM
          EMPLOYER_SIGNUP_INFO
          LEFT JOIN JOB_SEEKER_WORK_REVIEW ON EMPLOYER_SIGNUP_INFO.company_ID = JOB_SEEKER_WORK_REVIEW.company_ID
          GROUP BY
          EMPLOYER_SIGNUP_INFO.company_ID;";

$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
     echo "Error: " . mysqli_error($conn);
} else {

     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);

          // Check if there are records
          if (mysqli_num_rows($result) > 0) {
               $count = 1;
               while ($row = mysqli_fetch_assoc($result)) {
                    $showNoReviews = (empty($row['star_review_1_average'])) ? "d-block" : "d-none";
                    $showReviews = ($row['star_review_7_average'] != NULL) ? "d-block" : "d-none";                    

                    $companyName = $row['company_name'];
                    $companyID = $row['company_ID'];
                    $companyID2 = $row['company_ID'];
                    $companyIDNoHyphen = str_replace('-', '', $companyID);
                    $companyIDNoHyphen2 = str_replace('-', '', $companyID2);
                    // $total_review = $row['total_review'];
                    $star_review_7_average = $row['star_review_7_average'];
                    $star_review_7_average2 = ($row['star_review_7_average2'] > 0) ? $row['star_review_7_average2'] : "0";
                    $total_review = ($row['total_review'] > 0 && !empty($row['star_review_7_average'])) ? $row['total_review'] : "0";
                    
                    echo '
                    <div id="' . $companyIDNoHyphen . 'reviews" class="d-none">
                         <div class="review' . $count . ' bordered-reviews d-flex align-items-center mb-1 fill-stars" count-star="' .  $star_review_7_average . '">
                              <!-- Add your star icons here with unique IDs -->
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                         </div>
                         <div style="color: rgb(159, 159, 159); font-size: 14px;">
                              <p class="m-0 d-flex ms-1">
                                   <span id="review-total">' .  $star_review_7_average . '&nbsp;</span>
                                   <span class="' . $showReviews . '">(' . $total_review . ')</span>
                                   <span class="' . $showNoReviews . '">(0)</span>
                              </p>
                         </div>
                    </div>';

                    echo '
                    <div id="' . $companyIDNoHyphen2 . 'reviews2" class="d-block">
                         <div class="review' . $count . '2 bordered-reviews d-flex align-items-center mb-1 fill-stars" count-star="' .  $star_review_7_average2 . '">
                              <!-- Add your star icons here with unique IDs -->
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                         </div>
                         <div style="color: rgb(159, 159, 159); font-size: 14px;">
                              <p class="m-0 d-flex ms-1">
                                   <span id="review-total2">' .  $star_review_7_average2 . '&nbsp;</span>
                                   <span class="' . $showReviews . '"> total rating from <a class="preview-profile-link" href="preview-company-profile.php?c=' . $row['company_ID'] . '#company-reviews">' . $total_review . ' reviews</a> </span>
                                   <span class="' . $showNoReviews . '">' . $total_review . ' currently no total rating available </span>
                              </p>
                         </div>
                    </div>
                    ';

                    echo '<script>
                              var classElements' . $count . ' = document.querySelectorAll("[class=\'' . $companyIDNoHyphen . 'reviews\']");
                         
                              if (classElements' . $count . '.length > 0) {
                                   var idElement' . $count . ' = document.getElementById("' . $companyIDNoHyphen . 'reviews");
                                   if (idElement' . $count . ' && classElements' . $count . ') {
                                        classElements' . $count . '.forEach(function (element) {
                                             element.innerHTML = idElement' . $count . '.innerHTML;
                                        });
                                   }
                              }

                              var classElements' . $count . '2 = document.querySelectorAll("[class=\'' . $row['company_ID'] . 'reviews2\']");

                              if (classElements' . $count . '2.length > 0) {
                                   var idElement' . $count . '2 = document.getElementById("' . $companyIDNoHyphen . 'reviews2");
                                   if (idElement' . $count . '2 && classElements' . $count . '2) {
                                        classElements' . $count . '2.forEach(function (element) {
                                             element.innerHTML = idElement' . $count . '2.innerHTML;
                                        });
                                   }
                              }

                              applyStarColor(".fill-stars");
                         </script>';


                    $count++;
               }
          } else {
               echo "<div class='d-flex justify-content-center mt-5'><div>0 Unprocessed Candidates</div></div>";
          }
     } else {
          echo "Error: " . mysqli_error($conn);
     }
}

// Close the prepared statement
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>