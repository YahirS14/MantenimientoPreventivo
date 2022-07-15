<?php 
    include_once __DIR__ . "/../templates/nav.php";
?>

<main>
<h2 class="mensaje">LLena el Formulario</h2>
    <section class="nuevo-registro">

        <form class="formulario registro" method="POST" action="/nuevo-registro">


        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

            <div class="contenedor_formulario">
                <div class="contenido_formulario_registro">
                    <div class="contenido_formulario">
                        <input 
                            type="text" 
                            id="nombre" 
                            class="form_input" 
                            placeholder=" "
                            name="nombre"
                            value="<?php echo s($registro->nombre); ?>" 
                        />
                        <label for="nombre" class="form_label">Nobre:</label>
                        <span class="form_line"></span>
                    </div>
                    <div class="contenido_formulario">
                        <input 
                            type="text" 
                            id="usuario" 
                            class="form_input" 
                            placeholder=" "
                            name="usuario"
                            value="<?php echo s($registro->usuario); ?>" 
                        />
                        <label for="usuario" class="form_label">Usuario:</label>
                        <span class="form_line"></span>
                    </div>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="date" 
                        id="fecha" 
                        class="form_input" 
                        placeholder=" "
                        name="fechaCreacion"
                    />
                    <label for="fecha" class="form_label">Fecha de Creacion:</label>
                    <span class="form_line"></span>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="date" 
                        id="fecha_pro" 
                        class="form_input" 
                        placeholder=" "
                        name="fechaProgramada"
                    />
                    <label for="fecha_pro" class="form_label">Fecha Programada:</label>
                    <span class="form_line"></span>
                </div>
                
                <div class="contenido_formulario_registro">
                    <div class="contenido_formulario">
                        <input 
                            type="text" 
                            id="frecuencia" 
                            class="form_input" 
                            placeholder=" "
                            name="frecuencia"
                            value="<?php echo s($registro->frecuencia); ?>" 
                        />
                        <label for="frecuencia" class="form_label">Frecuencia:</label>
                        <span class="form_line"></span>
                    </div>

                    
                    <div class="contenido_formulario">
                        <input 
                            type="text" 
                            id="tipo" 
                            class="form_input" 
                            placeholder=" "
                            name="tipo"
                            value="<?php echo s($registro->tipo); ?>" 
                        />
                        <label for="tipo" class="form_label">Tipo:</label>
                        <span class="form_line"></span>
                    </div>
                    
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="text" 
                        id="observaciones" 
                        class="form_input" 
                        placeholder=" "
                        name="observaciones"
                        value="<?php echo s($registro->observaciones); ?>" 
                    />
                    <label for="observaciones" class="form_label">Observaciones:</label>
                    <span class="form_line"></span>
                </div>

                <input type="submit" class="btn" value="Crear Registro">
            </div>
        </form>
    </section>

    <div class="btn-funcion">
        <a href="/main">Inicio</a>
        <a href="/lista">Buscar Registros</a>
    </div>
</main>