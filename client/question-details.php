<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <?php
            include("./db/config.php");

            // Ensure $qid is numeric to prevent SQL injection
            $qid = isset($qid) && is_numeric($qid) ? $qid : 0;

            $query = "SELECT q.*, u.username, c.name as category_name 
                     FROM questions q 
                     LEFT JOIN users u ON q.user_id = u.id 
                     LEFT JOIN category c ON q.category_id = c.id
                     WHERE q.id = $qid";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
              $row = $result->fetch_assoc();

              $cid = isset($row['category_id']) ? $row['category_id'] : 0;
              $username = isset($row['username']) ? $row['username'] : 'Anonymous';
              $date = isset($row['created_at']) ? date('M d, Y', strtotime($row['created_at'])) : '';
              $category_name = isset($row['category_name']) ? $row['category_name'] : 'General';

              echo "<h2 class='question-title mb-3'>".$row['title']."</h2>
                    <div class='d-flex align-items-center mb-3'>
                      <div class='badge bg-primary me-2'>".ucfirst($category_name)."</div>
                      <small class='text-muted'><i class='bi bi-person-circle me-1'></i> $username</small>
                      ".($date ? "<small class='text-muted ms-3'><i class='bi bi-calendar3 me-1'></i> $date</small>" : "")."
                    </div>
                    <div class='card mb-4'>
                      <div class='card-body bg-light'>
                        <p class='mb-0'>".$row['description']."</p>
                      </div>
                    </div>";
            
              echo "<h4 class='mb-3'><i class='bi bi-chat-square-text me-2'></i>Answers</h4>";
              include("answers.php");

              echo "<div class='card mt-4'>
                      <div class='card-body'>
                        <h5 class='card-title mb-3'><i class='bi bi-pencil-square me-2'></i>Your Answer</h5>
                        <form action='./server/requests.php' method='post'>
                          <input type='hidden' name='question_id' value='$qid'>
                          <div class='mb-3'>
                            <textarea name='answer' class='form-control' rows='5' placeholder='Write your answer here...' required></textarea>
                          </div>
                          <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                            <button type='submit' class='btn btn-primary'>
                              <i class='bi bi-send me-2'></i>Post Answer
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>
                      <i class='bi bi-exclamation-triangle-fill me-2'></i>
                      Question not found or has been removed.
                    </div>";
              echo "<div class='text-center mt-4'>
                      <a href='./' class='btn btn-primary'>
                        <i class='bi bi-house-door me-2'></i>Return to Home
                      </a>
                    </div>";
            }
          ?>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <?php if (isset($row) && isset($cid) && $cid > 0): ?>
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
          <h5 class="mb-0"><i class="bi bi-tag me-2"></i>Category</h5>
        </div>
        <div class="card-body">
          <?php
            if (isset($row['category_name'])) {
              echo "<h4 class='mb-3'>" . ucfirst($row['category_name']) . "</h4>";
            } else {
              echo "<p>No category information available</p>";
            }
          ?>
        </div>
      </div>
      
      <div class="card shadow-sm">
        <div class="card-header bg-light">
          <h5 class="mb-0"><i class="bi bi-question-circle me-2"></i>Related Questions</h5>
        </div>
        <div class="card-body p-0">
          <?php
            $query = "SELECT * FROM questions WHERE category_id=$cid AND id!=$qid LIMIT 5";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
              echo "<ul class='list-group list-group-flush'>";
              foreach ($result as $row) {
                $id = $row['id'];
                $title = $row['title'];

                echo "<li class='list-group-item'>
                        <a href='?q-id=$id'>$title</a>
                      </li>";
              }
              echo "</ul>";
            } else {
              echo "<div class='card-body'>No related questions found.</div>";
            }
          ?> 
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>