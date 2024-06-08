<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/indexStyle.css">
    <link rel="icon" type="image/x-icon" href="assets/images/fi1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>JobFinder</title>
  </head>
  <body>

    <!-- header -->
    <header>
      <!-- logo -->
      <a href="index.php" style="text-decoration: none;">
        <div id="logo">
          <h6 style="font-weight: bold; color: black; font-family: Georgia, 'Times New Roman', Times, sans serif; font-size: larger;">
            JobFinder <span style="font-size:30px; color: rgb(29, 129, 236);">...</span>
          </h6>
        </div>
      </a>

      <!-- navbar -->
      <nav>
        <a class="navb" href="index.php">Home</a>
        <a class="navb" href="templates/about.html">About</a>
        <a class="navb" href="templates/contactus.html">Contact Us</a>
      </nav>

      <!-- navbar buttons -->
      <div>
        <a href="templates/login.html" class="btn btn-primary">Log in</a>
        <a href="templates/signup.html" class="btn btn-outline-danger">Sign up</a>
      </div>
    </header>

    <!-- search bar and picture -->
    <div class="container-fluid mt-5 cont1 custom-box">
      <div class="row">

        <!-- text and search bar -->
        <div class="col-sm-6 quote">

          <div class="header-container">
            <h1 class="header1"><br><br><span class="text1">Turning  dreams  into  careers </span> We're  here  to  make  your  dream  job  a  reality !<br></h1>
            
            <!-- search bar -->
            <div class="container mt-4">
              <form class="d-flex" action="jobResult.php" method="get">
                <button class="btn btn-primary" type="submit">Get started</button>
              </form>
            </div>
          </div>
        </div>

        <!-- picture -->
        <div class="col-sm-6 div1">
          <br><br>
          <img src="assets/images/jobsearch2.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>

    <section class="section1">
      <h1>Top Companies</h1>
      
      <?php include('indexTopCompanies.php'); ?>

    </section>

    <section class="section1">
      <h6>Recently Added Jobs</h6>
      <h1>Hot Jobs</h1>

      
      <?php include('indexphp.php'); ?>

    </section>

    <div id="scrollToTop">&#8593;</div>
    <script>
      // JavaScript to handle the scrolling functionality
      document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
      });
    </script>

  </body>
</html>
