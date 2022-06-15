<div class="container">   
        <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                        <h1>Modification</h1>
                        <form action="<?php echo base_url(); ?>Accueil/modifier" method="post">
                                <p><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></p>
                                <p><input type="text" name="designation" value="<?php echo $designation; ?>"></p>
                                <p><input type="text" name="prixUnitaire" value="<?php echo $prixUnitaire; ?>"></p>
                                <p><input type="text" name="quantiteStock" value="<?php echo $Quantite; ?>"></p>
                                <p><input type="file" name="images" ></p>
                                <p><input type="submit" value="Modifier"></p>
                        </form>
                </div>
                <div class="col-md-4"></div>
        </div>
</div>