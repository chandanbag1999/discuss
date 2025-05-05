<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm my-4">
        <div class="card-body p-4">
          <h1 class="heading">Ask A Question</h1>

          <form action="./server/requests.php" method="post">
            <div class="mb-4">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="What's your question? Be specific." required>
              <div class="form-text">A good title helps others find your question</div>
            </div>

            <div class="mb-4">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" class="form-control" id="description" rows="6" placeholder="Provide details about your question..." required></textarea>
              <div class="form-text">Include all the information someone would need to answer your question</div>
            </div>

            <div class="mb-4">
              <label for="category" class="form-label">Category</label>
              <?php
                include("category.php");
              ?>
              <div class="form-text">Select the most relevant category for your question</div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" name="ask" class="btn btn-primary">
                <i class="bi bi-send me-2"></i>Post Your Question
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>