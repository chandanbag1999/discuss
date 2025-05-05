<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Discuss Project</title>
  <?php 
    include("./client/commonFiles.php");
  ?>
</head>
<body>

  <?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 0); 
    
    
    try {
      session_start();
    } catch (Exception $e) {
      // If session is corrupted, reset it
      @session_unset();
      @session_destroy();
      @session_start();
      $_SESSION = array();
    }
    
    
    if (isset($_GET['logout'])) {
      // Clear all session data
      @session_unset();
      @session_destroy();
      // Restart session to avoid errors
      @session_start();
      $_SESSION = array();
      // Redirect to clear the URL
      header("Location: ./");
      exit;
    }
    
    // Include database configuration - handle in a way that won't crash the site
    include_once("./db/config.php");
    
    // Show maintenance message if database is down
    if (isset($db_connection_failed) && $db_connection_failed) {
      echo '<div class="container mt-5">';
      echo '<div class="alert alert-warning">';
      echo '<h4>Temporary Maintenance</h4>';
      echo '<p>We are currently experiencing technical difficulties with our database connection. Please try again later.</p>';
      echo '</div>';
      echo '</div>';
      // Still attempt to show header without DB-dependent content
    }
    
    // Include header with try/catch to prevent fatal errors
    try {
      include("./client/header.php");
    } catch (Exception $e) {
      echo "<div class='alert alert-danger'>Error loading navigation. Please try refreshing the page.</div>";
    }

    // Main content routing with error handling
    try {
      if (isset($_GET["signup"]) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
          include("./client/sign_up.php");
      } else if (isset($_GET["signin"]) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
          include("./client/sign_in.php");
      } else if (isset($_GET["ask"])) {
          include("./client/ask.php");
      } else if (isset($_GET["q-id"])) {
          $qid = $_GET["q-id"];
          include("./client/question-details.php");
      } else if (isset($_GET['c-id'])) {
          $cid = $_GET['c-id'];
          include('./client/questions.php');
      } else if (isset($_GET['u-id'])) {
          $uid = $_GET['u-id'];
          include('./client/questions.php');
      } else if (isset($_GET['latest'])) {
          include('./client/questions.php');
      } else if (isset($_GET['search'])) {
          $search = $_GET['search'];
          include('./client/questions.php');
      } else {
          include("./client/questions.php");
      }
    } catch (Exception $e) {
      echo "<div class='container mt-5'>";
      echo "<div class='alert alert-danger'>An error occurred while loading the page content.</div>";
      // Only show error details to admins or in debug mode
      if (isset($_GET['debug'])) {
        echo "<p>Error details: " . $e->getMessage() . "</p>";
      }
      echo "</div>";
    }
    
  ?>

  
</body>
</html>