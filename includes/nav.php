 <!-- Navigation -->
         
          <?php if($_SESSION['role']==="admin"):?>
          
          <!-- Divider -->
         <hr class="my-3">
         <!-- Heading -->
         <h6 class="navbar-heading p-0 text-muted">
           <span class="docs-normal">Miscellaneous </span>
         </h6>
          <ul class="navbar-nav mb-md-3"> 
          
             <li class="nav-item">
              <a class="nav-link" href="setting">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Setting</span>
              </a>
            </li>
            
           
            <li class="nav-item">
              <a class="nav-link" href="register">
                <i class="ni ni-circle-08 text-dark"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
            
            
          </ul>
          <?php endif;?>