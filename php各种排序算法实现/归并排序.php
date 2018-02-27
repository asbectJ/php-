<?php
/**
 * Created by PhpStorm.
 * User: tanjj
 * Date: 2018/2/26
 * Time: 22:13
 */

//归并排序
function guibing($arr, $n = 0)
{
    static $ret;
    $len = count($arr);
    $b = array();
    for ($j = 0; $j < $len; $j = $j + 2) {
        if ($j + 1 >= $len) {
            $b[] = merge($arr[$j], array(), $n);
            break;
        }
        $b[] = merge($arr[$j], $arr[$j + 1], $n);
    }

    if (count($b) == 1) {
        /* var_dump($n);
         var_dump($b);*/
        $ret = $b[0];
        return $ret;
    }
    guibing($b, $n);
    return $ret;
    /* var_dump($b);*/
}

function merge($a, $b, &$n)
{
    if (!is_array($a)) {
        $a = array($a);
    }

    if (!is_array($b)) {
        $b = array($b);
    }

    $i = 0;
    $j = 0;
    $r = array();
    while (1) {

        if (!isset($a[$i])) {

            while(isset($b[$j])){
                $r[] = $b[$j];
                unset($b[$j]);
                $j++;
            }
            //$r = array_merge($r, $b);
            break;
        }

        if (!isset($b[$j])) {

            while(isset($a[$i])){
                $r[] = $a[$i];
                unset($a[$i]);
                $i++;
            }

            //$r = array_merge($r, $a);
            break;
        }

        $n++;
        if ($a[$i] > $b[$j]) {
            $r[] = $b[$j];
            unset($b[$j]);
            $j++;
        } else {
            $r[] = $a[$i];
            unset($a[$i]);
            $i++;
        }
    }
    return $r;
}