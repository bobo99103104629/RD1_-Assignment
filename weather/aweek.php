<?php
if (isset($_POST["submit3"])) {
    $cityname= $_POST["cityname"];
    $cityname2 = $twoDays["$cityname"];
    $_SESSION["cityname"]= $cityname;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
            一週天氣
        </a>
     </div>
    </nav>'."<br>";
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname2&elementName=WeatherDescription","rb");


    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);

    foreach ($content->records->locations[0]->location[0]->weatherElement[0]->time as $key => $value) {
        echo "開始時間:".$value->startTime."<br>結束時間".$value->endTime."<br>";
        echo $value->elementValue[0]->value."<hr>";

    }
} 
?>  