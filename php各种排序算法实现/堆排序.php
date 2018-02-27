<?php
/**
 * Created by PhpStorm.
 * User: tanjj
 * Date: 2018/2/26
 * Time: 22:15
 */

function heap_sort(&$arr, $len)
{
    for ($i = $len - 1; $i > 0; $i--) {
        swap($arr[0], $arr[$i]);
        heapAdjust($arr, 0, $i);
    }
}

function heapBuild(&$arr, $len)
{
    for ($j = floor($len / 2) - 1; $j >= 0; $j--) {
        heapAdjust($arr, $j, $len);
    }
}

function heapAdjust(&$arr, $start, $end) //调整大堆
{
    for ($i = 2 * $start + 1; $i < $end; $i = 2 * $i + 1) {
        if ($i + 1 < $end && $arr[$i] < $arr[$i + 1]) {
            $i = $i + 1;
        }
        if ($arr[$start] < $arr[$i]) {
            swap($arr[$start], $arr[$i]);
        }
        $start = $i;
    }

}

function swap(&$t1, &$t2)
{
    $temp = $t2;
    $t2 = $t1;
    $t1 = $temp;
    return;
}
