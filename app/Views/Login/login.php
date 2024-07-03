<?php echo $this->extend('pagina'); ?>

<?= $this->section("login") ?>
<div class="container">
    <h1 class="mt-5">INICIAR SESIÓN</h1>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <?= form_open('login/autenticacion', ['class' => 'mt-4']) ?>
        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="<?= set_value('correo') ?>">
            <strong><?= \Config\Services::validation()->getError('correo') ?></strong>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
            <strong><?= \Config\Services::validation()->getError('password') ?></strong>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">INGRESAR</button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
