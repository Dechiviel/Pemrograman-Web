<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['nrp'])) {
  if (isset($_SESSION['admin']))
    if ($_SESSION['admin'] === true) {
      header("Location: ../admin/");
      exit();
    }
} else {
  header("Location: ../login/");
  exit();
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: ../login/");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookbase</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-fluid main-container m-0 p-0">

    <div class="row g-1 main-row m-0 p-0">


      <!-- main content -->
      <div class="col-12 z-1 m-0 d-flex align-items-center p-0 main-column p-4">

        <div class="tables p-4">
          <div class="row d-flex justify-content-between align-items-center m-0 p-0">
            <div class="col-3">
              <div class="d-flex flex-row ps-3 align-items-center title-container">
                  <img src="css/logo.png" alt="Logo" width="50px" class="m-0 logo-book">
                  <h4 class="px-1 title m-0">BookBase</h4>
              </div>
            </div>

            <!-- searchbar -->
            <div class="col-6">
              <div class="position-relative">
                <input type="text" class="form-control search ps-4" placeholder="Search..." aria-label="Search">
                <div class="position-absolute top-50 end-0 translate-middle-y d-flex">

                  <!-- search bar button -->
                  <i class="bi bi-search h5 m-0 mx-3 search-btn "></i>

                </div>
              </div>
            </div>

            <!-- logout btn -->
            <div class="col-3 m-0">
              <div class="logout ps-3 ps-lg-3 mt-1 mb-1 d-flex align-items-center"
                onclick="document.querySelector('.submit-logout').click();"><i class="bi bi-box-arrow-in-left"
                  style="font-size: 20px"></i><span>Logout</span></div>
            </div>
          </div>
          <!-- header -->
          <div class="header mt-3 ms-2 mb-3 g-0 d-flex justify-content-between">
            List of books

            <!-- new data -->
            <div class="add-container d-flex align-items-center p-2"
              onclick="document.querySelector('.new-btn').click()">
              <span class="me-2">New</span>
              <i class="bi bi-plus-square-fill add"></i>
            </div>
          </div>



          <!-- table for data -->
          <div class="table-container">
            <table class="table table-secondary table-custom mt-0">

              <!-- table head -->
              <thead>
                <tr class="table-head">
                  <th scope="col" width="10%">ID</th>
                  <th scope="col" width="35%">Title</th>
                  <th scope="col" width="35%">Author</th>
                  <th scope="col" width="10%">Year</th>
                  <th class="mx-4 text-center" scope="col" width="10%">Modify</th>
                </tr>
              </thead>

              <!-- table body -->
              <tbody class="main-table-body">
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>


  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="logout-form">
    <input class="submit-logout" type="submit" name="logout" value="logout" style="display: none;">
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>