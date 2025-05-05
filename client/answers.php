<div class="container">
  <div class="offset-sm-1">
    <h5>Answer:</h5>

    <?php
      // Ensure $qid is set and is numeric
      $qid = isset($qid) && is_numeric($qid) ? $qid : 0;
      
      $query = "SELECT a.*, u.username FROM answers a 
                LEFT JOIN users u ON a.user_id = u.id 
                WHERE a.question_id=$qid
                ORDER BY a.id DESC";

      $result = $conn->query($query);

      if ($result && $result->num_rows > 0) {
        foreach ($result as $row) {
          $answer = $row['answer'];
          $username = isset($row['username']) ? $row['username'] : 'Anonymous';
          $date = isset($row['created_at']) ? date('M d, Y', strtotime($row['created_at'])) : '';
          
          echo "<div class='card mb-3 answer-wrapper'>
                  <div class='card-body'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                      <div>
                        <span class='fw-bold'><i class='bi bi-person-circle me-1'></i> $username</span>
                        ".($date ? "<small class='text-muted ms-3'><i class='bi bi-calendar3 me-1'></i> $date</small>" : "")."
                      </div>
                    </div>
                    <p class='mb-0'>$answer</p>
                  </div>
                </div>";
        }
      } else {
        echo "<div class='alert alert-info mb-4' role='alert'>
                <i class='bi bi-info-circle me-2'></i>No answers yet. Be the first to answer!
              </div>";
      }
    ?>
  </div>
</div>