<div class="gestionactualitegaming">
    <div class="all_actualitegaming_page">
        <div class="container_actualitegaming_page">
            <div class="bloc_ga_pa">
                <?php
                if ($clickable == 1) {
                    ?>
                    <form class="0 grande_actualite_gestion" id="<?php echo $clickable ?>" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="activite_mere" value="1">
                        <input type="hidden" name="id_type_sous_activite" value="1">
                        <div class="grande_actualite" id="<?php echo $clickable ?>">
                            <label for="actualite_bg"><p class="bg_image_choice">Choose a background image here</p></label>
                            <input type="file" name="actualite_bg" id="actualite_bg" style="display:none;">
                            <div class="description_actualite grande_actualite_details">
                                <h2>Write a title here...</h2>
                                <input type="text" name="actualite_titre" id="grande_actuaite_titre" class="grande_actuaite_titre" placeholder="Write a title here...">
                                <h2>Write a description to this big news</h2>
                                <textarea name="actualite_description" id="actualite_description">
                                        .
                                </textarea>

                                <h2>Write your articile here.</h2>
                                <textarea name="contenu_actualite" id="contenu_actualite" class="contenu_actualite">
                                                                    
                                </textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('contenu_actualite');
                                </script>
                            </div>
                        </div>
                        <input type="submit" value="Enregistrer" class="submit_actualite submit_grande_actualite">
                    </form>
                    <?php
                }

                if ($clickable > 1 || $clickable < 6) {
                    ?>
                    <form class="1 petite_actu_mc_gestion" id="<?php echo $clickable ?>" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="activite_mere" value="1">
                        <input type="hidden" name="id_type_sous_activite" value="1">
                        <div class="petite_actu_mc" id="<?php echo $clickable ?>">
                            <h2>Titre de la petite actualité</h2>
                            <input type="text" name="actualite_titre" class="petite_actu_mc_titre">
                            <div class="container_description">
                                <h2>Description de la petite actualité</h2>
                                <textarea name="actualite_description" id="description_textarea" class="petite_actu_mc_description">
                                                        
                                </textarea>
                            </div>
                            <div class="container_contenu">
                                <h2>Contenu de la petite actualité</h2>
                                <textarea name="contenu_actualite" id="contenu_textarea" class="petite_actu_mc_description">
                                                        
                                </textarea>
                            </div>
                            <label for="actualite_bg"><p class="bg_image_choice">Choose a background image here</p></label>
                            <input type="file" name="actualite_bg" id="actualite_bg" style="display:none;">
                            <input type="submit" value="Enregistrer" class="submit_actualite submit_petite_actualite">
                            <script type="text/javascript">
                                CKEDITOR.replace('description_textarea');
                                CKEDITOR.replace('contenu_textarea');
                            </script>
                        </div>
                    </form>
                    <?php
                }

                if ($clickable == 3) {
                    echo "petite actualite";
                }

                if ($clickable == 4) {
                    echo "petite actualite";
                }

                if ($clickable == 5) {
                    echo "petite actualite";
                }

                if ($clickable == 6) {
                    echo "petite actualite";
                }

                if ($clickable == 7) {
                    echo "petite actualite";
                }
                ?>
            </div>
        </div>
    </div>
</div>