<?php 
    include_once __DIR__ . "/../templates/nav.php";
?>

<main>
    <?php if(count($registro) === 0) {?>
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
                                <?php foreach($registro as $registros){?>
                                    <td><?php echo $registros->nombre;?></td>
                                    <td><?php echo $registros->usuario;?></td>
                                    <td><?php echo $registros->fechaCreacion;?></td>
                                    <td><?php echo $registros->fechaProgramada;?></td>
                                    <td><?php echo $registros->frecuencia;?></td>
                                    <td><?php echo $registros->tipo;?></td>
                                    <td><?php echo $registros->observaciones;?></td>
                                    <tr></tr>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
    <?php } ?>
</main>