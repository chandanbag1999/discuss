<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Discuss Project</title>
  <?php 
    session_start();
    include("./client/commonFiles.php");
  ?>
</head>
<body>

  <?php 
    include("./client/header.php");

    if (isset($_GET["signup"]) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include("./client/sign_up.php");
    } else if (isset($_GET["signin"]) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include("./client/sign_in.php");
    } else if (isset($_GET["ask"])) {
        include("./client/ask.php");
    } else if (isset($_GET["q-id"])) {
        $qid = isset($_GET["q-id"]);
        include("./client/question-details.php");
    } else {
        include("./client/questions.php");
    }
    
  ?>

  
</body>
</html>