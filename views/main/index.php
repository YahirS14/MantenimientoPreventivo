
<header class="header">

    <div class="contenido-header">
        <h1>Dimas <span>Mantenimiento</span></h1>

        <nav class="navegacion"> 
            <a href="">Cerrar Sesion</a>
        </nav>
    </div>

</header>

<main class="contenido-main">
    <h2>Bienvenido: <span><?php echo $nombre; ?></span></h2>

    <h2 class="mensaje">LLena el Formulario</h2>
    <section class="nuevo-registro">

        <form class="formulario registro" method="POST">
            <div class="contenedor_formulario">
                <div class="contenido_formulario_registro">
                    <div class="contenido_formulario">
                        <input 
                            type="text" 
                            id="nombre" 
                            class="form_input" 
                            placeholder=" "
                            name="nombre"
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
                        />
                        <label for="usuario" class="form_label">Usuario:</label>
                        <span class="form_line"></span>
                    </div>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="datetime-local" 
                        id="fecha" 
                        class="form_input" 
                        placeholder=" "
                        name="fecha"
                    />
                    <label for="fecha" class="form_label">Fecha de Creacion:</label>
                    <span class="form_line"></span>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="datetime-local" 
                        id="fecha_pro" 
                        class="form_input" 
                        placeholder=" "
                        name="fecha_pro"
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
                    />
                    <label for="observaciones" class="form_label">Observaciones:</label>
                    <span class="form_line"></span>
                </div>

                <input type="submit" class="btn" value="Inisiar Sesion">
            </div>
        </form>
    </section>

    <div class="btn-funcion">
        <a href="">Nuevo Registro</a>
        <a href="">Buscar Registros</a>
    </div>
</main>