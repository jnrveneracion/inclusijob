<?php 
     $dateAppliedRow = date("m/d/Y", strtotime($row['applied_date']));
     $dateUnderReviewRow = date("m/d/Y", strtotime($row['under_review_date']));
     $dateShortlistedRow = date("m/d/Y", strtotime($row['shortlisted_date']));
     $dateInterviewRow = date("m/d/Y", strtotime($row['interview_date']));
     $dateRejectedRow = date("m/d/Y", strtotime($row['rejected_date']));
     $dateHiredRow = date("m/d/Y", strtotime($row['hired_date']));
     $dateWithdrawJobRow = date("m/d/Y", strtotime($row['withdraw_job_date']));

     $modalAttributeData = "
          applied-date='". $dateAppliedRow ."'

          company-name='". $row['company_name'] ."'

     ";


?>



these are the rows i needed to be on the attribute
job_title job_description qualifications job_location employment_type compensation compensation_frequency start_compensation end_compensation application_deadline benefits

company_name industry_sector company_size founded_year company_address company_description company_culture contact_persons_name contact_persons_position contact_persons_contact_no company_website company_facebook company_linkedin company_twitter email
