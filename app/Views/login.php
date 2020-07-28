<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
   body{
        background-color: #efefef;
   }
</style>
<div class="container login-container">
            <div class="row" id="form-shadow">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    <form action="<?php echo base_url()?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" name="email" value="<?php echo set_value('email'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="submit" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="images/teamWork.jpeg" style="height:460px; width: 560px">
                </div>
            </div>
            <?php if(isset($validation)):?>
                <div class="col-12 mt-3" style="margin-left: -10px; width: 53%;">
                    <div class="alert alert-danger" role="alert">
                        <?=$validation->listErrors()?>
                    </div>
                </div>
            <?php endif?>
        </div>
<?= $this->endSection() ?>
