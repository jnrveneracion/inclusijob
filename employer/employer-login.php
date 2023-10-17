<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Employer Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="../css/index-style.css">
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt">Home</h6></a> 
               <a href="" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Employer Login</h6></a>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center" id="login-body">
          <div>
               <div class="login-section">
                    <div>
                         <h5 class="login-head-txt">Employer Login</h5>
                    </div>
                    <div class="d-grid justify-content-center align-items-center">
                         <form action="" class="d-grid justify-content-center align-items-center">
                              <input placeholder="username" class="login-input" type="text" name="username" id="username" require>
                              <input placeholder="password" class="login-input" type="password" name="password" id="password" require>
                              <button type="submit" class="login-btn">LOGIN</button>
                         </form>
                         <a href="" class="text-center login-footer"><span class="">Or sign up</span></a>
                    </div>
               </div>
          </div>
     </div>
     <?php require "../common/footer-inside-folder.php"; ?>
</body>
</html>