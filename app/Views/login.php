<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div class="col-md-3"></div>
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div id="register-link" class="text-left">
                                    <a href="#" class="text-info">Create account</a>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-warning text-white btn-md">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>