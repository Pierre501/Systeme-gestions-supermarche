<!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php for($i = 0; $i < count($designation); $i++) { ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="<?php echo img_loader($images[$i]) ?>" height="200px" witdh="240px" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $designation[$i]; ?></h5>
                                        <!-- Product price-->
                                        <?php echo $prixUnitaire[$i]; ?> Ar
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <form action="<?php echo base_url(); ?>Accueil/traitement" method="post">
                                    <p><input type="hidden" name="designation" value="<?php echo $designation[$i]; ?>"></p>
                                     <div class="text-center"><input type="number" name="quantite" class="btn btn-outline-dark mt-auto" ></div>
                                    <br>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><input type="submit" value="Ajouter" class="btn btn-outline-dark mt-auto" ></div>
                                </form>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                </div>
            </div>
        </section>