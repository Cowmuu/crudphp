<?php

include '../../conexion.php';

if(isset($_GET['id'])){
    $txtid = (isset($_GET['id'])? $_GET['id']:"");

    $stm=$conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);

    $stm->execute();

    $contacto=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$contacto['nombre'];
    $telefono=$contacto['telefono'];
}


if($_POST){
    $txtid = (isset($_POST['txtid'])? $_POST['txtid']:"");
    $nombre = (isset($_POST['nombre'])? $_POST['nombre']:"");
    $telefono = (isset($_POST['telefono'])? $_POST['telefono']:"");

    $stm=$conexion->prepare("UPDATE contactos SET nombre=:nombre, telefono=:telefono,fechaModif=NOW() WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":telefono",$telefono);
    $stm->execute();

    header("location:index.php");
}

?>


<?php include '../../template/header.php'; ?>


<div class="container mt-5">
    <form action="" method="post">
    <input type="hidden" name="txtid" value="<?php echo $txtid; ?>" class="form-control">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control">

        <label for="" style="margin-top: 1rem;">Teléfono</label>
        <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control">

        <div style="display: flex;gap: 1rem;margin-top: 1rem;">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <input type="submit" class="btn btn-success" value="Actualizar">
        </div>
       
    </form>
</div>




<?php include '../../template/footer.php'; ?>