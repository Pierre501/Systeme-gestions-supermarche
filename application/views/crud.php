<div class="container">   
        <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <table class="table table-bordered table-hover">
                        <tr>
                                <th>Designation</th>
                                <th>Prix_Unitaire</th>
                                <th>QuantiteStock</th>
                                <th>Images</th>
                                <th colspan="2">Action</th>
                        </tr>
                        <?php for($i = 0; $i < count($refProduit); $i++) { ?>
                        <tr>
                                <td><?php echo $designation[$i]; ?></td>
                                <td><?php echo $prixUnitaire[$i]; ?></td>
                                <td><?php echo $quantiteStock[$i]; ?></td>
                                <td><img src="<?php echo img_loader($images[$i]) ?>" height="60px" witdh="40px" /></td>
                                <td><a href="<?php echo base_url(); ?>Accueil/valeurModifier?id=<?php echo $refProduit[$i]; ?>">Modifier</a></td>
                                <td><a href="<?php echo base_url(); ?>Accueil/supprimer?id=<?php echo $refProduit[$i]; ?>">Supprimer</a></td>
                        </tr>
                        <?php } ?>
                     </table>  
                     <p><a href="#">Ajouter</a></p> 
                </div>
                <div class="col-md-2"></div>
        </div>
</div>