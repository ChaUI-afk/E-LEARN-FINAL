<?php 
 include 'config.php';
 session_start();
 $user_id = $_SESSION['user_id'];

 if(!isset($user_id)){
    header('location: index.php');
 }
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Get the file information
    $sql = "SELECT * FROM files WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    // Delete the file from the server
    $filepath = 'uploads/' . $file['name'];
    if(file_exists($filepath)){
        unlink($filepath);
    }

    // Delete the row from the table
    $sql = "DELETE FROM files WHERE id = $id";
    mysqli_query($conn, $sql);

    $_SESSION['message'] = 'file deleted';
    header('Location: MyFiles.php');
    exit;
}
?>