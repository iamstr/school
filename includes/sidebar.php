 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
   <div class="scrollbar-inner">
     <!-- Brand -->
     <div class="sidenav-header  align-items-center">
       <a class="navbar-brand" href="javascript:void(0)">
         <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
       </a>
     </div>
     <div class="navbar-inner">
       <!-- Collapse -->
       <div class="collapse navbar-collapse" id="sidenav-collapse-main">
         <!-- Nav items -->
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link active" href="dashboard">
               <i class="ni ni-tv-2 text-primary"></i>
               <span class="nav-link-text">Dashboard</span>
             </a>
           </li>
         </ul>
         <!-- Divider -->
         <hr class="my-3">
         <!-- Heading -->
         <h6 class="navbar-heading p-0 text-muted">
           <span class="docs-normal">Girls' Details</span>
         </h6>
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link" href="new-girl">
               <i class="ni ni-fat-add text-orange"></i>
               <span class="nav-link-text">New Admission</span>
             </a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="tables">
               <i class="ni ni-bullet-list-67 text-success"></i>
               <span class="nav-link-text">View Admissions</span>
             </a>
           </li>

<!--

           <li class="nav-item">
             <a class="nav-link " href="upload">
               <i class="ni ni-image text-danger"></i>
               <span class="nav-link-text">Upload Doc </span>
             </a>
           </li>
-->
<!-- this would be in the next release          
           <li class="nav-item">
             <a class="nav-link " href="cv">
               <i class="ni ni-send text-warning"></i>
               <span class="nav-link-text">Send CV </span>
             </a>
           </li>
           
           -->
         </ul>


        

         <!-- Divider -->
         <hr class="my-3">
         <!-- Heading -->
         <h6 class="navbar-heading p-0 text-muted">
           <span class="docs-normal">Accounting</span>
         </h6>

         <ul class="navbar-nav">

<!--
           <li class="nav-item">
             <a class="nav-link" href="expenses">
               <i class="ni ni-money-coins text-warning"></i>
               <span class="nav-link-text">View Reports</span>
             </a>
           </li>
-->
           <li class="nav-item">
             <a class="nav-link" href="recieve">
               <i class="ni ni-collection text-success"></i>
               <span class="nav-link-text">Recieve Payment</span>
             </a>
           </li>
         </ul><!-- Divider -->
         
         <?php if($_SESSION['role']==="admin"):?>
         <hr class="my-3">
         <!-- Heading -->
         <h6 class="navbar-heading p-0 text-muted">
           <span class="docs-normal">Office Management</span>
         </h6>

         <ul class="navbar-nav">

           <li class="nav-item">
             <a class="nav-link" href="users">
               <i class="ni ni-single-02 text-primary"></i>
               <span class="nav-link-text">Users</span>
             </a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="agencies">
               <i class="ni ni-building text-warning"></i>
               <span class="nav-link-text">Agencies</span>
             </a>
           </li>
         </ul>
         
         <?php endif;?>
         
         <?php include("nav.php");?>
       </div>
     </div>
   </div>
 </nav>
