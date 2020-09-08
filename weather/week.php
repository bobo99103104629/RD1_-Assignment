<?php
if (isset($_POST["submit3"])) {
    $citySite= $_POST["citySite"];
    $cityName = $second["$citySite"];
    $_SESSION["citySite"]= $citySite;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
            一週天氣（逐12小時更新）
        </a>
     </div>
    </nav>'."<br>";
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityName&elementName=WeatherDescription","rb");


    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);

    foreach ($content->records->locations[0]->location[0]->weatherElement[0]->time as $key => $value) {
        $strtime = $value->startTime;
        $endtime = $value->endTime;
        $weather = $value->elementValue[0]->value;
        echo "開始時間：".$strtime."<br>";
        echo "結束時間：".$endtime ."<br>";
        echo $weather."<hr>";
        
        $sql = "DELETE FROM `week` WHERE `week`.`strtime` = '$strtime'";
        require("connDB.php");
        mysqli_query($link, $sql);
        $sql = "INSERT INTO `week`
        (cityName, strtime, endtime, weather)
        VALUES( '$cityName','$strtime', '$endtime', '$weather')";    
        require("connDB.php");
        mysqli_query($link, $sql);
    }
} 
?>  