<?php

$doc = new DOMDocument();
$file = "index.html";

if($doc->loadHTMLFile($file)){
    $span = $doc->getElementsByTagName('span')->item(0);
    
    $count = $span->textContent;
    $count++;
    
    $doc->getElementsByTagName('span')->item(0)->nodeValue = $count;
    $doc->saveHTMLFile($file);
    
    echo "File Updated";
    
}
else{
    return false;
    echo "NOt Updated";
}

    ?>