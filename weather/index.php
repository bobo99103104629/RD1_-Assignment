<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>我的第一堂RWD</title>
</head>
<body>
<br>
<form class="form-horizontal" id="lab" method="post" >
<div class="form-group row">
    <label class="col-2 col-form-label text-right" for="select">選擇縣市:</label> 
    <div class="col-8">
        <select id="cityname" name ="cityname" class="custom-select">
        <option <?php if($_POST["cityname"] == "基隆" && $_POST["cityname"] !=""){echo "selected";}?> value="基隆">基隆市</option>
        <option <?php if($_POST["cityname"] == "臺北" && $_POST["cityname"] !=""){echo "selected";}?> value="臺北">臺北市</option>
        <option <?php if($_POST["cityname"] == "板橋" && $_POST["cityname"] !=""){echo "selected";}?> value="板橋">新北市</option>
        <option <?php if($_POST["cityname"] == "新屋" && $_POST["cityname"] !=""){echo "selected";}?> value="新屋">桃園市</option>
        <option <?php if($_POST["cityname"] == "香山" && $_POST["cityname"] !=""){echo "selected";}?> value="香山">新竹市</option>
        <option <?php if($_POST["cityname"] == "新竹" && $_POST["cityname"] !=""){echo "selected";}?> value="新竹">新竹縣</option>
        <option <?php if($_POST["cityname"] == "苗栗" && $_POST["cityname"] !=""){echo "selected";}?> value="苗栗">苗栗縣</option>
        <option <?php if($_POST["cityname"] == "臺中" && $_POST["cityname"] !=""){echo "selected";}?> value="臺中">台中市</option>
        <option <?php if($_POST["cityname"] == "田中" && $_POST["cityname"] !=""){echo "selected";}?> value="田中">彰化縣</option>
        <option <?php if($_POST["cityname"] == "日月潭" && $_POST["cityname"] !=""){echo "selected";}?> value="日月潭">南投縣</option>
        <option <?php if($_POST["cityname"] == "斗六" && $_POST["cityname"] !=""){echo "selected";}?> value="斗六">雲林縣</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "阿里山" && $_POST["cityname"] !=""){echo "selected";}?> value="阿里山">嘉義縣</option>
        <option <?php if($_POST["cityname"] == "臺南" && $_POST["cityname"] !=""){echo "selected";}?> value="臺南">臺南市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>
        <option <?php if($_POST["cityname"] == "嘉義" && $_POST["cityname"] !=""){echo "selected";}?> value="嘉義">嘉義市</option>

        </select>
    </div>
</div> 

<div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</body>
</div>
</form>
<div class= "text-center"></div>
<?php

if (isset($_POST["submit"])){
    $cityname= $_POST["cityname"];
    if($cityname == "苗栗"){
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }
    else if($cityname == "斗六"){
        $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }else{
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&locationName=$cityname&elementName=TEMP&parameterName=CITY","rb");
    }
    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);

    $content = json_decode($content);
    foreach ($content->records->location[0]->weatherElement as $key => $value) {
        echo "$value->elementName" . "$value->elementValue";
}
  
}
?>
</div>
</html>