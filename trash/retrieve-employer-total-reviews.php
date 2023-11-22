

<?php
session_start();

include "../database/conn.php";
$company_ID = $_GET['c'];

// Create a prepared statement to select data
$query = "SELECT
               ROUND(AVG(star_review_1), 2) AS star_review_1_average,
               ROUND(AVG(star_review_2), 2) AS star_review_2_average,
               ROUND(AVG(star_review_3), 2) AS star_review_3_average,
               ROUND(AVG(star_review_4), 2) AS star_review_4_average,
               ROUND(AVG(star_review_5), 2) AS star_review_5_average,
               ROUND(AVG(star_review_6), 2) AS star_review_6_average,
               ROUND(AVG(star_review_7), 2) AS star_review_7_average,
               ROUND(AVG(CASE WHEN recommend = 'yes' THEN 1 ELSE 0 END), 2) AS recommend_average,
               ROUND(AVG(CASE WHEN salary = 'High' THEN 1
                    WHEN salary = 'Average' THEN 2
                    WHEN salary = 'Low' THEN 3
                    ELSE 0 END), 2) AS salary_average,
               COUNT(*) AS total_review,
               COUNT(CASE WHEN star_review_1 = 1 THEN 1 END) AS count_1_star_review,
               COUNT(CASE WHEN star_review_2 = 2 THEN 1 END) AS count_2_star_review,
               COUNT(CASE WHEN star_review_3 = 3 THEN 1 END) AS count_3_star_review,
               COUNT(CASE WHEN star_review_4 = 4 THEN 1 END) AS count_4_star_review,
               COUNT(CASE WHEN star_review_5 = 5 THEN 1 END) AS count_5_star_review,
               COUNT(CASE WHEN recommend = 'yes' THEN 1 END) AS count_recommend_yes,
               COUNT(CASE WHEN recommend = 'no' THEN 1 END) AS count_recommend_no,
               COUNT(CASE WHEN salary = 'High' THEN 1 END) AS count_salary_high,
               COUNT(CASE WHEN salary = 'Average' THEN 1 END) AS count_salary_average,
               COUNT(CASE WHEN salary = 'Low' THEN 1 END) AS count_salary_low,
               COUNT(CASE WHEN star_review_7 = 1 THEN 1 END) AS count_7_star_review_1,
               COUNT(CASE WHEN star_review_7 = 2 THEN 1 END) AS count_7_star_review_2,
               COUNT(CASE WHEN star_review_7 = 3 THEN 1 END) AS count_7_star_review_3,
               COUNT(CASE WHEN star_review_7 = 4 THEN 1 END) AS count_7_star_review_4,
               COUNT(CASE WHEN star_review_7 = 5 THEN 1 END) AS count_7_star_review_5,
               COUNT(CASE WHEN salary = 'High' THEN 1 END) AS count_salary_review_high,
               COUNT(CASE WHEN salary = 'Average' THEN 1 END) AS count_salary_review_average,
               COUNT(CASE WHEN salary = 'Low' THEN 1 END) AS count_salary_review_low,
               COUNT(CASE WHEN recommend = 'yes' THEN 1 END) AS count_recommend_yes,
               COUNT(CASE WHEN recommend = 'no' THEN 1 END) AS count_recommend_no
          FROM JOB_SEEKER_WORK_REVIEW
          WHERE company_ID = ?;";

$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
    echo "Error: " . mysqli_error($conn);
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $company_ID);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the row from the result
        $row = mysqli_fetch_assoc($result);

        $total_review = $row['total_review'];
        $star_review_1_average = $row['star_review_1_average'];
        $star_review_2_average = $row['star_review_2_average'];
        $star_review_7_average = $row['star_review_7_average'];

        $count_1_star_review = $row['count_1_star_review'];
        $count_2_star_review = $row['count_2_star_review'];
        $count_7_star_review_1 = $row['count_7_star_review_1'];
        $count_7_star_review_2 = $row['count_7_star_review_2'];
        $count_7_star_review_3 = $row['count_7_star_review_3'];
        $count_7_star_review_4 = $row['count_7_star_review_4'];
        $count_7_star_review_5 = $row['count_7_star_review_5'];

        $percentage7_1 = $count_7_star_review_1 / $total_review * 100;
        $percentage7_2 = $count_7_star_review_2 / $total_review * 100;
        $percentage7_3 = $count_7_star_review_3 / $total_review * 100;
        $percentage7_4 = $count_7_star_review_4 / $total_review * 100;
        $percentage7_5 = $count_7_star_review_5 / $total_review * 100;

        $count_salary_review_high = $row['count_salary_review_high'];
        $count_salary_review_average = $row['count_salary_review_average'];
        $count_salary_review_low = $row['count_salary_review_low'];

        $count_recommend_yes = $row['count_recommend_yes'];
        $count_recommend_no = $row['count_recommend_no'];

        // Find the category with the highest count
        $maxCount = max($count_salary_review_high, $count_salary_review_average, $count_salary_review_low);
        $maxCountRecommend = max($count_recommend_yes, $count_recommend_no);

        // Calculate the average salary review based on the category with the highest count
        $averageSalaryReview = 0; // Default value if all counts are zero
        $averageRecommendReview = 0; // Default value if all counts are zero

        if ($maxCount > 0) {
            if ($maxCount === $count_salary_review_high) {
                $averageSalaryReview = 'High';
                $percentageSalaryReview = round($count_salary_review_high / $total_review * 100, 2);
                $percentageSalaryReviewSVG = round($count_salary_review_high / $total_review * 100);
            } elseif ($maxCount === $count_salary_review_average) {
                $averageSalaryReview = 'Average'; // Set the average to 'Average' if it has the highest count
                $percentageSalaryReview = round($count_salary_review_average / $total_review * 100, 2);
                $percentageSalaryReviewSVG = round($count_salary_review_average / $total_review * 100);
            } elseif ($maxCount === $count_salary_review_low) {
                $averageSalaryReview = 'Low'; // Set the average to 'Low' if it has the highest count
                $percentageSalaryReview = round($count_salary_review_low / $total_review * 100, 2);
                $percentageSalaryReviewSVG = round($count_salary_review_low / $total_review * 100);
            }
        }

        if ($maxCountRecommend > 0) {
            if ($maxCountRecommend === $count_recommend_yes) {
                $averageRecommendReview = 'recommend';
                $percentageRecommendReview = round($count_recommend_yes / $total_review * 100);
            } elseif ($maxCountRecommend === $count_recommend_no) {
                $averageRecommendReview = 'not recommend';
                $percentageRecommendReview = round($count_recommend_no / $total_review * 100);
            }
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
