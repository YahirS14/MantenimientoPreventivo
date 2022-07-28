<?php 
    include_once __DIR__ . "/../templates/nav.php";

?>

<main class="main">

    <h2>Busca tus Registros</h2>

    <div>
        <form action="/busqueda" method="GET"  class="buscardor">

            <div>
                <label for="fecha">Fecha Programada</label>
                <input 
                    type="date" 
                    name="fechaProgramada" 
                    id="fecha"
                    class="bus-fecha"
                />
            </div>
            <div >
                <input class="btn-buscar" type="submit" value="Buscar">
            </div>
        </form>
    </div>


    <?php if(count($registro) === 0) {?>
        <p class="n_registro">No hay registros</p>
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
                                <?php foreach($registro as $registros){?>
                                    <td><?php echo $registros->nombre;?></td>
                                    <td><?php echo $registros->usuario;?></td>
                                    <td><?php echo $registros->fechaCreacion;?></td>
                                    <td><?php echo $registros->fechaProgramada;?></td>
                                    <td><?php echo $registros->frecuencia;?></td>
                                    <td><?php echo $registros->tipo;?></td>
                                    <td><?php echo $registros->observaciones;?></td>
                                    <td>
                                    <form action="/actualizar-regitro" method="GET">
                                        <div>
                                            <input 
                                                type="hidden" 
                                                name="id" 
                                                value="<?php echo $registros->id;?>">
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
                                                    value="<?php echo $registros->id;?>">
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
    <?php } ?>

    <div class="btn-funcion">
        <a href="/main">Inicio</a>
        <a href="/nuevo-registro">Nuevo Registro</a>
    </div>
</main>
