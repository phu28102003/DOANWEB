<?php 
 
// If the form is submitted 
if(isset($_POST['submit'])){ 
    // Get editor content 
    $editor_content = $_POST['editor_input']; 
 
    // Render editor HTML 
    echo $editor_content; 
} 

?>
<?php
// Kết nối đến cơ sở dữ liệu
$hostname = "localhost";
$username = "root";
$password = "20032810";
$database = "test";
$conn =  mysqli_connect($hostname, $username, $password, $database);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editorInput = $_POST["editor_input"];

    // Chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO cc (content) VALUES ('$editorInput')";
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được thêm vào cơ sở dữ liệu thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "select * from cc where id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['content'];

}
$conn->close();
?>

