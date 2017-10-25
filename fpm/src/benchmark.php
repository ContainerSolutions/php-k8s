<?php

/*
  PHP Benchmark
  Downloaded from: http://onlinephpfunctions.com
 */

class benchmark
{

    function benchmark()
    {

        $totalTime = 0;
        $head = str_pad("#", 40, "#");
        echo "<pre>$head\n|" . str_pad("PHP BENCHMARK", 38, " ", STR_PAD_BOTH) . "|\n$head\nStart : " . date("m/d/Y H:i:s a") . "\nServer : {$_SERVER['SERVER_NAME']}@{$_SERVER['SERVER_ADDR']}\nPHP version : " . PHP_VERSION . "\nPlatform : " . PHP_OS . "\n$head\n";

        $totalTime = $totalTime + $this->benchmark_Math();
        $totalTime = $totalTime + $this->benchmark_StringManipulation();
        $totalTime = $totalTime + $this->benchmark_Loops();
        $totalTime = $totalTime + $this->benchmark_IfElse();


        echo str_pad("#", 40, "#") . "\n" . str_pad("Total:", 27) . " : " . number_format($totalTime, 3) . " sec.</pre>";
    }

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    function benchmark_Math($runCount = 150000)
    {
        $startTime = $this->microtime_float();
        $functions = array("abs", "acos", "asin", "atan", "bindec", "floor", "exp", "sin", "tan", "pi", "is_finite", "is_nan", "sqrt");
        for ($i = 0; $i < $runCount; $i++) {
            foreach ($functions as $function) {
                 call_user_func_array($function, array($i));
            }
        }
        $time = $this->microtime_float() - $startTime;
        echo str_pad("Math", 27) . " : " . number_format($time, 3) . " sec.\n";
        return $time;
    }

    function benchmark_StringManipulation($runCount = 150000)
    {
        $startTime = $this->microtime_float();
        $functions = array("addslashes", "chunk_split", "metaphone", "strip_tags", "md5", "sha1", "strtoupper", "strtolower", "strrev", "strlen", "soundex", "ord");
        $string = "the quick brown fox jumps over the lazy dog";
        for ($i = 0; $i < $runCount; $i++) {
            foreach ($functions as $function) {
                 call_user_func_array($function, array($string));
            }
        }
        $time = $this->microtime_float() - $startTime;
        echo str_pad("String Manipulation", 27) . " : " . number_format($time, 3) . " sec.\n";
        return $time;
    }

    function benchmark_Loops($runCount = 10000000)
    {
        $startTime = $this->microtime_float();
        for ($i = 0; $i < $runCount; ++$i)
            ;
        $i = 0;
        while ($i < $runCount)
            ++$i;
        $time = $this->microtime_float() - $startTime;
        echo str_pad("Loops", 27) . " : " . number_format($time, 3) . " sec.\n";
        return $time;
    }

    function benchmark_IfElse($runCount = 10000000)
    {
        $startTime = $this->microtime_float();
        for ($i = 0; $i < $runCount; $i++) {
            if ($i == -1) {
                
            } elseif ($i == -2) {
                
            } else if ($i == -3) {
                
            }
        }
        $time = $this->microtime_float() - $startTime;
        echo str_pad("If/Else", 27) . " : " . number_format($time, 3) . " sec.\n";
        return $time;
    }

}

new benchmark();
