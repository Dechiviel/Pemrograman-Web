<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['nrp'])) {
  if (isset($_SESSION['admin']))
    if ($_SESSION['admin'] === false) {
      header("Location: ../user/");
      exit();
    }
} else {
  header("Location: login/");
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
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-fluid ps-1">

    <div class="row g-1">

      <!-- navigation sidebar -->
      <div class="col-sm-3 col-lg-2 navi pe-0 ps-lg-1">

        <!-- logo bookbase -->
        <span class="d-flex flex-row justify-content-center align-items-center mt-4 me-1 me-md-3 title-container">
          <img src="css/logo.png" alt="Logo" width="50px" class="m-0 logo-book">
          <h4 class="px-1 title m-0">BookBase</h4>
        </span>

        <!-- menu sidebar -->
        <div class="menu-container1 mb-5">
          <div class="books ps-3 ps-lg-3 mt-1 mb-1 active d-flex align-items-center"><i class="bi bi-book-half"
              style="font-size: 20px"></i><span>Books</span></div>
          <div class="members ps-3 ps-lg-3 mt-1 mb-1 d-flex align-items-center"><i class="bi bi-people"
              style="font-size: 20px"></i><span>Members</span></div>
          <div class="query ps-3 ps-lg-3 mt-1 mb-1 d-flex align-items-center"><i class="bi bi-filetype-sql"
              style="font-size: 20px"></i><span>Query</span></div>
        </div>
        <div class="menu-container2 mb-4 mt-5">
          <div class="profile ps-3 ps-lg-3 mt-1 mb-1 d-flex align-items-center"><i class="bi bi-person-square"
              style="font-size: 20px"></i><span>Profile</span></div>
          <div class="logout ps-3 ps-lg-3 mt-1 mb-1 d-flex align-items-center"
            onclick="document.querySelector('.submit-logout').click();"><i class="bi bi-box-arrow-in-left"
              style="font-size: 20px"></i><span>Logout</span></div>
        </div>
      </div>

      <!-- main content -->
      <div class="col-sm-9 col-lg-10 z-1 ps-1 d-flex align-items-center">

        <!-- searchbar -->
        <div class="tables p-4">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
              <div class="position-relative">
                <input type="text" class="form-control search ps-4" placeholder="Search..." aria-label="Search">
                <div class="position-absolute top-50 end-0 translate-middle-y d-flex">

                  <!-- search bar button -->
                  <i class="bi bi-search h5 m-0 mx-3 search-btn "></i>

                </div>
              </div>
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

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="logout-form">
    <input class="submit-logout" type="submit" name="logout" value="logout" style="display: none;">
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>