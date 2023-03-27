<?php $this->layout('layout',
    [
        'title' => 'User Profile 2',
        'type'  => 'this is category'
    ]); ?>

<?php

foreach ($postInView as $item) {
    echo $item["title"] . "<br>";
};
?>

