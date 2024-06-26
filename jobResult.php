<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/resultStyle.css">
      <link rel="icon" type="image/x-icon" href="assets/images/fi1.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <title>Job Listings</title>
  </head>

  <body>
    <header>
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
    


    <section class="section2">
      <div class="container mt-4 cont1 p-lg-5 custom-box">
        <h2 class="mb-4">Job Listings</h2>
        <form action="jobResult.php" method="get">
          <div class="row justify-content-center align-items-center">
              <div class="col-md-3 mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Search Keywords">
              </div>  
              <div class="col-md-3 mb-3">
                  <label for="filter" class="form-label">Filter:</label>
                  <select id="filter" class="form-select" name="filter">
                      <option value="new">New Posted Jobs</option>
                      <option value="high_salary">High Salary to Low Salary</option>
                      <option value="full_time">Full Time Jobs</option>
                      <option value="part_time">Part Time Jobs</option>
                      <option value="hybrid">Hybrid Jobs</option>
                      <option value="remote">Remote Jobs</option>
                      <option value="on_site">On Site Jobs</option>
                  </select>
              </div>
              <div class="col-md-2 mb-3">
                  <label for="min_salary" class="form-label">Min Salary:</label>
                  <input type="number" class="form-control" id="min_salary" name="min_salary" placeholder="Min Salary">
              </div>
              <div class="col-md-2 mb-3">
                  <label for="max_salary" class="form-label">Max Salary:</label>
                  <input type="number" class="form-control" id="max_salary" name="max_salary" placeholder="Max Salary">
              </div>
              <div class="col-md-2">
                  <button type="submit" class="btn btn-primary mt-2">Apply Filter</button>
              </div>
          </div>
        </form>
      </div>
    </section>

    <section class="section1">
      <h6>Available Jobs</h6>
      <h1>Top Jobs</h1>

      <?php include('resultPhp.php'); ?>

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
