<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once "../Common/Setup.php";
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);





class UserController
{
    private $conn;

    public function __construct()
    {
        $this->conn = dbConnect();
    

    }
  

//secure 
    public function logout(){
        session_start();
        $sess = filter_input(INPUT_POST, 'sessionId', FILTER_SANITIZE_STRING);
        $_SESSION = array();
        session_destroy();
        echo"destroyed";
        ob_start();
      //  header('Location: ../index.php');
        ob_end_flush();
    }
    //is responsible for loggin in for the account 
    public function Loggin($email,$condition){

        $sql = "SELECT * FROM USERS WHERE email = '$email' AND $condition";
       // echo $sql;
        $st = $this->conn->prepare($sql);
        $st->execute();
        $row_count = $st->rowCount();
      //  echo $row_count;


        if ($row_count > 0) {
        
            $getUser = "SELECT * FROM USERS WHERE EMAIL='$email' ";
            $getUserST = $this->conn->prepare($getUser);
            $getUserST->execute();
            $userData = $getUserST->fetch(PDO::FETCH_ASSOC);
           
            $_SESSION['ID'] = $userData['ID'];
            $_SESSION['EMAIL'] = $userData['EMAIL'];
            $_SESSION['USERNAME'] = $userData['USERNAME'];
            $_SESSION['PHONE_NUMBER'] = $userData["PHONE_NUMBER"];
           
         
    
            $_SESSION['IS_LOGGED'] = TRUE;
            $_SESSION['Role'] = $userData["IS_ADMIN"];
            $_SESSION['LAST_ACTIVITY_Customer'] = time();
        
           
        echo'is is wokring';
            
        } else {
          // header('Location: ../index.php');
            return false;
        }
        
       
    }
  
    function SignUp($username, $email, $password, $phone, $userType ){

        $isAdmin = ($userType == 'seller') ? 1 : 0;  

        $query = "INSERT INTO `USERS`
        (EMAIL, USERNAME, PASSWORD, PHONE_NUMBER,IS_ADMIN)
        VALUES ('$email','$username',Password('$password'),'$phone','$isAdmin')
        
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->errorCode() != '00000') {
        echo "Error: " . $stmt->errorInfo()[2];
        return null;
       } else {
        return $requests;
    }
    



}


public function PostBook($userID, $bookName, $bookDescription, $imagePath,$Price) {
    // Prepare the SQL statement using placeholders to avoid SQL injection
   

    $query = "INSERT INTO Books (BOOK, DESCRIPTION, IS_ACTIVE, USERID, IMAGE_PATH,Price) VALUES ('$bookName', '$bookDescription', 1,'$userID' , '$imagePath','$Price')";
    
    
    
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->errorCode() != '00000') {
    echo "Error: " . $stmt->errorInfo()[2];
    return null;
   } else {
    return $requests;
}
}
public function fetchAllBooks() {
    $sql = "SELECT * FROM Books";  // Assuming your table is named 'Books'
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $books;
}
    
    
    

}

$controller = new UserController();

$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {

   
    case 'FetchAllBooks':
        $books = $controller->fetchAllBooks();
        header('Content-Type: application/json');
        echo json_encode($books);
        break;
    
    case 'POSTBOOK':
        $userID = $_POST['userId'] ?? ''; // Ensure this matches what's set in the FormData
        $bookName = $_POST['bookName'] ?? '';
        $bookDescription = $_POST['bookDescription'] ?? '';
        $Price=$_POST['Price'] ?? '';
        
        $bookImage = $_FILES['bookImage'] ?? null;
    
        if ($bookImage && $bookImage['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $bookImage['tmp_name'];
            $fileName = $bookImage['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = '../uploadedBooks/';
            $dest_path = $uploadFileDir . $newFileName;
    
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $imagePath = '../BackEnd/uploadedBooks/'.$newFileName;//$dest_path; // Adjust if you need a different path for frontend access
            } else {
                echo "Error in file upload";
                exit; // Stop further processing if the upload fails
            }
        }
    
        if ($userID && $bookName && $bookDescription && isset($imagePath)) {
            // Assuming you have a function in your controller to handle the database insertion
            $controller->PostBook($userID, $bookName, $bookDescription, $imagePath,$Price);
        } else {
            echo "Missing required fields";
        }
    
        break;
    

    case "SignUP":
        $username = $_POST['username'];
        $email = $_POST['UserEmail'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $userType = $_POST['isSeller'];

        
        if ($controller->signup($username, $email, $password, $phone, $userType)) {
           // header('Location: index.php'); // Redirect on success
        } else {
           // header('Location: signup.php'); // Redirect on failure
        }
        echo'test conty'.$username.'the email'.$email.$password. $phone. $userType;
        break;


    
     case "Man-LogIN";

      $email = $_POST['username'];
      $pass = $_POST['password'];
      $condition = "password = Password('$pass')";
      $controller->Loggin($email,$condition);


        break;
     case "logout":
        $controller->logout();
        break;
     default:
        echo "Invalid action";
        break;
}





?>




