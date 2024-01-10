<?php

function get_crumb_array(){
	
	/*
	echo '<xmp>';
	var_export(yoast_breadcrumb('', '', false));
	echo '</xmp>';
	*/
	
	$crumb = array();
	
	//Get all preceding links before the current page
	$dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . yoast_breadcrumb('', '', false));

$items = $dom->getElementsByTagName('a');

foreach ($items as $tag){
$crumb[] = array('text' => $tag->nodeValue, 'href' => $tag->getAttribute('href'));
}

//Get the current page text and href
// $items = new DOMXpath($dom);
// $dom = $items->query('//*[contains(@class, "breadcrumb_last")]');
// $crumb[] = array('text' => $dom->item(0)->nodeValue, 'href' => trailingslashit(home_url($wp->request)));
return $crumb;
}

function crumb_nav($crumb){
$html = '';
if($crumb) {
//var_dump($crumb);
$items = count($crumb) -1;
$html = '<nav>';
    $html .= '<ol id="breadcrumbs" class="breadcrumbs display-from-md-flex">';
        foreach($crumb as $k => $v){
        $html .= '<li class="breadcrumb-list">';
            if($k == $items) {
            //If it's the last item then output the text only
            $html .= '<a href="'. $v['href'] .'" class="b-list">'. $v['text'] .'</a>';
            $html .= '</li>';
        }
        else {
        //preceding items with URLs
        $html .= '<a href="'. $v['href'] .'" class="b-list">'. $v['text'] .'</a>';
        $html .= '</li>
        <li class="divider"></li>';
        }
        }
        $html .= '
    </ol>';
    $html .= '</nav>';
}
return $html;
}