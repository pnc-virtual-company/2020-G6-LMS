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
                    <form action="/yourLeave" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="images/teamWork.jpeg" style="height:460px; width: 560px">
                </div>
            </div>
        </div>
<?= $this->endSection() ?>
