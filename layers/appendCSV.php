<?php

$handle= fopen('uas_db.csv', 'a');

$name = $_GET['name'];

$line[0] = 'borough'; //borough
$line[1] = $name; //service category
$line[2] = $name; // official name
$line[3] = $_GET['address']; //street address
$line[4] = $_GET['postal_code']; //postal code
$line[5] = $_GET['city']; //city
$line[6] = 'Quebec'; //province
$line[7] = $_GET['ACC_autodoor'];
$line[8] = $_GET['ACC_entrRamp'];
$line[9] = $_GET['ACC_streetlevel'];
$line[10] = $_GET['ACC_stairs'];
$line[11] = $_GET['ACC_elevator'];
$line[12] = $_GET['WR_streetlevel'];
$line[13] = $_GET['WR_rails'];
$line[14] = $_GET['WR_gender_neutral'];

$wrsize = $_GET['WR_size'];

if ($wrsize == "s")
{
	$line[15] = 0;	
}
if ($wrsize == "m")
{
	$line[15] = 1;	
}
if ($wrsize == "l")
{
	$line[15] = 2;	
}


$line[16] = $_GET['WR_change_table'];
$line[17] = $_GET['WR_family'];
$line[18] = $_GET['INC_lang'];
$line[19] = $_GET['INC_staff'];
$line[20] = $_GET['INC_braille'];
$line[21] = $_GET['INC_family'];
$line[22] = 'access needs input';
$line[23] = $_GET['OVER_comments'];
$line[24] = $_GET['telephone'];  //
$line[25] = $_GET['website'];
$line[26] = $_GET['formLat'];
$line[27] = $_GET['formLng'];
$line[28] = $_GET['desc'];

$line = str_replace("%20", " ", $line);


fputcsv($handle, $line);

fclose($handle);

?>
