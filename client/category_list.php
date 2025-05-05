<div class="card shadow-sm mb-4">
  <div class="card-header bg-light">
    <h3 class="heading mb-0">Categories</h3>
  </div>
  <div class="card-body p-0">
    <?php
      include("./db/config.php");

      $query = "select * from category";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        echo "<ul class='list-group list-group-flush'>";
        foreach ($result as $row) {
          $name = ucfirst($row['name']);
          $id = $row['id'];

          echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                  <a href='?c-id=$id'>
                    <i class='bi bi-tag me-2'></i>$name
                  </a>
                  <span class='badge bg-primary rounded-pill'>
                    " . getCategoryQuestionCount($conn, $id) . "
                  </span>
                </li>";
        }
        echo "</ul>";
      } else {
        echo "<div class='card-body'>No categories found</div>";
      }

      // Helper function to get question count
      function getCategoryQuestionCount($conn, $categoryId) {
        $query = "SELECT COUNT(*) as count FROM questions WHERE category_id = $categoryId";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row['count'];
      }
    ?>
  </div>
</div>