<style style="stylesheet/css">
</style>
<?php
$status=$_GET["status"];
if ($status=="disp"){
include("connect.php");
$res=mysqli_query($conn,"select * from questions");
echo"<table";
echo"
<tr><th colspan='11'><b>Outspan Questions Asked.</b></th></tr>
";
echo"
<tr>
<th>SN.</th>
<th>Email</th>
<th>Mobile</th>
<th>Question</th>
<th>Reply Message</th>
<th>Day Replied</th>
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
<div ><p style="width:100%" alt=""><?php echo $row['mobile'];?></p></div> 
<?php echo"</td>";

echo"<td>";?>
<div ><p style="width:100%" alt=""><?php echo $row['question'];?></p></div> 
<?php echo"</td>";

echo"<td>";?><div id="reply<?php echo $row["id"];?>"><?php echo $row['reply_message'];?></div> 
<?php echo"</td>";

echo"<td>";?><div id="reply<?php echo $row["id"];?>"><?php echo $row['date_replied'];?></div> 
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
$datey=date("d-m-Y h:i:sa");
include("connect.php");  
$res=mysqli_query($conn,"update questions set reply_message='$reply',date_replied='$datey' where id=$id");

 }


 if($status=="delete"){
    $id=$_GET["id"];
    
    include("connect.php");  
    $res=mysqli_query($conn,"delete from questions where id=$id");
    
     }
?>