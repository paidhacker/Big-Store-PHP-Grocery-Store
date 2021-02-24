<?php
define("ss",true);
require("top.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
$terms = mysqli_query($conn, "SELECT * FROM `terms`");
$aboutlist = mysqli_query($conn, "SELECT * FROM `about`");
$faqs = mysqli_query($conn, "SELECT * FROM `faqs`");
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h2>Settings </h2>
                         
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
    <form action="functions/setting_save.php" method="post" enctype="multipart/form-data">
    <!--Display settings-->
    <div class="form-group"><label for="company" class=" form-control-label"><h4>&nbsp;&nbsp;<u>Display Settings:</u></h4></label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;First Name</label><input type="float" id="company" name="fname" placeholder="Enter store First name (Max : 10)" value="<?php echo $fname; ?>" class="form-control" maxlength="10" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Last Name</label><input type="float" id="company" name="lname" placeholder="Enter store Last name (Max : 10)" value="<?php echo $lname; ?>" class="form-control" maxlength="10" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Title</label><input type="float" id="company" name="title" placeholder="Enter store title(Max : 100)" value="<?php echo $title; ?>" class="form-control" maxlength="100" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Search Header Text</label><input type="float" id="company" name="h1" placeholder="Enter Search Header Text" value="<?php echo $header1; ?>" class="form-control" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Footer Text</label><input type="float" id="company" name="desc" placeholder="Enter footer text" value="<?php echo $desc; ?>" class="form-control" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Faqs</label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;<a href="functions/faq.php?action=add" class="btn btn-warning">+Add Question</a></label></div>
                     <div class="card">
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="avatar">Question</th>
                                       <th>Answer</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<?php
while($row3 = mysqli_fetch_assoc($faqs)){
?>
                                 <tr>
                               <td><?php echo $row3['title']; ?></td>  
                               <td><?php echo $row3['description']; ?></td>  
                               <td>
                               <a href="functions/faq.php?id=<?php echo $row3['id']; ?>&action=edit" class="btn btn-success">Edit</a><br><br><a href="functions/faq.php?id=<?php echo $row3['id']; ?>&action=remove" class="btn btn-danger">Remove</a> 
                               </td>  
                                 </tr>
<?php } ?>
                                 </tbody>  
                                 </table>
                                 </div>
                                 </div>
                                 </div>
                                 </div>

<!--Order settings-->
    <div class="form-group"><label for="company" class=" form-control-label"><h4>&nbsp;&nbsp;<u>Order Settings:</u></h4></label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Currency</label><input type="float" id="company" name="ps" placeholder="Enter price sign" value="<?php echo $ps; ?>" class="form-control" maxlength="4" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Terms and Conditions</label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;<a href="functions/term.php?action=add" class="btn btn-warning">+Add Term</a></label></div>
                     <div class="card">
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th class="serial">Sno.</th>
                                       <th class="avatar">Title</th>
                                       <th>Description</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<?php
while($row = mysqli_fetch_assoc($terms)){
?>
                                 <tr>
                               <td><?php echo $row['sno']; ?></td>  
                               <td><?php echo $row['title']; ?></td>  
                               <td><?php echo $row['description']; ?></td>  
                               <td>
                               <a href="functions/term.php?id=<?php echo $row['id']; ?>&action=edit" class="btn btn-success">Edit</a><br><br><a href="functions/term.php?id=<?php echo $row['id']; ?>&action=remove" class="btn btn-danger">Remove</a> 
                               </td>  
                                 </tr>
<?php } ?>
                                 </tbody>  
                                 </table>
                                 </div>
                                 </div>
                                 </div>
                                 </div>
                             

<!--Contact settings-->
    <div class="form-group"><label for="company" class=" form-control-label"><h4>&nbsp;&nbsp;<u>Contact Settings:</u></h4></label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Contact Description</label><textarea type="float" id="company" name="contact_description" placeholder="Enter Contact Description" class="form-control" required="true" style="height : 120px;"><?php echo $contact_description; ?></textarea></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Contact Address</label><input type="float" id="company" name="add" placeholder="Enter Contact address" value="<?php echo $add; ?>" class="form-control" maxlength="100" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Contact Email</label><input type="float" id="company" name="mail" placeholder="Enter Contact email" value="<?php echo $mail; ?>" class="form-control" maxlength="100" required="true"></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Contact Phone Number</label><input type="text" id="company" name="pno" placeholder="Enter Contact phone number" value="<?php echo $pno; ?>" class="form-control" maxlength="16" required="true"></div>
   <!--about settings-->
   <div class="form-group"><label for="company" class=" form-control-label"><h4>&nbsp;&nbsp;<u>About Settings:</u></h4></label></div>
   <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;About Store</label><textarea type="float" id="company" name="about" placeholder="Enter about store" class="form-control" required="true" style="height : 120px;"><?php echo $about; ?></textarea></div>
   <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;Store Journey</label></div>
    <div class="form-group"><label for="company" class=" form-control-label">&nbsp;&nbsp;<a href="functions/about.php" class="btn btn-warning">+Add Element</a></label></div>
                     <div class="card">
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th class="serial">Date</th>
                                       <th>Description</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<?php
while($row2 = mysqli_fetch_assoc($aboutlist)){
?>
                                 <tr>
                               <td><?php echo $row2['date']; ?></td>  
                               <td><?php echo $row2['description']; ?></td>  
                               <td><a href="functions/about.php?id=<?php echo $row2['id']; ?>&action=edit" class="btn btn-success">Edit</a><br><br><a href="functions/about.php?id=<?php echo $row2['id']; ?>" class="btn btn-danger">Remove</a></td>  
                                 </tr>
<?php } ?>
                                 </tbody>  
                                 </table>
                                 </div>
                                 </div>
                                 </div>
                                 </div>
   <!---File manager---> 
   <div class="form-group"><label for="company" class=" form-control-label"><h4>&nbsp;&nbsp;<u>File Manager:</u></h4></label></div>           

<div class="form-group"><label for="company" class=" form-control-label">Image 1 (370 X 370)&nbsp;</label>
<img src="../images/ab.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 50px;"></img>
<br>
<input type="file" name="img1" id="file"></div>

<div class="form-group"><label for="company" class=" form-control-label">Image 2 (370 X 370)&nbsp;</label>
<img src="../images/ab1.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 50px;"></img>
<br>
<input type="file" name="img2" id="file"></div>

<div class="form-group"><label for="company" class=" form-control-label">Image 3 (445 X 300)&nbsp;</label>
<img src="../images/cac.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 50px;"></img>
<br>
<input type="file" name="img3" id="file"></div>

<div class="form-group"><label for="company" class=" form-control-label">Image 4 (500 X 329)&nbsp;</label>
<img src="../images/contact2.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 50px;"></img>
<br>
<input type="file" name="img4" id="file"></div>

<div class="form-group"><label for="company" class=" form-control-label">Image 5 (1920 X 355)&nbsp;</label>
<img src="../images/sh.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 100px;"></img>
<br>
<input type="file" name="img5" id="file"></div>

<div class="form-group"><label for="company" class=" form-control-label">Image 6 (960 X 540)&nbsp;</label>
<img src="../images/video.jpg?<?php echo $unique_name; ?>" style="height : 50px; width : 100px;"></img>
<br>
<input type="file" name="img6" id="file"></div>
    <input type="submit" value="Save" class="btn btn-info" name="save">
    </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
       <?php require("footer.php"); ?>