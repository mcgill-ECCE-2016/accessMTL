<?php

$csv = array_map('str_getcsv', file('access.csv'));

$lengthArray = sizeof($csv);


// Top of KML File ========================================================================================================================================================
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">';
$kml[] = ' <Document id="arts" xsi:schemaLocation="http://www.opengis.net/kml/2.2 http://schemas.opengis.net/kml/2.2.0/ogckml22.xsd http://www.google.com/kml/ext/2.2 http://code.google.com/apis/kml/schema/kml22gx.xsd">';
$kml[] = ' <name>Montreal_Accessibility</name>';

$kml[] = ' 	<Style id="pingreen">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://maps.google.com/mapfiles/kml/pushpin/grn-pushpin.png</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';
$kml[] = ' 	<Style id="pinred">';
$kml[] = ' 	<IconStyle>';
$kml[] = ' 		<color>ffffffff</color>  ';
$kml[] = ' 		<colorMode>normal</colorMode> ';
$kml[] = ' 		<scale>1</scale>';
$kml[] = '      <heading>0</heading>';
$kml[] = ' 		<Icon>';
$kml[] = ' 			<href>http://maps.google.com/mapfiles/kml/pushpin/red-pushpin.png</href>';
$kml[] = ' 		</Icon>';
$kml[] = ' 	</IconStyle>';
$kml[] = ' 	</Style>';

//  ************************** Buildings that are monitored ******************************
for ($i=1;$i<$lengthArray;$i++) {
$kml[] = ' 	<Placemark id="' . $csv[$i][0] .'">';
$kml[] = ' 		<name>' . $csv[$i][0] . '</name>';
// description balloon info here
$kml[] = '			<description><![CDATA[<html xmlns:fo="http://www.w3.org/1999/XSL/Format" xmlns:msxsl="urn:schemas-microsoft-com:xslt"> ';
$kml[] = ' 	<body> ';
$kml[] = '	<h1>' . $csv[$i][0] .'</h1>';
$kml[] = '	<i>' . $csv[$i][6] .'</i><br><br>';
$kml[] = '    <br><br>';
$kml[] = '    <b>Universal Access Points:</b>' . $csv[$i][1].'';
$kml[] = '    <b>Number of Elevators:</b>' . $csv[$i][2] .'<br>';
$kml[] = '    <b>Heating Type:</b>' . $csv[$i][3] .'<br>';
$kml[] = '    <b>Address:</b>' . $csv[$i][0].'<br>';
$kml[] = '    <br><br>';
$kml[] = '    <img width="200" src="http://www.accessmtl.ca/images/accessMTLbanner400x50.png">';
$kml[] = ' 		</body> ';
$kml[] = ' 		</html>]]> ';
$kml[] = '		</description>';
if ($csv[$i][1] == "NON")
{
	$kml[] = '<styleUrl>#pinred</styleUrl>';
}
if ($csv[$i][1] != "NON")
{
	$kml[] = '<styleUrl>#pingreen</styleUrl>';
}
$kml[] = ' <Point>';
$kml[] = '     <coordinates>' . $csv[$i][4] . ',' . $csv[$i][5] . ',0 </coordinates>';
$kml[] = ' </Point>';
$kml[] = '</Placemark>';
$kml[] = ' ';
}

$kml[] = ' </Document>';
$kml[] = ' </kml>';
// close .kml document
$kmlOutput = join("\n", $kml);
header('Content-Disposition: attachment; filename="Montreal_Accessiblity.kml"');
echo $kmlOutput;

?>