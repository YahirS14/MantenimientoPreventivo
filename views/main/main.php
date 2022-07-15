<?php 
    include_once __DIR__ . "/../templates/nav.php";
?>

<main class="contenido-main">
    <h2>Bienvenido: <span><?php echo $nombre; ?></span></h2>

    <div class="btn-funcion">
        <a href="/nuevo-registro">Nuevo Registro</a>
        <a href="/lista">Buscar Registros</a>
    </div>
</main>