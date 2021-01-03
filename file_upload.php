<?php  
// Include the database connection file 
include('db_config.php');
$fileData = '';
if(isset($_FILES['file']['name'][0]))
{
  foreach($_FILES['file']['name'] as $keys => $values)
  {
    $fileName = $_FILES['file']['name'][$keys];
    if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'uploads/' . $values))
    {
      $fileData .= '<img src="uploads/'.$values.'" class="thumbnail" />';
      $query = "INSERT INTO uploads (file_name, upload_time)VALUES('".$fileName."','".date("Y-m-d H:i:s")."')";
      mysqli_query($con, $query);
    }
  }
}
echo $fileData;
?>