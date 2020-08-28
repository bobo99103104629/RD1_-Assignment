<?php
if (isset($_POST["submit"])) {
    $citySite= $_POST["citySite"];
    $cityName = $second["$citySite"];
    $_SESSION["citySite"]= $citySite;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
        當前天氣概況
        </a>
     </div>
    </nav>'."<br>";
    if($citySite == "苗栗") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$citySite&elementName=TEMP&parameterName=CITY","rb");
    }else if($citySite == "斗六") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$citySite&elementName=TEMP&parameterName=CITY","rb");
    }else if($citySite == "香山") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$citySite&elementName=TEMP&parameterName=CITY","rb");
    }else if($citySite == "臺南") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&stationId=467410&elementName=TEMP&parameterName=CITY","rb");
    }
    else{
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$citySite&elementName=TEMP&parameterName=CITY","rb");
    }
    $handle2 = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityName&elementName=Wx","rb");

    $content = "";
    $content2 = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    while (!feof($handle2)) {
        $content2 .= fread($handle2, 10000);
}

    fclose($handle);
    $content = json_decode($content);
    $uptime = $content->records->location[0]->time->obsTime;
    foreach ($content->records->location[0]->weatherElement as $key => $value) {
        $temp = $value->elementValue;
    }
    fclose($handle2);
    $content2 = json_decode($content2);
    $weather = $content2->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value;
    echo "當前天氣：".$weather."<hr>";
    echo "當前溫度：".$temp . "°C"."<hr>";
    echo "更新時間：".$uptime. "<hr>";
    //更新資料
    $sql = "
    UPDATE `TODAY` SET
    citySite = '$citySite',
    uptime = '$uptime', 
    temp = $temp, 
    weather = '$weather'
    where citySite = '$citySite'
    ";
    
    require("connDB.php");
    mysqli_query($link, $sql);
    
}  

  

?>