<?php
$cat = 'add_check';
include('_header.php');
if(!isset($_POST))
{
	echo "<script>alert('錯誤');window.location=\"add.php\";</script>";
	exit();
}

if($_POST['cat'] == 'food')
{
	$target_dir = "./food/";
	$target_file_name = basename(count($food_Arr_zh).".jpg");
}
else if($_POST['cat'] == 'drink')
{
	$target_dir = "./drink/";
	$target_file_name = basename(count($drink_Arr_zh).".jpg");
}
$target_file = $target_dir . $target_file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        // echo "The file ". basename(count($food_Arr_zh).".jpg"). " has been uploaded.";
		$data = file_get_contents($_POST['cat'].'.json');
		$data_Arr = json_decode($data,true);
		array_push($data_Arr,addslashes($_POST['name']));
		$file = fopen($_POST['cat'].".json","w");
		fwrite($file,json_encode($data_Arr));
		fclose($file);

		$data_tel = file_get_contents($_POST['cat'].'_tel.json');
		$data_Arr = json_decode($data_tel,true);
		array_push($data_Arr,addslashes($_POST['tel']));
		$file = fopen($_POST['cat']."_tel.json","w");
		fwrite($file,json_encode($data_Arr));
		fclose($file);

		$data_memo = file_get_contents($_POST['cat'].'_memo.json');
		$data_Arr = json_decode($data_memo,true);
		array_push($data_Arr,addslashes($_POST['memo']));
		$file = fopen($_POST['cat']."_memo.json","w");
		fwrite($file,json_encode($data_Arr));
		fclose($file);
		echo "<script>alert('".$target_file_name." 上傳成功!');window.location=\"add.php\";</script>";
		exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
exit();