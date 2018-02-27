<?php
/**
 * Created by PhpStorm.
 * User: tanjj
 * Date: 2018/2/26
 * Time: 22:12
 */

//快速排序 (不稳定)_
function quick($arr)
{
    if (!is_array($arr)) {
        return $arr;
    }
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }
    $left = $right = array();
    for ($i = 1; $i < $len; $i++) {
        if ($arr[$i] < $arr[0]) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    $left = quick($left);
    $right = quick($right);
    /*var_dump($n);*/
    return array_merge($left, array($arr[0]), $right);
}

$ret = quick($arr);
var_dump($ret);