<?php
// +----------------------------------------------------------------------
// | PHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.kexin.com.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: liutao <liut1@haiweikexin.com>
// | Date  : 2020/11/24
// +----------------------------------------------------------------------

namespace LightPP;

use GuzzleHttp\Client;

class Light
{
    protected $urls;

    protected $httpClient;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->httpClient = new Client();
    }

    /**
     * 获取死链
     * @return array
     * @author LiuTao liut1@haiweikexin.com
     */
    public function getInvalidUrls()
    {
        $invalidUrls = [];
        foreach ($this->urls as $url) {
            try {
                $statusCode = $this->getStatusCodeForUrl($url);
            } catch (\Exception $e) {
                $statusCode = 500;
            }
            if($statusCode >= 400) {
                array_push($invalidUrls, [
                   'url' => $url,
                   'status' => $statusCode
                ]);
            }
        }
        return $invalidUrls;
    }

    /**
     * @param $url
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author LiuTao liut1@haiweikexin.com
     */
    protected function getStatusCodeForUrl($url)
    {
        $httpResponse = $this->httpClient->request('GET', $url);
        return $httpResponse->getStatusCode();
    }
}