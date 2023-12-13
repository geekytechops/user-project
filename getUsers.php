<?php

if(isset($_GET['submit'])){

    $curlCh = curl_init();
    curl_setopt($curlCh, CURLOPT_URL, 'http://localhost/projects/user-project/userList.php');
    curl_setopt($curlCh, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlCh, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curlCh);

    if (curl_errno($curlCh)) {
        echo curl_error($curlCh);
    }

    $httpStatus = curl_getinfo($curlCh, CURLINFO_HTTP_CODE);
    if ($httpStatus !== 200) {
        echo 'HTTP Status Code: ' . $httpStatus;
    }

    print_r($response);

    curl_close($curlCh);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Users List</title>
</head>
<body>

<form method="get">
    <input type="submit" name="submit" id="submit" value="Get Users List"> 
</form>

</body>
</html>