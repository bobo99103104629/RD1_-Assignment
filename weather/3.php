<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

    <form class="form-horizontal" id="lab" method="post" action="index.php">
        <fieldset>
        
        <!-- Form Name -->
        <legend>Lab Form</legend>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="city">城市:</label>
          <div class="col-md-4">
            <select id="city" name="city" v-model="selectedCity" class="form-control">
              <option v-for="aCity in cityList" v-bind:value="aCity">{{aCity.text}}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="okButton"></label>
          <div class="col-md-4">
            <button id="okButton" name="okButton" value="OK" class="btn btn-primary">OK</button>
          </div>
        </div>
        
        </fieldset>
        <h3>{{selectedCity}}</h3>
        dsadasd
        <hr>

    </form>
    
<script>

var labApp = new Vue({
  el: "#lab",
  name: "city",
  data: {
    selectedCity: {id: 4, text: "TaiChung"},
    cityList: [
      {id: 2, text: "Taipei"},
      {id: 4, text: "TaiChung"},
      {id: 6, text: "TaiNan"},
      {id: 6, text: "TaiNan"},
    ]
  }
})

</script>
<?php
$id = "id";
if (isset($_POST["okButton"])){
    
    $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&elementName=TEMP&parameterName%2C=CITY","rb");
    $content = "";
    while (!feof($handle)) {
            $content .= fread($handle, 10000);
    }
    fclose($handle);

    $content = json_decode($content);
    foreach ($content->records->location[0]->weatherElement as $key => $value) {
            echo "溫度：" . "$value->elementValue<br>";
    }
    
}
?>
</body>
</html>