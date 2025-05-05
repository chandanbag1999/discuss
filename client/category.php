<div class="input-group">
  <span class="input-group-text"><i class="bi bi-tag"></i></span>
  <select class="form-select" name="category" id="category" required>
    <option value="">Select A Category</option>
    <?php
      include("./db/config.php");

      $query = "select * from category";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        foreach ($result as $row) {
          $name = ucfirst($row['name']);
          $id = $row['id'];

          echo "<option value=$id>$name</option>";
        }
      } else {
        echo "<option disabled>No categories available</option>";
      }
    ?>
  </select>
</div>