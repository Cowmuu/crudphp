<?php

include '../../conexion.php';

$stm=$conexion->prepare("SELECT * FROM contactos");
$stm->execute();

$contactos = $stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){
    $txtid = (isset($_GET['id'])? $_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);

    $stm->execute();

}


?>



<?php include '../../template/header.php'; ?>

<div class="container">
<button type="button" class="btn btn-dark btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#modalId">
  Nuevo Contacto
</button>
    <div class="table-responsive mt-5">
        <table class="table">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Fecha Modificación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contactos as $contacto){ ?>
                <tr class="">
                    <td scope="row"><?php echo $contacto['id'] ?></td>
                    <td><?php echo $contacto['nombre'] ?></td>
                    <td><?php echo $contacto['telefono'] ?></td>
                    <td><?php echo $contacto['fechaRegistro'] ?></td>
                    <td><?php echo $contacto['fechaModif'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-success">Editar</a>
                        <a href="index.php?id=<?php echo $contacto['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include 'create.php'; ?>

<?php include '../../template/footer.php'; ?>
