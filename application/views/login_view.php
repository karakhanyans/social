<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Social Network</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">

</head>
<body>

<div id="main">

    <div id="background">
        <div id="login">
            <form action="<?=base_url();?>login" method="post">
                <input type="text" name="email" placeholder="Email" value="<?=set_value('email');?>"> <?=form_error('email');?> <br>
                <input type="password" name="password" placeholder="Password"><?=form_error('password');?><br>
                <input type="submit" value="Login">

            </form>

        </div>

    </div>


</div>

</body>
</html>