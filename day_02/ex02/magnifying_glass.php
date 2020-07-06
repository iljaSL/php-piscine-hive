#!/usr/bin/php
<?php
function error_args() {
    echo "usage: ./magnifying_glass.php page.html > new_page.html\n";
    exit (1);
}

if ($argc < 2 || !file_exists($argv[1]))
    error_args();
$f = fopen($argv[1], 'r');
$page = "";
while ($f && !feof($f)) {
	$page .= fgets($f);
}

function second($matches) {
	return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
}

function first($matches) {
	// text between "" after title=
	$matches[0] = preg_replace_callback("/( title=\")(.*?)(\")/mi", "second", $matches[0]);
	// text between > <
	$matches[0] = preg_replace_callback("/(>)(.*?)(<)/si", "second", $matches[0]);
	return ($matches[0]);
}
// text between <a tags without line break.
$page = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/si", "first", $page);
echo $page;

?>