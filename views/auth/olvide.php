<main class="main">
        <a href="index.php"><h1>Mantenimiento <span>Preventivo</span></h1></a>
        <h2>¿Olvidaste tu contraseña?</h2>

        <section class="contenedor login">

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

                    <input type="submit" class="btn" value="Enviar">
                </div>
                <div class="opciones registro-btn">
                    <a href="index.php">¿Ya tienes cuenta? Inicia Sesion Aqui</a>
                </div>
            </form>
        </section>
    </main>


