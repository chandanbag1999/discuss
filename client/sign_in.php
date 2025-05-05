<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm my-5">
        <div class="card-body p-4">
          <h1 class="heading">Sign In</h1>
          
          <form action="./server/requests.php" method="post"> 
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>
            </div>

            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" name="login" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
              </button>
            </div>
            
            <div class="text-center mt-4">
              <p>Don't have an account? <a href="?signup=true">Sign Up</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>