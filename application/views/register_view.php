<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Social Network</title>
    <link rel="stylesheet" href="<?=base_url();?>style/style.css" type="text/css">

</head>
<body>

<div id="main">

<div id="background">
    <div id="register">
        <form method="post"  enctype="multipart/form-data"  action="<?=base_url();?>register">
            <input type="text" name="name" placeholder="Name" value="<?=set_value('name');?>"> <?=form_error('name');?> <br>
            <input type="text" name="surname" placeholder="Surname"  value="<?=set_value('surname');?>"> <?=form_error('surname');?><br>

            <input type="email" name="email" placeholder="Email"  value="<?=set_value('email');?>"> <?=form_error('email');?><br>
            <input type="password" name="password" placeholder="Password"> <?=form_error('password');?><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password"> <?=form_error('confirm_password');?><br>

            <input type="submit" value="Register">
        </form>
    </div>
</div>








</div>

</body>
</html>