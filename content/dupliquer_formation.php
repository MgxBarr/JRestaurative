<?php
//duplique la page de formation
$page_origine = "../formation-1.php";
$nouvelle_page ="../".$_POST['file'].".php";

//duplique le json associé au texte
$pagejson_origine = 'json/formation-1.json'; 
$nouvelle_pagejson ='json/'.$_POST['file'].".json";

//duplique le json associé au dates
$pagejson_dates_origine = 'json/formation-1-dates.json'; 
$nouvelle_pagejson_dates ='json/'.$_POST['file']."-dates.json";

$content = file_get_contents($page_origine);
file_put_contents($nouvelle_page, $content);

$contentjson = file_get_contents($pagejson_origine);
file_put_contents($nouvelle_pagejson, $contentjson);

$contentjson = file_get_contents($pagejson_dates_origine);
file_put_contents($nouvelle_pagejson_dates, $contentjson);

echo "Page dupliquée avec succès.";
?>
