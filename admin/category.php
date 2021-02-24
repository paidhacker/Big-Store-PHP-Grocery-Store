<?php
define("cm",true);
require("top.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
$product = mysqli_query($conn,"SELECT * FROM `categories`");
?>
<style>
#lol{
   width : 100%;
}
</style>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Category Manager </h4>
                           <h3 class="box-title"><a href="functions/category/add.php">+ Add Category </a></h3>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 while($row = mysqli_fetch_assoc($product)){
                                    ?>
                                    <tr>
                              
                                       <td><h3><?php echo $row['name']; ?></h3></td>
                                       <td><img src="../media/<?php echo $row['img']; ?>" id="lol"></img></td>
                                       <?php 
                                       if($row['status']==1){
                                      ?>
                                        <td class="serial"><a href="functions/category/active.php?id=<?php echo $row['id']; ?>&action=d"><span class="btn btn-warning">Deactivate</span></a> <br><br>
                                      <?php
                                       }
                                       else{
                                      ?>
                                       <td class="serial"> <a href="functions/category/active.php?id=<?php echo $row['id']; ?>&action=a"><span class="badge badge-complete">Activate</span></a><br><br>
                                       <?php
                                       }
                                      ?>
                                       <a href="functions/category/update.php?id=<?php echo $row['id']; ?>"><span class="btn btn-primary">Edit</span></a><br><br>
                                        <a href="functions/category/remove.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger">Remove</span></a> 
                                        
                                        </td>
                                    </tr>
                                    <?php
                                 }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
       <?php require("footer.php"); ?>