<?php
define("pm",true);
require("top.php");
if(!isset($_SESSION['STAFF_LOGIN'])){
   header("location:login.php");
}
$product = mysqli_query($conn,"SELECT * FROM `product`");
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Product Manager </h4>
                           <h3 class="box-title"><a href="functions/product/add.php">+ Add Product </a></h3>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th class="serial">Name</th>
                                       <th class="avatar">Description</th>
                                       <th>Category</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 while($row = mysqli_fetch_assoc($product)){
                                    ?>
                                    <tr>
                              
                                       <td class="serial"><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['long_desc']; ?></td>
                                       <?php
$category = mysqli_query($conn,"SELECT * FROM `categories` where id='$row[category]'");
if(mysqli_num_rows($category)>0){
while($row2 = mysqli_fetch_assoc($category)){
                                       ?>
                                       <td><?php echo $row2['name']; ?></td>
                                       <?php
}
}
else{
  echo "<td>None</td>";
}
                                       ?>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="../media/<?php echo $row['img1']; ?>" style="width : 50px; height : 50px;" alt=""></a>
                                             </div>
                                          
                                       </td>
                                       <td><?php echo $ps; ?><?php echo $row['price']; ?> </td>
                                       <td> <span class="name"><?php echo $row['quantity']; ?> </span> </td>
                                       <td>
                                       <?php 
                                       if($row['status']==1){
                                      ?>
                                       <a href="functions/product/active.php?id=<?php echo $row['id']; ?>&action=d"><span class="btn btn-warning">Deactivate</span></a> <br><br>
                                      <?php
                                       }
                                       else{
                                      ?>
                                       <a href="functions/product/active.php?id=<?php echo $row['id']; ?>&action=a"><span class="badge badge-complete">Activate</span></a><br><br>
                                       <?php
                                       }
                                      ?>
                                       <a href="functions/product/update.php?id=<?php echo $row['id']; ?>"><span class="btn btn-primary">Edit</span></a><br><br>
                                        
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