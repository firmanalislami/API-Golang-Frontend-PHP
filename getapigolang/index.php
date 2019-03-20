<!DOCTYPE html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<?php 
$url = "http://localhost:8000/api/users"; //get api content dari file golang
$baca = file_get_contents($url);
$datahasil = json_decode($baca,true);
//print_r($datahasil);

// //DELETE
if(isset($_REQUEST['delete'])){
$id = $_REQUEST['delete'];

$urlDelete = "http://localhost:8000/api/user/$id"; 
//KE FILE DOCUMENT/GO/RESTAPI
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'DELETE',
       // 'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($urlDelete, false, $context);
if ($result === FALSE) {
    echo 'error tuh';
 }

 var_dump($result);
}
?>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>FirstName</th> 
    <th>MiddleName</th>
    <th>Password</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  <?php  
        foreach($datahasil as $row){
                    
      ?>
  <tr>
  <td><?php echo $row['Id'];?></td>
    <td><?php echo $row['Username'];?></td>
    <td><?php echo $row['FirstName'];?></td> 
    <td><?php echo $row['MiddleName'];?></td>
    <td><?php echo $row['Password'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td> <a href="edit.php?edit=<?php echo $row['Id'];?>" class="btn">Edit</a> </td>
    <form method="post" action="">
         <input type="hidden"  name="delete" value="<?php echo $row['Id'];?>" /> <!--lempar value delete ke atas di tangkep req -->
         <td><button class="btn" >Delete</button></td>
    </form>    
  </tr>
        <?php }?>
</table>
</body>
</html>