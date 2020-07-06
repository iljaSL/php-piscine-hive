#!/usr/bin/php
<?PHP

if ($argc != 2)
	exit ("Exit, wrong nbr of args!\n");
$url = preg_replace('/\/$/', '', $argv[1]);
if (!$page = file_get_contents($url))
	exit("Page doesn't exist!\n");
preg_match_all("/<img .*?>/", $page, $tab);
$stock = $tab[0];
preg_match("/[^\/]*\$/", $url, $folder_tab);
$folder = $folder_tab[0] . "/";
if (file_exists($folder))
	exit ("Folder " . $folder ." exists already!\n");
mkdir($folder);
foreach ($stock as $img) {
	preg_match("/src=[\"'].*?[\"']/", $img, $src_tab);
	$src = substr($src_tab[0], 5, -1);
	preg_match("/[^\/]*\$/", $src, $name_tab);
	$name = $name_tab[0];
	if (preg_match("/http?.:\/\//", $src))
		copy($src, $folder . $name);
	else
		copy($argv[1] . "/" . trim($src, "/"), $folder . $name);
}

?>