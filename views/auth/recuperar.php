<main class="main">
        <a href="index.php"><h1>Mantenimiento <span>Preventivo</span></h1></a>
        <h2>¿Olvidaste tu contraseña?</h2>

        <section class="contenedor login">

            <form class="formulario" method="POST">

            <?php 
                include_once __DIR__ . "/../templates/alertas.php";
            ?>


            <?php 
                if($error)return;
            ?>

                <div class="contenedor_formulario">
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

                    <input type="submit" class="btn" value="Guardar nuevo password">
                </div>
                <div class="opciones registro-btn">
                    <a href="index.php">¿Ya tienes cuenta? Inicia Sesion Aqui</a>
                </div>
            </form>
        </section>
    </main>
