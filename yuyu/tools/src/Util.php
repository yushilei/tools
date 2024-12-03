<?php

namespace Yuyu\Tools;



class Util
{

    /**
     * 获取语义化时间
     * @param $time
     * @return false|string
     */
    public static function humanDate($time)
    {
        $timestamp = is_numeric($time) ? $time : strtotime($time);
        $dur = time() - $timestamp;
        if ($dur < 0) {
            return date('Y-m-d', $timestamp);
        } else {
            if ($dur < 60) {
                return $dur . '秒前';
            } else {
                if ($dur < 3600) {
                    return floor($dur / 60) . '分钟前';
                } else {
                    if ($dur < 86400) {
                        return floor($dur / 3600) . '小时前';
                    } else {
                        if ($dur < 2592000) { // 30天内
                            return floor($dur / 86400) . '天前';
                        } else {
                            return date('Y-m-d', $timestamp);;
                        }
                    }
                }
            }
        }
        return date('Y-m-d', $timestamp);
    }

    /**
     * 格式化文件大小
     * @param $file_size
     * @return string
     */
    public static function formatBytes($file_size): string
    {
        $size = sprintf("%u", $file_size);
        if($size == 0) {
            return("0 Bytes");
        }
        $size_name = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        return round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $size_name[$i];
    }

}
