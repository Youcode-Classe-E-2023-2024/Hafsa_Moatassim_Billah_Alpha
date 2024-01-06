<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_product_data = array(
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'userId' => $_POST['userId']
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => json_encode($new_product_data)
        )
    );

    $context  = stream_context_create($options);
    $api_url = "https://jsonplaceholder.typicode.com/posts";
    $result = file_get_contents($api_url, false, $context);

}
?>

