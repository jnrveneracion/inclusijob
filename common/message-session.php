<style>
     .custom-toast {
          position: fixed;
          bottom: 20px;
          left: 20px;
          background-color: #333;
          color: #fff;
          border-radius: 5px;
          padding: 10px;
          display: none;
          z-index: 9999;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
     }

     .custom-toast-body {
          font-size: 16px;
     }
</style>

<?php
// Check if the success message query parameter exists
if (isset($_GET['message'])) {
     $successMessage = $_GET['message'];

     echo '<div id="custom-toast" class="custom-toast">';
     echo '<div class="custom-toast-body" id="custom-toast-message">' . htmlspecialchars($successMessage) . '</div>';
     echo '</div>';

}
?>

<script>
     // Function to show a custom toast message
     function showCustomToast() {
          var customToast = document.getElementById('custom-toast');
          customToast.style.display = 'block';

          // Automatically hide the custom toast after 5 seconds (5000 milliseconds)
          setTimeout(function () {
               hideCustomToast();
          }, 3000);
     }

     // Function to hide the custom toast
     function hideCustomToast() {
          var customToast = document.getElementById('custom-toast');
          customToast.style.display = 'none';
     }

     // Call the showCustomToast function when the page loads
     window.onload = showCustomToast;
</script>