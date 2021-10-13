<body>
    <div class="registration-form">
        <form method="post" action="<?= base_url('auth'); ?>">
            <div class="text-center">
                <span><img width="250" height="250" src="<?= base_url('assets/img/logo.png') ?>" alt=""></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
        </form>
    </div>
</body>