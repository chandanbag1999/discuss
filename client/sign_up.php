<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm my-5">
        <div class="card-body p-4">
          <h1 class="heading">Sign Up</h1>
          
          <form method="post" action="./server/requests.php">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="username" class="form-control" id="username" placeholder="Choose a username" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" id="password" placeholder="Create a password" required>
              </div>
            </div>

            <div class="mb-4">
              <label for="address" class="form-label">Address</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" name="signup" class="btn btn-primary">
                <i class="bi bi-person-plus me-2"></i>Create Account
              </button>
            </div>
            
            <div class="text-center mt-4">
              <p>Already have an account? <a href="?signin=true">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>