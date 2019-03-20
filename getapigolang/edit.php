<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>
<?php
$id = $_GET['edit'];
$url = "http://localhost:8000/api/user/$id"; //get api content dari file golang
$baca = file_get_contents($url);
$datahasil = json_decode($baca,true);
print_r($datahasil);

if(isset($_REQUEST['username'])){
    $idInput = $_REQUEST['id'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $oldpassword = $_REQUEST['old_password'];
    $firstname = $_REQUEST['first_name'];
    $lastname = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $data = array('id'=>$idInput,'username' => $username, 'password' => $password,'old_password'=>$oldpassword,'first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email);
    //print_r($data);
    // // use key 'http' even if you send the request to https://...
    $update = "http://localhost:8000/api/user/$id"; 
//KE FILE DOCUMENT/GO/RESTAPI
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'PUT',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($update, false, $context);
if ($result === FALSE) {
    echo 'error tuh';
 }

 var_dump($result);
}
?>
<form action="" method="post">
<input type="hidden" value="<?php echo $row['Id'];?>" name="id">
  Username:<br>
  <input type="text" name="username" value="<?php echo $datahasil['Username'];?>" >
  <br>
  Password:<br>
  <input type="text" name="password" value="<?php echo $datahasil['Password'];?>" >
  <br><br>
  Old Password:<br>
  <input type="text" name="old_password" value="<?php echo $datahasil['Password'];?>" >
  <br><br>
  firstname:<br>
  <input type="text" name="first_name" value="<?php echo $datahasil['FirstName'];?>" >
  <br>
  Last name:<br>
  <input type="text" name="last_name" value="<?php echo $datahasil['LastName'];?>" >
  <br><br>
  Email:<br>
  <input type="text" name="email" value="<?php echo $datahasil['Email'];?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called.</p>

</body>
</html>