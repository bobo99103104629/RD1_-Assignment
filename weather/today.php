<?php
if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    $_SESSION["cityname"]= $cityname;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
        當前天氣
        </a>
     </div>
    </nav>'."<br>";
    if($cityname == "苗栗") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }else if($cityname == "斗六") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }else if($cityname == "香山") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }else if($cityname == "臺南") {
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&stationId=467410&elementName=TEMP&parameterName=CITY","rb");
    }
    else{
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }

    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);
    {echo "更新時間：".$content->records->location[0]->time->obsTime."<hr>";
    $uptime = $content->records->location[0]->time->obsTime;
    }
    foreach ($content->records->location[0]->weatherElement as $key => $value) {
        
        {echo "當前溫度：$value->elementValue" . "°C". "<hr>"; 
        $temp = $value->elementValue;
        }
    }
}  
if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    $cityname2 = $twoDays["$cityname"];
    $_SESSION["cityname"]= $cityname;
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname2&elementName=Wx","rb");

    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);
    {echo "當前天氣：". $content->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value."<hr>";
    $weather = $content->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value;
    }
    // $sql = "
    // update TODAY set
    // uptime = '$uptime', 
    // temp=$temp, 
    // weather = '$weather',
    // where citySit = '$cityname'
    // ";

    // require("connDB.php");
    // mysqli_query($link, $sql);
  
} 
if (isset($_POST["submit"])) {
    $cityname=$_POST["cityname"];
    $sql = "
    update TODAY set
    uptime = '$uptime', 
    temp=$temp, 
    weather = '$weather',
    where citySit = '$cityname'
    ";

    require("connDB.php");
    mysqli_query($link, $sql);
}
?>