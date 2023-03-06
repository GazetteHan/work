<?php
require_once "init.php";

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            'email'    => [
                'required' => true,
                'email'    => true,
            ],
            'password' => [
                'required' => true,
            ],
        ]);

        if ($validation->passed()) {
            $user = new User();
            $login = $user->login(Input::get('email'), Input::get('password'));

        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }
}

//var_dump($_SESSION);

?>
<form action="" method="post">
    <?php echo Session::flash('success'); ?>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo Input::get('email'); ?>">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="text" name="password" value="qwer">
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>