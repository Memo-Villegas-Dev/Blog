<?php

namespace views;

require "../../app/autoload.php";
include 'layouts/main.php';

use Controllers\auth\LoginController as LoginController;

$ua = new LoginController;

is_null($ua->sessionValidate()) ? header("Location : ../../resources/views/auth/inisesion.php") : '';

head($ua);

?>

<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Mis publicaciones</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="my-posts">
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php scripts(); ?>
<script src="../../resources/js/app_myposts.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        app_myposts.getMyPosts(<?=$ua->id?>);
    });
</script>

<?php
    footer();
?>