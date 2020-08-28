<?php
    session_start();
    if($_POST != ""){
    @$_SESSION["citySite"]=$_POST["citySite"];
    }else{
    $_SESSION["citySite"]= "";
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
<div class="form-group ">
    <div class="col-3 container">
        <div class = "text-center">   
        <select id="citySite" name ="citySite" class="custom-select">
        <option <?php if($_SESSION["citySite"] == "基隆" && $_SESSION["citySite"] !=""){echo "selected";}?> value="基隆">基隆市<?php $second["基隆"]="基隆市"?></option>
        <option <?php if($_SESSION["citySite"] == "臺北" && $_SESSION["citySite"] !=""){echo "selected";}?> value="臺北">臺北市<?php $second["臺北"]="臺北市"?></option>
        <option <?php if($_SESSION["citySite"] == "板橋" && $_SESSION["citySite"] !=""){echo "selected";}?> value="板橋">新北市<?php $second["板橋"]="新北市"?></option>
        <option <?php if($_SESSION["citySite"] == "新屋" && $_SESSION["citySite"] !=""){echo "selected";}?> value="新屋">桃園市<?php $second["新屋"]="桃園市"?></option>
        <option <?php if($_SESSION["citySite"] == "香山" && $_SESSION["citySite"] !=""){echo "selected";}?> value="香山">新竹市<?php $second["香山"]="新竹市"?></option>
        <option <?php if($_SESSION["citySite"] == "新竹" && $_SESSION["citySite"] !=""){echo "selected";}?> value="新竹">新竹縣<?php $second["新竹"]="新竹縣"?></option>
        <option <?php if($_SESSION["citySite"] == "苗栗" && $_SESSION["citySite"] !=""){echo "selected";}?> value="苗栗">苗栗縣<?php $second["苗栗"]="苗栗縣"?></option>
        <option <?php if($_SESSION["citySite"] == "臺中" && $_SESSION["citySite"] !=""){echo "selected";}?> value="臺中">臺中市<?php $second["臺中"]="臺中市"?></option>
        <option <?php if($_SESSION["citySite"] == "田中" && $_SESSION["citySite"] !=""){echo "selected";}?> value="田中">彰化縣<?php $second["田中"]="彰化縣"?></option>
        <option <?php if($_SESSION["citySite"] == "日月潭" && $_SESSION["citySite"] !=""){echo "selected";}?> value="日月潭">南投縣<?php $second["日月潭"]="南投縣"?></option>
        <option <?php if($_SESSION["citySite"] == "斗六" && $_SESSION["citySite"] !=""){echo "selected";}?> value="斗六">雲林縣<?php $second["斗六"]="雲林縣"?></option>
        <option <?php if($_SESSION["citySite"] == "嘉義" && $_SESSION["citySite"] !=""){echo "selected";}?> value="嘉義">嘉義市<?php $second["嘉義"]="嘉義市"?></option>
        <option <?php if($_SESSION["citySite"] == "阿里山" && $_SESSION["citySite"] !=""){echo "selected";}?> value="阿里山">嘉義縣（阿里山）<?php $second["阿里山"]="嘉義縣"?></option>
        <option <?php if($_SESSION["citySite"] == "臺南" && $_SESSION["citySite"] !=""){echo "selected";}?> value="臺南">臺南市<?php $second["臺南"]="臺南市"?></option>
        <option <?php if($_SESSION["citySite"] == "高雄" && $_SESSION["citySite"] !=""){echo "selected";}?> value="高雄">高雄市<?php $second["高雄"]="高雄市"?></option>
        <option <?php if($_SESSION["citySite"] == "恆春" && $_SESSION["citySite"] !=""){echo "selected";}?> value="恆春">屏東縣<?php $second["恆春"]="屏東縣"?></option>
        <option <?php if($_SESSION["citySite"] == "宜蘭" && $_SESSION["citySite"] !=""){echo "selected";}?> value="宜蘭">宜蘭縣<?php $second["宜蘭"]="宜蘭縣"?></option>
        <option <?php if($_SESSION["citySite"] == "花蓮" && $_SESSION["citySite"] !=""){echo "selected";}?> value="花蓮">花蓮縣<?php $second["花蓮"]="花蓮縣"?></option>
        <option <?php if($_SESSION["citySite"] == "臺東" && $_SESSION["citySite"] !=""){echo "selected";}?> value="臺東">臺東縣<?php $second["臺東"]="臺東縣"?></option>
        <option <?php if($_SESSION["citySite"] == "澎湖" && $_SESSION["citySite"] !=""){echo "selected";}?> value="澎湖">澎湖縣<?php $second["澎湖"]="澎湖縣"?></option>
        <option <?php if($_SESSION["citySite"] == "金門" && $_SESSION["citySite"] !=""){echo "selected";}?> value="金門">金門縣<?php $second["金門"]="金門縣"?></option>
        <option <?php if($_SESSION["citySite"] == "馬祖" && $_SESSION["citySite"] !=""){echo "selected";}?> value="馬祖">連江縣<?php $second["馬祖"]="連江縣"?></option>
        </select>
    </div>
    </div>
</div>
<div>
    <div class= "text-center">
      <button name="submit" type="submit" class="btn btn-primary">當前天氣</button>
      <button name="submit2" type="submit" class="btn btn-primary">未來兩天天氣</button>
      <button name="submit3" type="submit" class="btn btn-primary">一週天氣</button>
      <button name="submit4" type="submit" class="btn btn-primary">累積雨量</button>
    </div>  
</div> 
<hr>
</body>
</div>
</form>

<div class= "text-center">
<div background-size: cover; background-position:center center; background-attachment:fixed;>
<?php  
if (isset($_POST["citySite"])){
$citySite=$_POST["citySite"];?>
<img src=img\<?php echo $citySite?>.jpg height="300" />
<?php } ?>
</div>
<div class="container mt-3">
<div class="row">
<div class="col-12">
<?php
include ('today.php');
include ('twodays.php');
include ('week.php');
include ('rain.php');
?>
</div>
</div>
</div>

</div>
</div>
</html>