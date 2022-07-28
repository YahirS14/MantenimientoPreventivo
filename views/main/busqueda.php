<?php 
    include_once __DIR__ . "/../templates/nav.php";

?>

<main class="main">

    <?php if(count($busqueda) === 0)  {?>
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
                                <th></th>
                                <th></th>
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
                                    <td>
                                    <form action="/actualizar-regitro" method="GET">
                                        <div>
                                            <input 
                                                type="hidden" 
                                                name="id" 
                                                value="<?php echo $busquedas->id;?>">
                                        </div>
                                        <div>
                                            <input 
                                                type="submit" 
                                                value="Actualizar"
                                                class="boton_actu">
                                        </div>
                                    </form>
                                    </td>
                                    <td>
                                        <form action="/eliminar-regitro" method="POST">
                                            <div>
                                                <input 
                                                    type="hidden" 
                                                    name="id" 
                                                    value="<?php echo $busquedas->id;?>">
                                            </div>
                                            <div>
                                                <input 
                                                    type="submit" 
                                                    value="Eliminar"
                                                    class="boton_eli">
                                            </div>
                                        </form>
                                    </td>
                                    <tr></tr>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="/reporte" method="GET">
                    <div>
                        <input 
                            type="hidden" 
                            name="id" 
                            value="<?php echo $busquedas->id;?>">
                    </div>
                    <div class="reporte">
                        <input 
                            type="submit" 
                            value="Generar Reporte"
                            class="boton_reporte">
                        </div>
                </form>
    <?php } ?>
</main>
