<?php

require '../../conexion.php';

if($_POST){
    $nombre = (isset($_POST['nombre'])? $_POST['nombre']:"");
    $telefono = (isset($_POST['telefono'])? $_POST['telefono']:"");

    $stm=$conexion->prepare("INSERT INTO contactos(nombre,telefono,fechaRegistro,fechaModif) VALUES (:nombre,:telefono,NOW(),null)");
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":telefono",$telefono);
    $stm->execute();

    header("location:index.php");
}


?>




<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Nuevo Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control">

                <label style="margin-top: 1rem;" for="">Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>