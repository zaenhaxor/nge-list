<?php
function split_v2($url) {
    $parsing = parse_url($url);
    $result = '';
    if (isset($parsing['scheme'])) {
        $result .= $parsing['scheme'] . '://';
    }
    if (isset($parsing['host'])) {
        $result .= $parsing['host'];
    }
    return $result;
}
if ($argc != 2) {
    echo "Usage: php splitv2.php <file.txt>\n";
    exit(1);
}
$input = $argv[1];
$urls = file($input, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (!$urls) {
    echo "File empty or not found.\n";
    exit(1);
}
$results = [];
foreach ($urls as $url) {
    $result = split_v2($url);
    $results[$result] = true;
}
$filter = array_keys($results);
file_put_contents('splitv2.txt', implode("\n", $filter));
?>
