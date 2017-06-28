<?php
/*
 +----------------------------------------------------------------------
 + Title        : PHP算法大全 - 4 - 快速排序
 + Author       : 小黄牛
 + Version      : V1.0.0.1
 + Initial-Time : 2017-6-28 16:07
 + Last-time    : 这个文件最后修改的时间 + 修改人的名称
 + Desc         : 
 +----------------------------------------------------------------------
*/

# 声明PHP编码
header("Content-type: text/html; charset=utf-8");

/**
 * 快速排序
 * @param array $array 排序数组
 * @return array 排序后的内容
 */
function quick_sort($array=[]){
    # 数组个数
    $length = count($array);
    # 必须有2条数据以上，才能做排序
    if ($length <= 1) {
        return $array;
    }

    # 默认是以头尾基准
    $key = $array[0];

    $left  = []; // 小于基准的数存入这里
    $right = []; // 大于基准的数存入这里
    
    # 遍历，除了基准外的所有数，按照大小关系存入左右数组内
    for ($i=1; $i<$length; $i++) {
        if ($key > $array[$i]) {
            $left[]  = $array[$i];
        } else {
            $right[] = $array[$i]; 
        }
    } 
    # 再分别对左边 和 右边的数组，进行相同的排序处理方式递归调用自身函数
    $left  = quick_sort($left);
    $right = quick_sort($right);

    # 主要排序是运用array_merge函数的重新排列功能
    return array_merge($left, [$key], $right);
}

# 测试数组
$array  = [1, 0, 90, 78, 110, 66, 176, 300,2]; 

echo '<pre>';
var_dump(quick_sort($array));
echo '</pre>';