#!/usr/bin/php
<?PHP

function error() {
    echo "Wrong Format\n";
    exit (1);
}
function get_month($month) {
    $month = strtolower($month);
    $mon_array = array(
        "janvier" => 1,
        "fevrier" => 2,
        "mars" => 3,
        "avril" => 4,
        "mai" => 5,
        "juin" => 6,
        "juillet" => 7,
        "aout" => 8,
        "septembre" => 9,
        "octobre" => 10,
        "novembre" => 11,
        "decembre" => 12
    );
    return ($mon_array[$month]);
}
if ($argc != 2)
    exit;
if (substr_count(trim($argv[1]), ' ') != 4)
    error();
$input_str = array();
$input_str = explode(' ', preg_replace('/ +/', ' ', trim($argv[1])));
if (count($input_str) != 5)
    error();
/*
 * Validating array elements.
 */
$weekday = preg_match('/^([lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche)$/', $input_str[0]);
if (!$weekday)
    error();
$day = preg_match('/^([1-9]|0[1-9]|1[1-9]|2[0-9]|3[0-1])$/', $input_str[1]);
if (!$day)
    error();
$month = preg_match('/^([jJ]anvier|[fF]evrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]out|[sS]eptembre|[oO]ctobre|[nN]ovembre|[dD]ecembre)$/', $input_str[2]);
if (!$month)
    error();
$year = preg_match('/^([0-9]{4})$/', $input_str[3]);
if (!$year)
    error();
$time = preg_match('/^(([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))$/', $input_str[4]);
if (!$time)
    error();
$date_arr = array();
$date_arr = explode(':', $input_str[4]);
if (!checkdate(get_month($input_str[2]), $input_str[1], $input_str[3]))
    error();

echo(mktime(($date_arr[0] - 1), $date_arr[1], $date_arr[2], get_month($input_str[2]), $input_str[1], $input_str[3]) . "\n");

?>