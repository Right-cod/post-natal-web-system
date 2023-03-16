<style style="stylesheet/css">
</style>
<?php
$status=$_GET["status"];
if ($status=="disp"){
include("connect.php");
$res=mysqli_query($conn,"select * from appointment");
echo"<table";
echo"
<tr><th colspan='12'><b>Outspan Booked appointments.</b></th></tr>
";
echo"
<tr>
<th>SN.</th>
<th>Email</th>
<th>Department</th>
<th>child age(days)</th>
<th>Application day</th>
<th>Message</th>
<th>Reply Message</th>
<th>Day posted</th>
<th>Time posted</th>
<th>Delete</th>
<th>Reply</th>
<th>Send</th>
</tr>
";
$sn=0;
while($row=mysqli_fetch_array($res)){
   $sn++;
echo"<tr>";
echo"<td>"; echo $sn; echo"</td>";

echo"<td>";?>
<div class="mb-2"><p style="width:100%" alt=""><?php echo $row['email'];?></p></div> 
<?php echo"</td>";


echo"<td>";?>
<div ><p style="width:100%" alt=""><?php echo $row['department'];?></p></div> 
<?php echo"</td>";


echo"<td>";?>
<div ><p style="width:100%" alt=""><?php echo $row['child_age'];?></p></div> 
<?php echo"</td>";

echo"<td>";?>
<div ><p style="width:100%" alt=""><?php echo $row['application_day'];?></p></div> 
<?php echo"</td>";

echo"<td>";?>
<div ><p style="width:100%" alt=""><?php echo $row['message'];?></p></div> 
<?php echo"</td>";

echo"<td>";?><div id="reply<?php echo $row["id"];?>"><?php echo $row['reply'];?></div> 
<?php echo"</td>";

echo"<td>";?>
<div id="posted<?php echo $row["id"];?>" style="width:100%;"><?php echo $row['posted'];?></div>
<?php echo"</td>";

echo"<td>";?>
<div id="time<?php echo $row["id"];?>" style="width:100%;"><?php echo $row['time_posted'];?></div>
<?php echo"</td>";

echo"<td>";?><input class="btn btn-themee" type="button" id="<?php echo $row["id"];?>" name="<?php echo $row["id"];?>" value="delete" onClick="delete1(this.id)"> <?php echo"</td>";
echo"<td>";?><input class="btn btn-themee" type="button" id="<?php echo $row["id"];?>" name="<?php echo $row["id"];?>" value="Reply" onClick="aa(this.id)"> <?php echo"</td>";
echo"<td>";?><input class="btn btn-themee" type="button" style="visibility:hidden;" id="update<?php echo  $row["id"];?>" name="<?php echo $row["id"];?>" value="Send" onClick="bb(this.name)"> <?php echo"</td>";
echo"</tr>";
}
echo"</table>";
 }
if($status=="update"){
$id=$_GET["id"];
$reply=$_GET["reply"];
$time_posted=$_GET["time"];
$posted=$_GET["posted"];
$dt=strtotime($posted);
$final=date("d-m-Y",$dt);
$datey=date("d-m-Y h:i:sa");
$reply=trim($reply);
$posted=trim($posted);
$time_posted=trim($time_posted);
include("connect.php");  
$res=mysqli_query($conn,"update appointment set reply='$reply',posted='.We have posted you on $final',reply_day=' $datey',time_posted=' $time_posted' where id=$id");

 }


 if($status=="delete"){
    $id=$_GET["id"];
    
    include("connect.php");  
    $res=mysqli_query($conn,"delete from appointment where id=$id");
    
     }
?>