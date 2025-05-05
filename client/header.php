<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
     <a class="navbar-brand" href="./">
        <img src="./public/logo.png" alt="Discuss Logo" />
     </a>
     
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
 
     <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" href="./"><i class="bi bi-house-door"></i> Home</a>
         </li>
         <?php 
            if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="./?logout=true"><i class="bi bi-box-arrow-right"></i> Logout</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="?ask=true"><i class="bi bi-plus-circle"></i> Ask A Question</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>"><i class="bi bi-person"></i> My Questions</a>
              </li>
            <?php }
         ?>

         <?php 
            if (!isset($_SESSION['user']) || !isset($_SESSION['user']['username'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="?signin=true"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?signup=true"><i class="bi bi-person-plus"></i> SignUp</a>
              </li>
            <?php }
         ?>
         
         <li class="nav-item">
            <a class="nav-link" href="?latest=true"><i class="bi bi-clock"></i> Latest Questions</a>
         </li>
       </ul>

       <form class="d-flex" action="">
          <div class="input-group">
            <input class="form-control" name="search" type="search" placeholder="Search questions" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
          </div>
        </form>
     </div>
   </div>
 </nav>