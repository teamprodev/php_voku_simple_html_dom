<?php

use voku\helper\HtmlDomParser;

require_once './vendor/autoload.php';

$html = <<<HTML
<html lang='en'><head>
</head><body><div id='p1' class='post'>foo</div><div class='post' id='p2'>bar</div></body></html>
HTML;

$document = new HtmlDomParser($html);

$tags = $document->find('style');
foreach ($tags as $tag) {
    // INFO: here we need to use "innerhtmlKeep" instead of "innerhtml", so that we keep the svg-hack
    $tag->innerhtmlKeep .= ' .post{color: red;} ';
}

echo $document->html();
