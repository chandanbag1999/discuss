<?php
// Database configuration

$host = "localhost";
$username = "root";       
$password = "";         
$database = "discuss";   

// Error handling mode
$display_errors = false;  


try {
    
    $conn = @new mysqli($host, $username, $password, $database);
    
    
    if ($conn->connect_error) {
        if ($display_errors) {
            echo "Database Connection Failed: " . $conn->connect_error;
        }
        
        $db_connection_failed = true;
    } else {
        
        $conn->set_charset("utf8mb4");
        $db_connection_failed = false;
    }
} catch (Exception $e) {
    if ($display_errors) {
        echo "Exception during database connection: " . $e->getMessage();
    }
    $db_connection_failed = true;
    $conn = null;
}
?>