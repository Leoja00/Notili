<?php echo $this->extend('pagina'); ?>

<?= $this->section("register") ?>

<div class="container">
    <h1 class="mt-5">Registro de Usuario</h1>
    <?= form_open('signup/registrar', ['class' => 'mt-4']) ?> 
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
            <strong><?= \Config\Services::validation()->getError('nombre') ?></strong>
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="text" class="form-control" id="correo" name="correo" value="<?= set_value('correo') ?>">
            <strong ><?= \Config\Services::validation()->getError('correo') ?></strong>
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena">
            <strong ><?= \Config\Services::validation()->getError('contrasena') ?></strong>
        </div>

        <div class="form-group">
            <label for="confirmar_contrasena">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena">
            <strong ><?= \Config\Services::validation()->getError('confirmar_contrasena') ?></strong>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select class="form-control" id="rol" name="rol">
                <option value="editor">Editor</option>
                <option value="validador">Validador</option>
                <option value="editor_validador">Editor y Validador</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">REGISTRARSE</button>
    <?= form_close() ?>
</div>

<?php $this->endSection(); ?>
