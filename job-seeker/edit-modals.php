<!-- image -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-image" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Upload Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/save-job-seeker-image.php'); ?>" enctype="multipart/form-data"  method="post" style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="" id="view-uploaded-image">
                                        <input type="file" id="image-upload" name="image" accept=".png, .jpg" style="display: none;" required>
                                        <div class="circle-section d-flex justify-content-center">
                                             <label for="image-upload" class="circle-image" style="width: 250px !important; height: 250px !important; border: 5px solid color(srgb 0.1277 0.5183 0.9668);">
                                                  <img id="selected-image">
                                             </label>
                                        </div>
                                   </div>
                              </div>     
                         </div>
                    </div>
                    <div class="mt-3 m-0 d-flex justify-content-center">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="upload-another" type="button">Choose</button>
                         <button id="submit-button" class="button m-1 submit-image-btn" type="submit" disabled>Upload</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<!-- personal Information -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-personal-info" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Personal Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/update-job-seeker-signup.php'); ?>"  method="post" class="was-validated" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3">
                                        <span class="input-group-text changeable-font-size speakable-text" id="basic-addon1"><span class="req-indicator">*</span>First name:</span>
                                        <input type="text" class="form-control changeable-font-size speakable-text" name="firstname" aria-label="firstname" aria-describedby="basic-addon1" value="<?= "$firstname" ?>" required>
                                        <div class="invalid-feedback changeable-font-size speakable-text">Please enter your first name.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Middle name:</span>
                                        <input type="text" class="form-control" aria-label="middlename" name="middlename" value="<?= "$middlename" ?>">
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Surname:</span>
                                        <input type="text" class="form-control" aria-label="lastname" name="lastname" aria-describedby="basic-addon1" value="<?= "$lastname" ?>" required>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text w-25" id="basic-addon1"><span class="req-indicator">*</span>Sex:</span>
                                        <div class="input-group-text w-75" style="background-color: transparent;">
                                        <label class="me-2 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="sex" value="Male" aria-label="Male" <?= $sex === "Male" ? 'checked' : '' ?> required>
                                             &nbsp;Male
                                        </label>
                                        <label class="ms-3 me-2 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="sex" value="Female" aria-label="Female" <?= $sex === "Female" ? 'checked' : '' ?> required>
                                             &nbsp;Female
                                        </label>
                                        </div>
                                   </div>
                                   <div class="mb-3">
                                        <span class="input-group-text" id="basic-addon1">Civil Status:</span>
                                        <div class="input-group-text" style="background-color: transparent; border: none;">
                                        <label class="me-1 ms-0 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="civil_status" value="Single" aria-label="Single" <?= $civil_status === "Single" ? 'checked' : '' ?>>
                                             &nbsp;Single
                                        </label>
                                        <label class="ms-1 me-1 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="civil_status" value="Married" aria-label="Married" <?= $civil_status === "Married" ? 'checked' : '' ?>>
                                             &nbsp;Married
                                        </label>
                                        <label class="ms-1 me-1 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="civil_status" value="Widowed" aria-label="Widowed" <?= $civil_status === "Widowed" ? 'checked' : '' ?>>
                                             &nbsp;Widowed
                                        </label>
                                        <label class="ms-1 me-1 d-flex align-items-center">
                                             <input class="form-check-input mt-0" type="radio" name="civil_status" value="Divorced" aria-label="Divorced" <?= $civil_status === "Divorced" ? 'checked' : '' ?>>
                                             &nbsp;Divorced
                                        </label>
                                        </div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Birthday:</span>
                                        <input type="date" class="form-control" name="birthday" id="birthday" aria-label="birthday" aria-describedby="basic-addon1" value="<?= "$birthday" ?>" required onkeydown="return false">
                                        <div class="invalid-feedback">Please enter your birthday.</div>
                                   </div>
                                   <div class="input-group mb-3 d-none">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Age:</span>
                                        <input type="number" class="form-control" name="age" aria-label="age" aria-describedby="basic-addon1" value="<?= "$age" ?>" required>
                                        <div class="invalid-feedback">Please enter your age.</div>
                                   </div>
                              </div>
                         </div>
                         <div class="">
                              <div class="">
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact no.:</span>
                                        <span class="input-group-text">+63</span>
                                        <input type="text" class="form-control" aria-label="contact_no" id="contact_no" name="contact_no" aria-describedby="basic-addon1" value="<?= "$contact_no" ?>" required oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)">
                                        <div class="invalid-feedback">Please enter your contact number.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text d-flex align-items-start"><span class="req-indicator">*</span>Address:</span>
                                        <textarea class="form-control" aria-label="address" name="address" style="height: 150px;" required><?= "$jobseeker_address" ?></textarea>
                                        <div class="invalid-feedback">Please enter your address.</div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>

          </div>
     </div>
</div>

<!-- objectives -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-objectives" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Personal Summary</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/update-job-seeker-objectives.php'); ?>"  method="post" class="<?= isset($jobseeker_objectives) ? "was-validated" : "needs-validation" ?>" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Personal Summary:</span>
                                        <textarea class="form-control" name="jobseeker_objectives" style="height: 500px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="With textarea"><?= "$jobseeker_objectives" ?></textarea>
                                        <div class="invalid-feedback">Please enter your job objectives.</div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>

          </div>
     </div>
</div>

<!-- education -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="add-education" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Education Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/save-job-seeker-education.php'); ?>"  method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Institution name:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="institution_name" aria-label="institution_name" aria-describedby="basic-addon1" value="<?= "$institution_name" ?>" required>
                                        <div class="invalid-feedback">Please enter your institution name.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>School Degree:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="school_degree" name="school_degree" value="<?= "$school_degree" ?>" list="degree-list" required>
                                        <datalist id="degree-list">
                                             <option value="Associate Degree (AA/AS)">
                                             <option value="Bachelor's Degree (BA/BS)">
                                             <option value="Master's Degree (MA/MS)">
                                             <option value="Doctoral Degree (Ph.D./Ed.D.)">
                                             <option value="Doctor of Medicine (MD)">
                                             <option value="Doctor of Dental Medicine (DMD) or Doctor of Dental Surgery (DDS)">
                                             <option value="Doctor of Jurisprudence (JD)">
                                             <option value="Doctor of Pharmacy (Pharm.D.)">
                                             <option value="Doctor of Veterinary Medicine (DVM)">
                                             <option value="Honorary Degrees">
                                             <option value="Online Degrees">
                                             <option value="Certificate/Diploma">
                                             <option value="Professional Degrees">
                                             <option value="Specialized Degrees">
                                        </datalist>
                                        <div class="invalid-feedback">Please enter your school degree.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Field of Study:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="field_of_study" name="field_of_study" aria-describedby="basic-addon1" value="<?= "$field_of_study" ?>" list="field-study-list">
                                       
                                        <div class="invalid-feedback">Please enter your field of study.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Start Year:</span>
                                        <select class="form-select" aria-label="start_year" name="start_year" aria-describedby="start-year-label" id="start_year_select_update">
                                             <option value="">Start Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = 1950; $year <= 2023; $year++) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Graduation Year:</span>
                                        <select class="form-select" aria-label="graduation_year" name="graduation_year" aria-describedby="start-year-label" id="graduation_year_select_update">
                                             <option value="">Graduation Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = $currentYear; $year >= 1950; $year--) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Course Highlights:</span>
                                        <textarea class="form-control" name="course_highlights" style="height: 250px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="With textarea"><?= "$course_highlights" ?></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>

          </div>
     </div>
</div>

<!-- update education -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-education" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Education Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/update-job-seeker-education.php'); ?>"  method="post" class="was-validated" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <input type="hidden" name="education_id" value="" id="education-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Institution name:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="institution_name" aria-label="institution_name" aria-describedby="basic-addon1" value="" required>
                                        <div class="invalid-feedback">Please enter your institution name.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>School Degree:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="school_degree" name="school_degree" value="" list="degree-list" required>
                                        
                                        <div class="invalid-feedback">Please enter your school degree.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Field of Study:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="field_of_study" name="field_of_study" aria-describedby="basic-addon1" value="" list="field-study-list">
                                        
                                        <div class="invalid-feedback">Please enter your field of study.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Start Year:</span>
                                        <select class="form-select" aria-label="start_year" name="start_year" aria-describedby="start-year-label" id="start_year_select">
                                             <option value="">Start Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = 1950; $year <= 2023; $year++) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Graduation Year:</span>
                                        <select class="form-select" aria-label="graduation_year" name="graduation_year" aria-describedby="start-year-label" id="graduation_year_select">
                                             <option value="">Graduation Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = $currentYear; $year >= 1950; $year--) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Course Highlights:</span>
                                        <textarea class="form-control" name="course_highlights" style="height: 250px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="With textarea"></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>

          </div>
     </div>
</div>

<!-- add skill -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="add-skill" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header pb-0">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Skill</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body pt-0">
          <p>Help employers find you by showcasing all of your skills.</p>
          <div>
               <form action="<?php echo htmlspecialchars('../function/save-job-seeker-skill.php'); ?>"  method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Skill name:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="skill_name" aria-label="institution_name" aria-describedby="basic-addon1" list="skill-list" required>
                                        <div class="invalid-feedback">Please enter skill name.</div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>

          </div>
     </div>
</div>

<!-- add career history -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="add-career" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Career History</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/save-job-seeker-career-history.php'); ?>"  method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text changeable-font-size speakable-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Job title:</span>
                                        <input list="job-titles" type="text" class="form-control changeable-font-size speakable-text" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="job_title" aria-label="job_title" aria-describedby="basic-addon1" required>
                                        <div class="invalid-feedback changeable-font-size speakable-text">Please add job title.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company name:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="school_degree" name="company_name" required>
                                        <div class="invalid-feedback">Please add company name.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Started:</span>
                                        <select class="form-select" aria-label="start_year" name="start_year" aria-describedby="start-year-label" id="start_year_select_career" required>
                                             <option value="">Start Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = 1950; $year <= 2023; $year++) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator" id="ended-year">*</span>Ended:</span>
                                        <select class="form-select" aria-label="end_year" name="end_year" aria-describedby="start-year-label" id="graduation_year_select_career" required>
                                             <option value="">End Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = $currentYear; $year >= 1950; $year--) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <div class="input-group-text">
                                             <input class="form-check-input mt-0 me-2" type="checkbox" name="still_in_role" value="1" aria-label="Checkbox for following text input" id="still_in_role_checkbox">
                                             <label class="form-check-label" for="flexCheckDefault">
                                                  Still in role
                                             </label>
                                        </div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Description: <span class="recom-indicator">(recommended)</span></span>
                                        <textarea class="form-control" placeholder="Summarise your responsibilities, skills and achievements." name="career_history_description" style="height: 250px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="With textarea"><?= "$course_highlights" ?></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<!-- update career history -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-career-history" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Update Career History</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/update-job-seeker-career-history.php'); ?>"  method="post" class="was-validated" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <input type="hidden" name="career_history_id" id="career-history-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Job title:</span>
                                        <input list="job-titles" type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="job_title" aria-label="job_title" aria-describedby="basic-addon1" required>
                                        <div class="invalid-feedback">Please add job title.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company name:</span>
                                        <input type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="company_name" required>
                                        <div class="invalid-feedback">Please add company name.</div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Started:</span>
                                        <select class="form-select" aria-label="start_year" name="start_year" aria-describedby="start-year-label" id="start_year_select_career" required>
                                             <option value="">Start Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = 1950; $year <= 2023; $year++) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><span class="req-indicator ended-year" id="ended-year_update">*</span>Ended:</span>
                                        <select class="form-select end_year_select_career" aria-label="graduation_year" name="end_year" aria-describedby="start-year-label" id="graduation_year_select_career_update" required>
                                             <option value="">End Year</option>
                                             <?php
                                                  $currentYear = date("Y");
                                                  for ($year = $currentYear; $year >= 1950; $year--) {
                                                       echo "<option value='$year'>$year</option>";
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-3">
                                        <div class="input-group-text">
                                             <input class="form-check-input mt-0 me-2 still_in_role_checkbox" type="checkbox" name="still_in_role" value="1" aria-label="Checkbox for following text input" id="still_in_role_checkbox_update">
                                             <label class="form-check-label" for="flexCheckDefault">
                                                  Still in role
                                             </label>
                                        </div>
                                   </div>
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">Description: <span class="recom-indicator">(recommended)</span></span>
                                        <textarea class="form-control" placeholder="Summarise your responsibilities, skills and achievements." name="career_history_description" style="height: 250px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="With textarea"><?= "$course_highlights" ?></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<!-- update career history -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-login" aria-labelledby="offcanvasExampleLabel">
     <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Login Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body">
          <div>
               <form action="<?php echo htmlspecialchars('../function/update-login-details.php'); ?>"  method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                    <div id="job-seeker-signup-a" class="form-section">
                         <div class="">
                              <div>
                                   <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                   <div class="input-group mb-3 d-grid">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Email:</span>
                                        <input list="job-titles" type="text" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" name="email" aria-label="job_title" aria-describedby="basic-addon1" value="<?= "$email" ?>" required>
                                        <div class="invalid-feedback">Please add email.</div>
                                   </div>
                                   <div class="input-group mb-3 d-grid d-none">
                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Old Password:</span>
                                        <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="" disabled value="<?= "$jobseeker_password" ?>"> 
                                   </div>
                                   <div class=" mb-3">
                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="btn-check-2-outlined">Change Password</label><br>
                                   </div>
                                   <div class="d-none" id="password-section">
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Confirm Old Password:</span>
                                             <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="confirm_current_password" id="confirm_current_password">
                                             <div class="invalid-feedback">Please enter your old password.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>New Password:</span>
                                             <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="new_password" id="new_password">
                                             <div class="invalid-feedback">Please enter your new password.</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                         <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                         <button id="submit-button" class="button m-1" type="submit">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>

