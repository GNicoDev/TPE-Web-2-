<?php
class viewVehiculos
{

    // Muestra el listado de los vehiculos
    public function showVehiculos($vehiculos)
    {
        require_once 'templates/header.phtml';
?>
        <section class="contenedorMain">
            <h2>Catalogo</h2>
            <div class="catalogo">
                <?php foreach ($vehiculos as $vehiculo) { ?>
                    <div>
                        <div><?php echo $vehiculo->marca ?></div>
                        <a href="detalles/<?php echo $vehiculo->id  ?>"><img src="<?php echo $vehiculo->imagen ?>" alt="ferrari" class="img-auto"></a>
                    </div>
                <?php  } ?>
            </div>
        </section>
<?php
        require_once 'templates/footer.phtml';
    }

    //Muestra el detalle del vehiculo seleccionado
    function showCarDetails($vehiculo) {
        {
            require_once 'templates/header.phtml';
    ?>
            <section class="contenedorMain">
                <h2>Detalles</h2>
                <div class="catalogo">
                    <ul>
                        <img src="<?php echo $vehiculo->imagen ?>" alt="" class="img-auto">
                        <li><b>Marca:</b> <?php echo $vehiculo->marca ?> </li>
                        <li><b>Modelo:</b> <?php echo $vehiculo->modelo ?></li>
                        <li><b>Matricula:</b> <?php echo $vehiculo->matricula ?></li>
                        <li><b>Precio por dia:</b> $<?php echo $vehiculo->precio_dia ?></li>
                        <li><b>Estado:</b> <?php if ($vehiculo->reservado) 
                                    echo 'Reservado';
                                  else
                                    echo 'Disponible';?>
                        </li>
                    </ul>
                </div>
            </section>
    <?php
            require_once 'templates/footer.phtml';
        }
    }


    public function showError($error)
    {
        require 'templates/error.phtml';
    }
}
