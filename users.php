<?php include("includes/header.php");?>

<body>
  <?php include("includes/sidebar.php");?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("includes/top-nav.php");?>
    <!-- Page content -->

 <?php 
    
     if(isset($_GET['approve'])):
    $status=$_GET['approve'];
    $sql="update  users set status='working' where user_id='$status'";
    $result=$connect->query($sql);
//    else:echo "failed...".$connect->error;
//    endif;
    
    endif;
    
    if(isset($_GET['reject'])):
    
    $status=$_GET['reject'];
    $sql="update users set status='fired' where user_id='$status'";
    $result=$connect->query($sql);
//    else:echo "failed...".$connect->error;
//    endif;
    
    endif;
    
    ?>
    


    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Add New User</h3>
            </div>
            <div class="card-body">
              <a class="btn btn-primary" href="register">Create New User </a>
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">All The Requests you have made</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="table-agent position-relative">
                    <th scope="col" class="sort" data-sort="name">Employee ID</th>
                    <th scope="col" class="sort" data-sort="name">Employee Name</th>
                    <th scope="col" class="sort" data-sort="budget">Employee Phone</th>
                    <th scope="col" class="sort" data-sort="budget">Date Started</th>
                    <th scope="col" class="sort" data-sort="status">Employee Status</th>
<!--                    <th scope="col" class="sort" data-sort="status">Branch</th>-->

                    <th scope="col" class="position-sticky">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
              
<?php require_once("php_action/fetchUser.php");?>

                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4 d-none">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php");?>
</body>
