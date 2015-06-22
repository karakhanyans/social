<div class="left-side">
    <div class="profile">


        <?php foreach ($user as $person): ?>
            <div class="prof_image">
                <img src="<?= base_url(); ?>images/photo/<?= $person['image_name']; ?>">
            </div>

            <p> <?= $person['name']; ?> &nbsp; <?= $person['surname']; ?></p>



        <?php endforeach; ?>

    </div>
    <div class="image">
        <p>Photos</p>
        <?php foreach ($images as $img): ?>
            <img src="<?= base_url(); ?>images/photo/<?= $img['image_name']; ?>">
        <?php endforeach; ?>
        <a href="#">View all</a>
    </div>
    <form action="upload/upload_image/<?= $person['id']; ?>" enctype="multipart/form-data" method="post">
        <input type="file" name="image_name"><br>
        <input type="submit" value="Upload Image">
        <?php
        if ($this->session->userdata('error_upload')) {

            echo $this->session->userdata('error_upload');
            $this->session->unset_userdata('error_upload');
        }
        ?>
    </form>
</div>

<div class="right-side">


</div>

<div class="chat">

    <div class="chat_window">
        <div class="head">
            <div class="chat-image"></div>
            <div class="chat-user"></div>
        </div>
        <div class="chat-message">
            <?php foreach ($message as $chat):?>

            <div class="info">
                <span class="chat_image"><img src="<?=base_url();?>/images/photo/<?=$chat['image_name'];?>"></span>
                <span class="name"><?=$chat['name'];?></span>

                <p class="text">
                    <span class="mess"><?=$chat['message'];?></span>
                              <span class="time"><?=$chat['date_send'];?></span>
                </p>
                <?php endforeach;?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="message_input">
        <form method="post" id="message">
            <input type="text" name="message" class="message">
            <input type="hidden" name="from_id" class="from_id" value="">
            <input type="hidden" name="to_id" class="to_id" value="">


        </form>
    </div>
</div>


</div>


</body>
</html>