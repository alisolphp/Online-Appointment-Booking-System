<?php
$pageTitle = 'ورود';
require_once __DIR__."/../components/header.php";
?>

<?php
$error = input('error');
if( $error != '' ){
    $errorMessage = 'خطای ناشناخته!';
    if( $error == 1 ){
        $errorMessage = 'نام کاربری یا کلمه عبور صحیح نیست!';
    }
    
    echo '<div class="alert bg-warning">خطا: '.$errorMessage.'</div>';
}
?>

<form action="" method="post">
    <input class="form-control" name="username" type="text" placeholder="نام کاربری" autofocus required>
    <br>
    <input class="form-control" name="password" type="password" placeholder="کلمه عبور" required>
    <br>
    <input class="btn btn-primary" type="submit" value="ورود">
</form>

<div class="alert alert-info mt-4">
    <p>اطلاعات ورود پیشنهادی:</p>
    <p>کاربر تستی 1: demo1 / demo1</p>
    <p>کاربر تستی 2: demo2 / demo2</p>
</div>

<?php
require_once __DIR__."/../components/footer.php";
?>