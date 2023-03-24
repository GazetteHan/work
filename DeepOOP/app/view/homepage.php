<?php
$this->layout('layout', ['title' => 'User Profile','name'=>'']);

?>

<h1>User Profile</h1>
<?php foreach ($postsInView as $post):?>
<?php echo $post['title'];?> <br>
<?php endforeach;?>
