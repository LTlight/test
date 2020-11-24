<?php
// +----------------------------------------------------------------------
// | PHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.kexin.com.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: liutao <liut1@haiweikexin.com>
// | Date  : 2020/11/24
// +----------------------------------------------------------------------

require dirname(__DIR__) . '/src/Light.php';

class LightTest extends PHPUnit\Framework\TestCase
{
    public function testGetInvalidUrls()
    {
        $urls = [
            'http://www.baidu.com',
            'https://github.com',
            'https://www.igetget.com'
        ];
        $light = new \LightPP\Light($urls);
        $light->getInvalidUrls();
    }
}
