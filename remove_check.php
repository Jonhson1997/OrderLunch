<?php
$cat = 'remove_check';
include('_header.php');
if(!isset($_POST))
{
	echo "<script>alert('錯誤');window.location=\"remove.php\";</script>";
	exit();
}

if($_POST['cat'] == 'food')
{
	$target_dir = "./food/";
}
else if($_POST['cat'] == 'drink')
{
	$target_dir = "./drink/";
}
$target_file_name = basename($_POST['id'].".jpg");
$target_file = $target_dir . $target_file_name;
unlink($target_file);

$data = file_get_contents($_POST['cat'].'.json');
$data_Arr = json_decode($data,true);
unset($data_Arr[$_POST['id']]);
$data_Arr = array_values($data_Arr);
$file = fopen($_POST['cat'].".json","w");
fwrite($file,json_encode($data_Arr));
fclose($file);

$data_tel = file_get_contents($_POST['cat'].'_tel.json');
$data_Arr = json_decode($data_tel,true);
unset($data_Arr[$_POST['id']]);
$data_Arr = array_values($data_Arr);
$file = fopen($_POST['cat']."_tel.json","w");
fwrite($file,json_encode($data_Arr));
fclose($file);

$data_memo = file_get_contents($_POST['cat'].'_memo.json');
$data_Arr = json_decode($data_memo,true);
unset($data_Arr[$_POST['id']]);
$data_Arr = array_values($data_Arr);
$file = fopen($_POST['cat']."_memo.json","w");
fwrite($file,json_encode($data_Arr));
fclose($file);
echo "<script>alert('".$target_file_name." 刪除成功!');window.location=\"remove.php\";</script>";
exit();