<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Online PHP Script Execution</title>
    </head>
    <body>
        <?php
            $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-49652693-301E-4E09-B5E6-BF4066B4F51B&elementName=Weather&parameterName=CITY","rb");
            $content = "";
            while (!feof($handle)) {
                    $content .= fread($handle, 10000);
            }
            fclose($handle);

            $content = json_decode($content);
            foreach ($content->records->location[0]->weatherElement as $key => $value) {
                    echo "$value->elementName" . "$value->elementValue";
            }
        ?>
    </body>
</html>