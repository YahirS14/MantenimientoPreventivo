<?php 
    include_once __DIR__ . "/../templates/nav.php";

?>

<main class="main">

    <?php if($busqueda === '') {?>
        <p>No hay registros</p>
    <?php } else { ?>
                <div class="contenedor_tabla">
                    <table class="main-lita">
                        <thead class="theader">
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Fecha de Creacion</th>
                                <th>Fecha Programada</th>
                                <th>Frecuencia</th>
                                <th>Tipo</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            <tr>
                                <?php foreach($busqueda as $busquedas){?>
                                    <td><?php echo $busquedas->nombre;?></td>
                                    <td><?php echo $busquedas->usuario;?></td>
                                    <td><?php echo $busquedas->fechaCreacion;?></td>
                                    <td><?php echo $busquedas->fechaProgramada;?></td>
                                    <td><?php echo $busquedas->frecuencia;?></td>
                                    <td><?php echo $busquedas->tipo;?></td>
                                    <td><?php echo $busquedas->observaciones;?></td>
                                    <tr></tr>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
    <?php } ?>
</main>
