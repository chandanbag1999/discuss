<div class="container">
  <h1 class="heading">Sign Up</h1>

  <form method="post" action="./server/requests.php">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Lucifer@123">
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="email" class="form-label">Email</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="example@email.com">
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="enter your password">
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="enter your address">
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <button type="submit" name="signup" class="btn btn-primary">SIgnup</button>
    </div>

  </form>

</div>