<?php
    if (isset($_SESSION['error'])) {
        //echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Elimina el mensaje de error de la sesión.
    }