<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
set_time_limit(1);
ini_set("memory_limit","2M");
function cmp($a, $b)
{
    if ($a["rate"] == $b["rate"]) {
        return 0;
    }
    return ($a["rate"] > $b["rate"]) ? -1 : 1;
}
 
include("gac.php");
 
// $text = array("k", "i", "t", "e", "t", "u");
$text = "hello world";
$my_ga = new Gac($text);

 
$first_gene_code = $my_ga->execute();