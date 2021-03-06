<?php 
  include "function.php";
  $connect = connectdb();
?>
<!------ Include the above in your HEAD tag ---------->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Courses</title>
  <link rel="stylesheet" type="text/css" href="courses.css">
  <link rel="stylesheet" type="text/css" href="dashboard.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <script type="text/javascript">
      function deleteEnrollment(id){
        if(confirm("Are you sure to unenroll this student?")){
          window.location = 'deleteEnrollment.php?uid=' + id;
        }
      }
    </script>

  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <!-- <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard</a> -->
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <span data-feather="file"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student.php">
              <span data-feather="file"></span>
              Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="courses.php">
              <span data-feather="file"></span>
              Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <h1 class="h1">Welcome</h1>

  <h2 class="h1">List Enrolled Students</h2>

  <a href="newEnrollment.php" class="w3-button w3-deep-orange">Enroll New Student</a>
      <div class="table-wrapper">
        <table class="fl-table">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Course</th>
              <th>Hours</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT e.id, s.first_name as 'first_name', s.last_name as 'last_name', c.name as 'course', c.hours as 'hours', c.price as 'amount'
                FROM enrollment e 
                INNER JOIN student s ON s.id = e.student_id
                INNER JOIN course c ON c.id = e.course_id";
              $query = mysqli_query($connect, $sql);
              while($row = mysqli_fetch_array($query)){ ?>
                <tr>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['course']; ?></td>
                  <td><?php echo $row['hours']; ?></td>
                  <td><?php echo $row['amount']; ?></td>
                  <td><a href="#" onclick="javascript: deleteEnrollment(<?php echo $row['id']; ?>)">Unenroll</a></td>
                </tr>
            <?php } ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</body>
</html>
