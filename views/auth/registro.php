<main class="main">
    <a href="index.php">
        <h1>Mantenimiento <span>Preventivo</span></h1>
    </a>
    <h2>Crea una cuenta para administrar tus citas</h2>
    <section class="contenedor">
        <h2>Registrate</h2>

            
        <form class="formulario registro" method="POST">

        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

            <div class="contenedor_formulario">
                <div class="contenido_formulario">
                    <input 
                        type="text" 
                        id="nombre" 
                        class="form_input" 
                        placeholder=" " 
                        name="nombre" 
                        value="<?php echo s($usuario->nombre); ?>" 
                    />
                    <label for="nombre" class="form_label">Nombre(s):</label>
                    <span class="form_line"></span>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="text" 
                        id="apellido" 
                        class="form_input" 
                        placeholder=" " 
                        name="apellido" 
                        value="<?php echo s($usuario->apellido); ?>" 
                    />
                    <label for="apellido" class="form_label">Apellido:</label>
                    <span class="form_line"></span>
                </div>

                <div class="contenido_formulario">
                    <input 
                        type="email" 
                        id="email" 
                        class="form_input" 
                        placeholder=" " 
                        name="email" 
                        value="<?php echo s($usuario->email); ?>" 
                    />
                    <label for="email" class="form_label">Email:</label>
                    <span class="form_line"></span>
                </div>
                <div class="contenido_formulario">
                    <input 
                        type="password" 
                        id="password" 
                        class="form_input" 
                        placeholder=" " 
                        name="password" 
                    />
                    <label for="password" class="form_label">Password:</label>
                    <span class="form_line"></span>
                </div>

                <input type="submit" class="btn" value="Crear Cuenta">
            </div>
            <div class="opciones registro-btn">
                <a href="index.php">¿Ya tienes cuenta? Inicia Sesion Aqui</a>
            </div>
        </form>
    </section>
</main>