<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Social Network</title>
    <link rel="stylesheet" href="<?= base_url(); ?>style/style.css" type="text/css">
    <script src="<?=base_url();?>scripts/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>scripts/script.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="main">


    <div class="profile">


        <?php foreach ($profile as $prof): ?>
            <img src="<?= base_url(); ?>images/photo/<?= $prof['image']; ?>">
            <p> <?= $prof['name']; ?> &nbsp; <?= $prof['surname']; ?></p>



        <?php endforeach; ?>
        <a class="send">Send Message</a>
    </div>
    <div class="image">
        <?php foreach ($images as $img): ?>
            <img src="<?= base_url(); ?>images/photo/<?= $img['image_name']; ?>">
        <?php endforeach; ?>
    </div>
    <a href="<?= base_url(); ?>login/logout" class="logout">Logout</a>


    <a href="<?= base_url(); ?>people">Other People</a>

    <div id="chat">
        <div class="head">
            <p><?= $prof['name']; ?></p>
        </div>
        <div class="chat_window"></div>
        <div class="message_input">
            <form method="post" id="message">
                <input type="text" name="message" class="message">
                <input type="hidden" name="from_id" class="from_id" value="<?=$this->session->userdata('user_id');?>">
                <input type="hidden" name="to_id" class="to_id"  value="<?=$prof['id'];?>">
                <input type="hidden" name="status" class="status" value="new">



            </form>
        </div>
    </div>
</div>

</body>
</html>