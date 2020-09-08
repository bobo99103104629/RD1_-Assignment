<?php
if (isset($_POST["submit4"])) {
    $citySite= $_POST["citySite"]; 
    $cityName = $second["$citySite"];
    $_SESSION["citySite"]= $citySite;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
            累積雨量
        </a>
     </div>
    </nav>'."<br>";
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&elementName=RAIN,HOUR_24&parameterName=CITY,TOWN","rb");

    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }

    fclose($handle);
    $content = json_decode($content);
    $sql = "DELETE FROM `rain` WHERE `rain`.`cityName` = '$cityName'";
    require("connDB.php");
    mysqli_query($link, $sql);
    foreach ($content->records->location as $key => $value){ 
        if ($value->parameter[0]->parameterValue == $cityName){            
        $allSite = $value->locationName;         
        $cityName = $value->parameter[0]->parameterValue;
        $town = $value->parameter[1]->parameterValue;             
        $rainHour = $value->weatherElement[0]->elementValue;
        $rainDay = $value->weatherElement[1]->elementValue;
        $obsTime = $value->time->obsTime;
        echo "站台:".$allSite."<br>";
        echo "地區:".$town."<br>";
        if ($rainHour == "-999.00"){
            echo "1小時雨量：當前沒有數據<br>";
        }else if($rainHour == "-998.00"){
            echo "1小時雨量：0<br>";
        }else{
            echo "1小時雨量：$rainHour<br>";
        } 
        if ($rainDay != "-999.00"){
            echo "24小時雨量：$rainDay";
            echo "<br>";
        }else{
            echo "24小時雨量：當前沒有數據<br>";
        }
        echo "更新時間：".$obsTime."<hr>";      
        $sql = "
        INSERT INTO rain(cityName,allSite,town,rainHour,rainDay,obsTime)
        VALUES( 
        '$cityName','$allSite','$town','$rainHour','$rainDay','$obsTime'
        )";
        require("connDB.php");
        mysqli_query($link, $sql);
        }
    }
    
    
}
 
?>