<main class="main">
        <a href="/"><h1>Mantenimiento <span>Preventivo</span></h1></a>
        <h2>Crea y Administra tus citas</h2>

        <section class="contenedor">
            <h2>Inicia Sesion</h2>

            <form class="formulario" method="POST">

            <?php 
                include_once __DIR__ . "/../templates/alertas.php";
            ?>

                <div class="contenedor_formulario">
                    <div class="contenido_formulario">
                        <input 
                            type="email" 
                            id="email" 
                            class="form_input" 
                            placeholder=" "
                            name="email"
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

                    <input type="submit" class="btn" value="Inisiar Sesion">
                </div>
                <div class="opciones">
                    <a href="/registro">Crear Cuenta</a>
                    <a href="/olvide">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </section>
    </main>