<?= $this->extend('pagina'); ?>
<?= $this->section("inicio") ?>
    <?php if(session('id')) : ?>
        <!-- CUANDO INICIA SESION -->
        <h1>Bienvenido al inicio de noticias</h1>
        <p>¡Ya has iniciado sesión como <?= session('nombre') ?>!</p>
        <p>Correo: <?= session('correo') ?></p>
        <p>Rol: <?= session('rol') ?></p>
        <form action="<?= base_url('logout/logout') ?>" method="post">
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    <?php elseif($nombre) : ?>
        <!-- CUANDO SE REGISTRA -->
        <h1>Bienvenido al inicio de noticias, <?= $nombre ?></h1>
        <h1>¡Registro Exitoso!</h1>
        <p>¡Gracias por registrarte en nuestro sitio!</p>
        <form action="<?= base_url('logout/logout') ?>" method="post">
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    <?php else : ?>
        <!-- Si el usuario no ha iniciado sesión ni se ha registrado, mostrar mensaje de bienvenida -->
        <h1>Bienvenido al inicio de noticias</h1>
        <p>Regístrate o inicia sesión para acceder a todas las funcionalidades</p>
    <?php endif; ?>
<?= $this->endSection() ?>
