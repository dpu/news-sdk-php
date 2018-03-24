<?php

require 'vendor/autoload.php';

$eduNews = new \Org\DLPU\EduNews\EduNews();

var_dump($eduNews->currentEvents());
var_dump($eduNews->notice());
var_dump($eduNews->teachingFiles());
