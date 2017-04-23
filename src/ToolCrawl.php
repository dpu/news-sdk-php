<?php

namespace Cn\Xu42\DlpuNews;

/**
 * 工具 网页抓取
 * Class ToolCrawl
 * @package Xu42\DlpuNews
 */
class ToolCrawl
{
    /**
     * @var null Url
     */
    protected $url = null;

    /**
     * 一个简单的封装CURL网络请求的函数
     * @param $url      string Url
     * @return mixed 网页源代码
     * @throws SystemException
     */
    protected function myCurl($url)
    {
        $headers = array('Referer:'.$url, 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $content = curl_exec($ch);
        curl_close($ch);
        if ($content === false) throw new SystemException('网络请求超时');
        return $content;
    }

    /**
     * 正则解析网页
     * @param $content
     * @return mixed
     */
    protected function re($content)
    {
        preg_match_all('/more_list">(.*?)<\/ul>/s', $content, $match_ul);
        preg_match_all('/href="(.*?)" .*?">(.*?)</s', $match_ul[1][0], $match_li);

        foreach ($match_li[0] as $key => $value) {
          $list[$key]['title'] = mb_convert_encoding($match_li[2][$key], 'UTF-8', 'GB2312');
          $list[$key]['url']   = Config::$config['url_index'] . $match_li[1][$key];
        }
        return $list;
    }
}
