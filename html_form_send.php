<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "info@todoescombros.cl";
     
    $email_subject = "Contacto desde todoescombros.cl";
     
     
    function died($error) {
        // your error code can go here
        echo "lo sentimos debes rellenar todos los campos del formulario correctamente. ";
        echo "estos son los campos que debes arreglar.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor vuelve atras y rellena los campos solicitados. tu mensaje es muy importante para nosotros<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Tu direccion de correo no es valida.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Debes colocar tu nombre o el nombre de la empresa.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Debes introducir el nombre de la comuna.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'El campo de comentarios no puede estar vacio.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Comuna: ".clean_string($last_name)."\n";
    $email_message .= "Correo: ".clean_string($email_from)."\n";
    $email_message .= "Telefono: ".clean_string($telephone)."\n";
    $email_message .= "comentario: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
<!-- place your own success html below -->
 <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>todoescombros.cl</title>
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/estilos.css" />
  <link rel="stylesheet" href="css/styles.css" /> 
  <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon" />
 <meta http-equiv="Refresh" content="20;url=index.html">

</head>
<body>
  <!-- HEADER -->
  <header>
    <figure id="logo">
      <img src="imagenes/logo1.png" />
    </figure> 
    <h1>TODOESCOMBROS.CL</h1>

    <!-- MENU -->
      <nav class="nav_movil">
        <ul>
          <li><a href="index.html">INICIO</a></li>
          <li><a href="servicios.html">SERVICIOS</a></li>
          <li><a href="galeria.html">GALERIA</a></li>
          <li><a href="contacto.html">CONTACTO</a></li>
        </ul>
      </nav>
    <!-- MENU FIN -->

    <nav id="nav_des">
      <ul>
        <li><a href="index.html">INICIO</a></li>
        <li><a href="somos.html">SOMOS</a></li>
        <li><a href="servicios.html">SERVICIOS</a></li>
        <li><a href="galeria.html">GALERIA</a></li>
        <li><a href="contacto.html">CONTACTO</a></li>
      </ul>
      <div id="linea"> </div>   
    </nav>
  </header>
  <!-- SECTION -->
  <section class="contenido">
    <article class="info_somos">
      <h2>mensaje enviado</h2>
      <p class="p_somos">Gracias por su mensaje. Nos pondremos en contacto con usted muy pronto.
</p>

    </article>
      <div class="separacion separacion_somos"> </div>    

  </section>

  <footer>  
  <p id="p_fono" class="icon-phone">98284430</p>

  </footer>
  <script type="text/javascript" src="js/prefixfree.js"></script>
</body>
</html>

<?php
}
die();
?>