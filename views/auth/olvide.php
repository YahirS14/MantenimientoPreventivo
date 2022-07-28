<!-- <main class="main">
        <a href="index.php"><h1>Dimas <span>Mantenimiento</span></h1></a>
        <h2>¿Olvidaste tu contraseña?</h2>

        <section class="contenedor login">
            <h2>Recupera tu contraseña</h2>

            <form class="formulario">
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
    </main> -->



<?php 




require_once '../library/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');
$dompdf->render();
$dompdf->stream();



?>