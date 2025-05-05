<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
          <h2 class="heading mb-0">Questions</h2>
          <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])): ?>
          <a href="?ask=true" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Ask Question
          </a>
          <?php endif; ?>
        </div>
        <div class="card-body">
          <?php
            include("./db/config.php");
            
            // Make sure the $uid variable is defined
            if (!isset($uid)) {
                $uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            }

            // Build the query based on parameters
            if (isset($_GET["c-id"])) {
              $query = "SELECT q.*, c.name as category_name, u.username FROM questions q 
                        LEFT JOIN category c ON q.category_id = c.id
                        LEFT JOIN users u ON q.user_id = u.id
                        WHERE q.category_id=$cid";
              $category_title = "Questions in category";
            } else if (isset($_GET["u-id"])) {
              $query = "SELECT q.*, c.name as category_name, u.username FROM questions q 
                        LEFT JOIN category c ON q.category_id = c.id
                        LEFT JOIN users u ON q.user_id = u.id
                        WHERE q.user_id=$uid";
              $category_title = "My Questions";
            } else if (isset($_GET["latest"])) {
              $query = "SELECT q.*, c.name as category_name, u.username FROM questions q 
                        LEFT JOIN category c ON q.category_id = c.id
                        LEFT JOIN users u ON q.user_id = u.id
                        ORDER BY q.id DESC";
              $category_title = "Latest Questions";
            } else if (isset($_GET["search"])) {
              $query = "SELECT q.*, c.name as category_name, u.username FROM questions q 
                        LEFT JOIN category c ON q.category_id = c.id
                        LEFT JOIN users u ON q.user_id = u.id
                        WHERE q.title LIKE '%$search%'";
              $category_title = "Search Results for \"$search\"";
            } else {
              $query = "SELECT q.*, c.name as category_name, u.username FROM questions q 
                        LEFT JOIN category c ON q.category_id = c.id
                        LEFT JOIN users u ON q.user_id = u.id
                        ORDER BY q.id DESC";
              $category_title = "All Questions";
            }

            // Display category title if needed
            if (!empty($category_title)) {
              echo "<h5 class='text-muted mb-4'>$category_title</h5>";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
              foreach ($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                $category = isset($row['category_name']) ? $row['category_name'] : 'General';
                $username = isset($row['username']) ? $row['username'] : 'Anonymous';
                $date = isset($row['created_at']) ? date('M d, Y', strtotime($row['created_at'])) : '';
                
                echo "<div class='question-list'>
                        <div class='my-question'>
                          <div>
                            <h4><a href='?q-id=$id' class='question-highlight'>$title</a></h4>
                            <div class='d-flex align-items-center mt-2'>
                              <span class='badge bg-primary me-2'>".ucfirst($category)."</span>
                              <small class='text-muted'><i class='bi bi-person-circle me-1'></i>$username</small>
                              ".($date ? "<small class='text-muted ms-3'><i class='bi bi-calendar3 me-1'></i>$date</small>" : "")."
                            </div>
                          </div>";
                          
                if (isset($uid) && $uid && isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $row['user_id']) {
                  echo "<a href='./server/requests.php?delete=$id' class='btn btn-sm btn-outline-danger'>
                          <i class='bi bi-trash'></i>
                        </a>";
                }
                
                echo  "</div>
                      </div>";
              }
            } else {
              echo "<div class='alert alert-info' role='alert'>
                      <i class='bi bi-info-circle me-2'></i>No questions found.
                    </div>";
            }
          ?>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <?php include('category_list.php'); ?>
    </div>
  </div>
</div>
  