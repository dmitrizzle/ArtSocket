
<?php
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "https://www.artsocket.com/art/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);
    echo str_replace('<link rel="canonical"', '<meta name="robots" content="noindex" /><link rel="canonical"', $result);
?>