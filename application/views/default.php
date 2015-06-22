
<!--           <a href="--><?//=base_url();?><!--login" >Login</a>-->
<!--           <a href="--><?//=base_url();?><!--register" >Register</a>-->

<div id="background">
        <div class="register_back">
            <div id="register">
                <form method="post"  enctype="multipart/form-data"  action="<?=base_url();?>register">
                    <input type="text" name="name" placeholder="Name"> <br>
                    <input type="text" name="surname" placeholder="Surname"> <br>

                    <input type="email" name="email" placeholder="Email"> <br>
                    <input type="password" name="password" placeholder="Password"><br>
                    <input type="password" name="confirm_password" placeholder="Confirm Password"> <br>

                    <input type="submit" value="Register">
                </form>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    <div class="clear"></div>

</div>



</div>

</body>
</html>