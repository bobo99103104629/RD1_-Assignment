
<?php
if (isset($_POST["submit4"])) {
    $cityname= $_POST["cityname"]; 
    $_SESSION["cityname"]= $cityname;
    echo 
    '<nav class=" navbar-dark " style="background:rgba(62,63,58,1);">
     <div class="text-center">
        <a class="navbar-brand align-middle" style="color:white">
            累積雨量
        </a>
     </div>
    </nav>'."<br>";
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=RAIN,HOUR_24","rb");


    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);
    
    if ($content->records->location[0]->weatherElement[0]->elementValue != "-999.00"){
        echo "過去1小時雨量：";
        echo $content->records->location[0]->weatherElement[0]->elementValue."毫米". "<hr>";
    }
    else if ($content->records->location[0]->weatherElement[0]->elementValue != "-998.00"){
        echo "過去1小時雨量：當前沒有數據<hr>";
    }else{
        echo "過去1小時雨量：當前沒有數據<hr>";
    }

    if ($content->records->location[0]->weatherElement[1]->elementValue != "-999.00"){
        echo "24小時雨量：";
        echo $content->records->location[0]->weatherElement[1]->elementValue."毫米". "<hr>";
    }
    else if ($content->records->location[0]->weatherElement[1]->elementValue != "-998.00"){
        echo "24小時雨量：當前沒有數據<hr>";
    }else{
        echo "24小時雨量：當前沒有數據<hr>";
    }
}
 
?>