<?php
require("../../database.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
$id = mysqli_real_escape_string($conn, $_GET['id']);
$product = mysqli_query($conn,"SELECT * FROM `product` where id='$id'");
$cat_default = mysqli_query($conn,"SELECT * FROM `categories` where id='$id'");
$cat = mysqli_query($conn,"SELECT * FROM `categories`");
if(empty($id)){
   header("location:../../index.php");
}


?>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../../assets/css/normalize.css">
      <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../assets/css/themify-icons.css">
      <link rel="stylesheet" href="../../assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="../../assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
   <br>
  &nbsp;<a href="../../index.php"> <button class="btn btn-warning">Back</button></a>
      <div>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Update Product</strong></div>
                        <div class="card-body card-block">
<?php
while($row = mysqli_fetch_assoc($product)){
?>
                        <form action="update.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">

                           <div class="form-group"><label for="company" class=" form-control-label">Name</label><input type="text" id="company" name="name" placeholder="Enter product name (Max: 30)" maxlength="30" class="form-control" value="<?php echo $row['name'];?>" required></div>
                           <div class="form-group"><label for="company" class=" form-control-label">Long Description (Max: 1000)</label><textarea style="height : 250px;" id="company" name="long_desc" placeholder="Enter a long description (Max 1000)" class="form-control" maxlength="1000" required><?php echo $row['long_desc'];?></textarea></div>
                       
                           <div class="form-group"><label for="company" class=" form-control-label">Category</label></div>
                           <div class="form-group"><select name="cat_id">
                           <?php 
                        
while($row2 = mysqli_fetch_assoc($cat)){
   if($row2['id'] == $row['category']){
                           ?>
                         <option selected value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></optiom>
<?php } ?>
   <option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></optiom>
<?php 
} ?>
</select></div>                
<div class="form-group"><label for="company" class=" form-control-label">Image 1 (Profile)&nbsp;</label><input type="file" name="img1" id="file" value="null"></div>

<div class="form-group"><label for="company" class=" form-control-label">Mrp</label><input type="float" id="company" name="mrp" placeholder="Enter product mrp" class="form-control" value="<?php echo $row['mrp'];?>" required></div>
<div class="form-group"><label for="company" class=" form-control-label">Price</label><input type="float" id="company" name="price" placeholder="Enter product Price" class="form-control" value="<?php echo $row['price'];?>" required></div>
<div class="form-group"><label for="company" class=" form-control-label">Meta Title</label><input type="text" id="company" name="meta_title" placeholder="Enter Meta Title" class="form-control" value="<?php echo $row['meta_title'];?>" required></div>
<div class="form-group"><label for="company" class=" form-control-label">Meta Description</label><input type="text" id="company" name="meta_desc" placeholder="Enter Meta Description" class="form-control" value="<?php echo $row['meta_desc'];?>" required></div>
<div class="form-group"><label for="company" class=" form-control-label">Tags</label><input type="text" id="company" name="meta_tags" placeholder="Enter Tags" class="form-control" value="<?php echo $row['meta_tags'];?>"></div>
<div class="form-group"><label for="company" class=" form-control-label">Quantity</label><input type="number" id="company" name="quantity" placeholder="Enter Quantity" class="form-control" value="<?php echo $row['quantity'];?>" required></div>
                           <input type="submit" class="btn btn-lg btn-info btn-block" name="update" value="Update">
                           </button>
                        </div>
                        </form>
                        <?php
                     }
?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php require("../../footer.php"); ?>
         <script src="../../assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="../../assets/js/popper.min.js" type="text/javascript"></script>
      <script src="../../assets/js/plugins.js" type="text/javascript"></script>
      <script src="../../assets/js/main.js" type="text/javascript"></script>
   <?php
if(isset($_POST['update'])){
   //image 1
   if(isset($_FILES['img1'])) {
      $file = $_FILES['img1'];
      ($file);
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];
      $file_prefix = ('https://spaceup.ml/');
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));
      if($file_error === 0){
         if($file_size <= 10000000){
            $file_name_new = uniqid('','true') .".". $file_ext;
         $file_destination = '../../../media/' . $file_name_new;
         if(move_uploaded_file($file_tmp, $file_destination)){
            if($file_size >= 1){
               $img1 = $file_name_new;
               mysqli_query($conn, "UPDATE `product` SET `img1` = '$img1' WHERE `product`.`id` = '$id'");
            }
            else{
              
            }
         }
      }
      else{
         echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
         echo '<meta HTTP-EQUIV="REFRESH" content="0; url=update.php">';
         die();
      }
   }
}
//end image 1
   mysqli_query($conn, "UPDATE `product` SET name='$_POST[name]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET short_desc='lol' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET long_desc='$_POST[long_desc]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET category='$_POST[cat_id]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET mrp='$_POST[mrp]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET price='$_POST[price]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET meta_title='$_POST[meta_title]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET meta_desc='$_POST[meta_desc]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET meta_tags='$_POST[meta_tags]' where id ='$id'");
   mysqli_query($conn, "UPDATE `product` SET quantity='$_POST[quantity]' where id ='$id'");
   echo '<script>alert("Product Updated Successfully!");</script>';
  echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../index.php">';

}
   ?>