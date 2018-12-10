<?php
// 快排
function quickSort($arr)
{
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //选择一个标尺,通常选择第一个元素
    $base_num = $arr[0];
    //初始化
    $left = array();//小于标尺的
    $right = array();//大于标尺的
    for($i=1;$i<$length;$i++) {
        if($base_num > $arr[$i]) {
            $left[] = $arr[$i];
        }else {
            $right[] = $arr[$i];
        }
    }
    //递归调用并记录
    $left = quickSort($left);
    $right = quickSort($right);
    //合并
    return array_merge($left, array($base_num), $right);
}

$arr = array(12, 100, 3, 20, 11,50);

print_r(quickSort($arr));

// 冒泡排序
function bubbleSort($arr)
{
    $len = count($arr);
    for($i = 1; $i < $len; $i++) {
        for($k = 0; $k < $len - $i; $k++) {
            if($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }

    return $arr;
}

print_r(bubbleSort($arr));

// 插入排序
function insertSort($arr)
{
    $len = count($arr);

    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($tmp < $arr[$j]) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                break;
            }
        }
    }

    return $arr;
}

// 选择排序
function selectSort($arr)
{
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $p = $i;

        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$p] > $arr[$j]) {
                $p = $j;
            }
        }

        $tmp = $arr[$p];
        $arr[$p] = $arr[$i];
        $arr[$i] = $tmp;
    }

    return $arr;
}

// 归并排序
function merge_sort(array $lists)
{
    $n = count($lists);
    if ($n <= 1) {
        return $lists;
    }
    $left = merge_sort(array_slice($lists, 0, floor($n / 2)));
    $right = merge_sort(array_slice($lists, floor($n / 2)));
    $lists = merge($left, $right);
    return $lists;
}

function merge(array $left, array $right)
{
    $lists = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $lists[] = $left[$i];
            $i++;
        } else {
            $lists[] = $right[$j];
            $j++;
        }
    }
    $lists = array_merge($lists, array_slice($left, $i));
    $lists = array_merge($lists, array_slice($right, $j));
    return $lists;
}

// 堆排序