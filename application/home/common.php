<?php

/**
 * 生成带时间戳的静态文件地址
 * @param string $src		/public/static/下的文件路径
 * @param string $tsType	时间戳类型，可选的有：time、md5，rand
 * @param string $tsKey		url中时间戳参数key
 * @return string
 */
function getResource ($src, $tsType='time', $tsKey='ts') {
    $path = ROOT_PATH.'/public/static/' ;
    $file = $path. $src ;
    if (file_exists($file)) {
        $ts = '?ts=' ;
        if ('time' === $tsType) {
            $ts .= filemtime($file) ;
        }
        if ('md5' === $tsType) {
            $ts .= md5_file($file) ;
        }
        if ('rand' == $tsType) {
            $ts .= mt_rand() ;
        }
        $result = "/static/" . $src . $ts ;
        return $result ;
    }
    return '' ;
}
;