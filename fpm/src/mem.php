<?
# From https://bitbook.io/testing-memory-allocation-in-php/
function tryMem($mbyte){
    $bytes = 1048576;
    echo("\tAllocate Attempt {$mbyte} MBs\n");
    $dummy = str_repeat("0", $bytes*$mbyte);
    echo("Current Memory Use: " . memory_get_usage(true)/$bytes . ' MBs');
    echo("\tPeak Memory Use: " . memory_get_peak_usage(true)/$bytes . ' MBs');
    echo("\n");
}
for($i=10;$i<1000;$i+=50){
    $limit = $i.'M';
    ini_set('memory_limit', $limit); 
    echo("Memory limit set to: ". ini_get("memory_limit"));
    tryMem($i-10);
}
?>
