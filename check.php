<?php
include ("db.php");
if(isset($_POST['email'])){
$pass=md5($_POST['password']);
$email=$_POST['email'];
$sql="SELECT * FROM questions where email='$email' and password='$pass'";
$run_query = mysqli_query($con,$sql);
$row=mysqli_fetch_array($run_query);
$count = mysqli_num_rows($run_query);
if($count == 1){
?>
<!--book section-->
<section class="justify-content-center text-center" id="status">
        <div class="bodyt">   
    <p style="color:white;">Outspan Q/A page.We put you safety and health first..</p>
    <?php
    $email=$row['email'];
    $sq=mysqli_query($con,"SELECT * FROM questions WHERE email='$email' ORDER BY date ASC");
    while ($wer=mysqli_fetch_array($sq)){
      $received=$wer['reply_message'];
      $replied=$wer['date_replied'];
      $sent=$wer['date'];
    ?>
    <!--send-->
    <div class="row float-left m-2 w-100">
    <div class="w-50 mr-auto bg-dark sendrow">
    <p style="width:auto;padding:15px;"><?php echo $wer['question'];?></p>
    <p style="text-align:left;padding-left:15px;color:yellow;"><?php echo "$sent";?></p>
    </div>
    </div>
    <!--send end-->
    <div class="w-100"></div>
    <!--receive-->
    <div class="row float-right m-2 w-100">
    <div class="w-50 ml-auto bg-light receiverow">
    <p style="width:auto;padding:15px;"><?php echo " $received ";?></p>
    <p style="text-align:right;padding-right:15px;color:blue;"><?php echo "$replied";?></p>
    </div>
    </div>
    <!--receive end-->
    <?php
    }
    ?>
        </div>
</section>
<!--booking end-->
<?php
}
else{
  echo "<span style='color:red;'>Incorrect credentials..! Please check and try again.</span>";
  exit();
}
}
?>