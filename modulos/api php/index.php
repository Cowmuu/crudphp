<?php

// URL de la API que deseas consumir
$api_url = 'https://randomuser.me/api/';

// Inicializar cURL
$ch = curl_init($api_url);

// Establecer opciones de cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devolver la respuesta en lugar de mostrarla directamente
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Opcional, desactivar la verificación de certificados SSL (no se recomienda en producción)

// Ejecutar la solicitud cURL
$response = curl_exec($ch);

// Verificar si hubo errores
if (curl_errno($ch)) {
    echo 'Error en la solicitud cURL: ' . curl_error($ch);
} else {
    // Procesar la respuesta JSON (o el formato de respuesta de la API)
    $data = json_decode($response, true); // Convertir la respuesta JSON en un array asociativo
    
    // Realiza las operaciones que necesites con los datos de la API
    // var_dump($data);
}

// Cerrar la sesión cURL
curl_close($ch);

?>

<?php require '../../template/header.php'; ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Consumo de API Pública con PHP</h1>

        
            <img class="img rounded-circle mt-5" src="<?php echo $data['results'][0]['picture']['large']; ?>" alt="">
            <p style="font-weight: bold;font-size:2rem">Nombre: <?php echo $data['results'][0]['name']['title']. " " . $data['results'][0]['name']['first']. " " . $data['results'][0]['name']['last'];?></p>
            <p style="font-weight: bold;font-size:2rem">Correo: <?php echo $data['results'][0]['email']; ?></p>
            <p style="font-weight: bold;font-size:2rem">Residencia: <?php echo $data['results'][0]['location']['city']. " " . $data['results'][0]['location']['country']; ?></p>
  
      
    </div>
  </div>



<?php require '../../template/footer.php'; ?>