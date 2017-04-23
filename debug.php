<?php

require 'vendor/autoload.php';

$dlpuNews = new \Cn\Xu42\DlpuNews\DlpuNews();

var_dump($dlpuNews->currentEvents());
var_dump($dlpuNews->notice());
var_dump($dlpuNews->teachingFiles());
