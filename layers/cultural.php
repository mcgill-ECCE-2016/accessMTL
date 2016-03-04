<?php

$csv = array_map('str_getcsv', file('cultural.csv'));

$lengthArray = sizeof($csv);


// Top of KML File ========================================================================================================================================================
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">';
$kml[] = ' <Document id="arts" xsi:schemaLocation="http://www.opengis.net/kml/2.2 http://schemas.opengis.net/kml/2.2.0/ogckml22.xsd http://www.google.com/kml/ext/2.2 http://code.google.com/apis/kml/schema/kml22gx.xsd">';
$kml[] = ' <name>Montreal_Cultural</name>';

$kml[] = ' 	<Style id="church">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/church.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

$kml[] = ' 	<Style id="library">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/library.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

$kml[] = ' 	<Style id="museum">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/museum.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

$kml[] = ' 	<Style id="community">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/community.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

$kml[] = ' 	<Style id="theatre">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/theatre.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

$kml[] = ' 	<Style id="hall">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://www.accessmtl.ca/images/icons/perform.jpg</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';
//  ************************** Buildings that are monitored ******************************
for ($i=1;$i<$lengthArray;$i++) {
$kml[] = ' 	<Placemark id="' . $csv[$i][2] .'">';
$kml[] = ' 		<name>' . $csv[$i][2] . '</name>';
// description balloon info here
$kml[] = '			<description><![CDATA[<html xmlns:fo="http://www.w3.org/1999/XSL/Format" xmlns:msxsl="urn:schemas-microsoft-com:xslt"> ';
$kml[] = ' 	<body> ';
$kml[] = '	<h1>' . $csv[$i][2] .'</h1>';
$kml[] = '	<i>' . $csv[$i][1] .'</i><br><br>';
$kml[] = '    <b>Description:</b> <br>';
$kml[] = '    ' . $csv[$i][11] .'';
$kml[] = '    <br><br>';
$kml[] = '    <b>Borough:</b>' . $csv[$i][8] .'<br>';
$kml[] = '    <b>Telephone:</b>' . $csv[$i][7] .'';
$kml[] = '    <br><br>';
$kml[] = '    <b>Borough:</b>' . $csv[$i][0] .'<br>';
$kml[] = '    <b>Address:</b> <br>';
$kml[] = '    ' . $csv[$i][3] .'<br>';
$kml[] = '    ' . $csv[$i][5] .', ' . $cs[$i][6] .'<br>';
$kml[] = '    ' . $csv[$i][4] .'';
$kml[] = '    <br><br>';
$kml[] = '    <img width="200" src="http://www.accessmtl.ca/images/accessMTLbanner400x50.png">';
$kml[] = ' 		</body> ';
$kml[] = ' 		</html>]]> ';
$kml[] = '		</description>';
if ($csv[$i][1] == "Eglise")
{
	$kml[] = '<styleUrl>#church</styleUrl>';
}
if ($csv[$i][1] == "Musee municipal")
{
	$kml[] = '<styleUrl>#museum</styleUrl>';
}
if ($csv[$i][1] == "Bibliotheque")
{
	$kml[] = '<styleUrl>#library</styleUrl>';
}
if ($csv[$i][1] == "Centre communautaire")
{
	$kml[] = '<styleUrl>#community</styleUrl>';
}
if ($csv[$i][1] == "Cinema")
{
	$kml[] = '<styleUrl>#theatre</styleUrl>';
}
if ($csv[$i][1] == "Theatre")
{
	$kml[] = '<styleUrl>#theare</styleUrl>';
}
if ($csv[$i][1] == "Salle de spectacle")
{
	$kml[] = '<styleUrl>#hall</styleUrl>';
}
$kml[] = ' <Point>';
$kml[] = '     <coordinates>' . $csv[$i][9] . ',' . $csv[$i][10] . ',0 </coordinates>';
$kml[] = ' </Point>';
$kml[] = '</Placemark>';
$kml[] = ' ';
}

$kml[] = ' </Document>';
$kml[] = ' </kml>';
// close .kml document
$kmlOutput = join("\n", $kml);
header('Content-Disposition: attachment; filename="Montreal_Cultural.kml"');
echo $kmlOutput;

?>