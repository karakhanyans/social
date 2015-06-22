<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Social Network</title>
    <link rel="stylesheet" href="<?= base_url(); ?>style/style.css" type="text/css">

</head>
<body>

<div id="main">



    <div class="profile">



        <?php foreach($user as $person):?>
           <a href="<?=base_url();?>"> <img src="<?=base_url();?>images/photo/<?=$person['image'];?>">
            <p> <?=$person['name'];?> &nbsp; <?=$person['surname'];?></p></a>



        <?php endforeach;?>

    </div>


    <a href="<?= base_url(); ?>login/logout" class="logout">Logout</a>

    <div id="persons">
        <div class="person">
            <?php foreach($people as $p):?>
                <a href="<?= base_url(); ?>people/view_profile/<?=$p['id']?>"><?=$p['name'];?>&nbsp;<?=$p['surname'];?></a> <br>
            <?php endforeach;?>
        </div>
    </div>
</div>



</body>
</html>