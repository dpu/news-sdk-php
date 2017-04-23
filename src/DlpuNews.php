<?php

namespace Cn\Xu42\DlpuNews;


class DlpuNews extends ToolCrawl
{
    public function currentEvents()
    {
        $url = Config::$config['url_index'] . Config::$config['url_current_events'];
        return $this->get($url);
    }

    public function notice()
    {
        $url = Config::$config['url_index'] . Config::$config['url_notice'];
        return $this->get($url);
    }

    public function teachingFiles()
    {
        $url = Config::$config['url_index'] . Config::$config['url_teaching_files'];
        return $this->get($url);
    }

    protected function get($url)
    {
        $content = $this->myCurl($url);
        return $this->re($content);
    }
}
