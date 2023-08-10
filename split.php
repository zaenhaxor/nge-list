<?php

$banner = " 
               ********************************
               *           Spliting           *
               *      about.me/zaenhxr        *
               *  Usage:                      *
               *  php split.php file.txt      *
               ********************************\n";
function split($url) {
    $parsing = parsing($url);
    $host = $parsing['host'];
    return $host;
}
if ($argc != 2) {
    echo "$banner";
    exit(1);
}
$input = $argv[1];
if (!file_exists($input)) {
    echo "$input not found.\n";
    exit(1);
}
$urls = file($input, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$domain = [];
foreach ($urls as $url) {
    $domain[] = split($url);
}
$out = 'split.txt';
$file = implode("\n", $domain);
file_put_contents($out, $file);
?>
