<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Social Network</title>
    <link rel="stylesheet" href="<?= base_url(); ?>style/style.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>style/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>style/animate.css" type="text/css">
    <script src="<?=base_url();?>scripts/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>scripts/script.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">

    <header>
        <div class="logo"><p>Welcome</p></div>
        <?php if($this->session->userdata('user_id')):?>

            <a href="<?= base_url(); ?>login/logout" class="logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
            <p class="sms"><i class="fa fa-comments"></i><span class="count animated "></span></p>
        <?php else:?>
        <div class="head_login">

            <form action="<?=base_url();?>login" method="post">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login">

            </form>
        </div>
        <?php endif;?>

    </header>