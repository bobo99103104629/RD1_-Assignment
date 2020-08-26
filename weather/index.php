<?php
    session_start();
    if($_POST != ""){
    @$_SESSION["cityname"]=$_POST["cityname"];
    }else{
    $_SESSION["cityname"]= "";
    }
    
?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>demo</title>
</head>
<body>
<br>
<form id="lab" method="post" >
<div class="form-group row">
    <label class="col-4 col-form-label text-right" for="select">選擇縣市:</label> 
    <div class="col-4">   
        <select id="cityname" name ="cityname" class="custom-select">
        <option selected >請選擇縣市</option>
        <option <?php if($_SESSION["cityname"] == "基隆" && $_SESSION["cityname"] !=""){echo "selected";}?> value="基隆">基隆市<?php $twoDays["基隆"]="基隆市"?></option>
        <option <?php if($_SESSION["cityname"] == "臺北" && $_SESSION["cityname"] !=""){echo "selected";}?> value="臺北">臺北市<?php $twoDays["臺北"]="臺北市"?></option>
        <option <?php if($_SESSION["cityname"] == "板橋" && $_SESSION["cityname"] !=""){echo "selected";}?> value="板橋">新北市<?php $twoDays["板橋"]="新北市"?></option>
        <option <?php if($_SESSION["cityname"] == "新屋" && $_SESSION["cityname"] !=""){echo "selected";}?> value="新屋">桃園市<?php $twoDays["新屋"]="桃園市"?></option>
        <option <?php if($_SESSION["cityname"] == "香山" && $_SESSION["cityname"] !=""){echo "selected";}?> value="香山">新竹市<?php $twoDays["香山"]="新竹市"?></option>
        <option <?php if($_SESSION["cityname"] == "新竹" && $_SESSION["cityname"] !=""){echo "selected";}?> value="新竹">新竹縣<?php $twoDays["新竹"]="新竹縣"?></option>
        <option <?php if($_SESSION["cityname"] == "苗栗" && $_SESSION["cityname"] !=""){echo "selected";}?> value="苗栗">苗栗縣<?php $twoDays["苗栗"]="苗栗縣"?></option>
        <option <?php if($_SESSION["cityname"] == "臺中" && $_SESSION["cityname"] !=""){echo "selected";}?> value="臺中">臺中市<?php $twoDays["臺中"]="臺中市"?></option>
        <option <?php if($_SESSION["cityname"] == "田中" && $_SESSION["cityname"] !=""){echo "selected";}?> value="田中">彰化縣<?php $twoDays["田中"]="彰化縣"?></option>
        <option <?php if($_SESSION["cityname"] == "日月潭" && $_SESSION["cityname"] !=""){echo "selected";}?> value="日月潭">南投縣<?php $twoDays["日月潭"]="南投縣"?></option>
        <option <?php if($_SESSION["cityname"] == "斗六" && $_SESSION["cityname"] !=""){echo "selected";}?> value="斗六">雲林縣<?php $twoDays["斗六"]="雲林縣"?></option>
        <option <?php if($_SESSION["cityname"] == "嘉義" && $_SESSION["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市<?php $twoDays["嘉義"]="嘉義市"?></option>
        <option <?php if($_SESSION["cityname"] == "阿里山" && $_SESSION["cityname"] !=""){echo "selected";}?> value="阿里山">嘉義縣（阿里山）<?php $twoDays["阿里山"]="嘉義縣"?></option>
        <option <?php if($_SESSION["cityname"] == "臺南" && $_SESSION["cityname"] !=""){echo "selected";}?> value="臺南">臺南市<?php $twoDays["臺南"]="臺南市"?></option>
        <option <?php if($_SESSION["cityname"] == "高雄" && $_SESSION["cityname"] !=""){echo "selected";}?> value="高雄">高雄市<?php $twoDays["高雄"]="高雄市"?></option>
        <option <?php if($_SESSION["cityname"] == "恆春" && $_SESSION["cityname"] !=""){echo "selected";}?> value="恆春">屏東縣<?php $twoDays["恆春"]="屏東縣"?></option>
        <option <?php if($_SESSION["cityname"] == "宜蘭" && $_SESSION["cityname"] !=""){echo "selected";}?> value="宜蘭">宜蘭縣<?php $twoDays["宜蘭"]="宜蘭縣"?></option>
        <option <?php if($_SESSION["cityname"] == "花蓮" && $_SESSION["cityname"] !=""){echo "selected";}?> value="花蓮">花蓮縣<?php $twoDays["花蓮"]="花蓮縣"?></option>
        <option <?php if($_SESSION["cityname"] == "臺東" && $_SESSION["cityname"] !=""){echo "selected";}?> value="臺東">臺東縣<?php $twoDays["臺東"]="臺東縣"?></option>
        <option <?php if($_SESSION["cityname"] == "澎湖" && $_SESSION["cityname"] !=""){echo "selected";}?> value="澎湖">澎湖縣<?php $twoDays["澎湖"]="澎湖縣"?></option>
        <option <?php if($_SESSION["cityname"] == "金門" && $_SESSION["cityname"] !=""){echo "selected";}?> value="金門">金門縣<?php $twoDays["金門"]="金門縣"?></option>
        <option <?php if($_SESSION["cityname"] == "馬祖" && $_SESSION["cityname"] !=""){echo "selected";}?> value="馬祖">連江縣<?php $twoDays["馬祖"]="連江縣"?></option>
        </select>
    </div>
    <div>
    <div>
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div> 



<hr>
</body>
</div>
</form>
<div class= "text-center">
<?php

if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    
    $_SESSION["cityname"]= $cityname;
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
    foreach ($content->records->location[0]->weatherElement as $key => $value) {

        echo "溫度：$value->elementValue" . "°C". "<br>";

    }
}  
if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    $cityname2 = $twoDays["$cityname"];
    $_SESSION["cityname"]= $cityname;
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname2&elementName=Wx","rb");

    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);

    foreach ($content->records->location[0]->weatherElement[0]->time as $key => $value) {

        echo $value->parameter->parameterName."<br>";
        

    }
    
} 
if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    $cityname2 = $twoDays["$cityname"];
    $_SESSION["cityname"]= $cityname;

    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname2&elementName=WeatherDescription","rb");


    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);

    foreach ($content->records->locations[0]->location[0]->weatherElement[0]->time as $key => $value) {

        echo $value->elementValue[0]->value."<br>";

    }
}   
if (isset($_POST["submit"])) {
    $cityname= $_POST["cityname"];
    
    $_SESSION["cityname"]= $cityname;

    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=RAIN&parameterName=CITY","rb");


    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);
    $content = json_decode($content);

    foreach ($content->records->location[0]->weatherElement as $key => $value) {

        echo "雨量：$value->elementValue" . "毫升". "<br>";

    }echo "更新時間".date("yy年m月d日 h:i:s",strtotime($content->records->location[0]->time->obsTime));
}  
?>
</div>
</div>
</html>