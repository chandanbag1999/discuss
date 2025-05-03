<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Discuss Project</title>
  <?php include("./client/commonFiles.php");?>
</head>
<body>

  <?php 
    include("./client/header.php");

    if (isset($_GET["signup"])) {
      include("./client/sign_up.php");
    } else if (isset($_GET["signin"])) {
      include("./client/sign_in.php");
    } else {
      //
    }
    
  ?>

  
</body>
</html>