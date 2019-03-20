<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>
<?php
if(isset($_REQUEST['username'])){
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$firstname = $_REQUEST['first_name'];
$lastname = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$data = array('username' => $username, 'password' => $password,'first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email);
 //print_r($data);
// // use key 'http' even if you send the request to https://...
$url = 'http://localhost:8000/api/user'; 
//KE FILE DOCUMENT/GO/RESTAPI
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo 'error tuh';
 }

 var_dump($result);
}
?>
<form action="" method="post">
  Username:<br>
  <input type="text" name="username" >
  <br>
  Password:<br>
  <input type="text" name="password" >
  <br><br>
  firstname:<br>
  <input type="text" name="first_name" >
  <br>
  Last name:<br>
  <input type="text" name="last_name" >
  <br><br>
  Email:<br>
  <input type="text" name="email">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>