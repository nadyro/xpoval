<div class="container_gestion_rubrique">
    <div class="add_rubrique_container">
        <h2>Ajouter une rubrique</h2>
        <div class="add_rubrique">
            <form id="form_rubrique" method="POST" enctype="multipart/form-data" action="gestionrubriques/addrubriques">
                <p>Nom de la rubrique</p>
                <input type="text" placeholder="Nom de la rubrique" name="libelle_rubrique" class="libelle_rubrique">
                <p>Diminutif de la rubrique</p>
                <input type="text" name="id_rubrique" placeholder="Diminutif de la rubrique" class="id_rubrique">
                <p>Image de la rubrique</p>
                <input type="file" name="image_rubrique" class="image_rubrique">
                <div class="hover_image">
                    <p>L'image doit être au format <span>PNG</span> et faire moins de <span>3 méga octets</span>.</p>
                </div>
                <input type="button" value="Ajouter" class="submit_rubrique" post-id='form_rubrique'>
            </form>
        </div>
    </div>
    <!--<div class="separator"></div>-->
    <div class="edit_rubrique_container">
        <h2>Modifier une rubrique</h2>
        <div class="edit_rubrique">
            <!--class="libelle_rubrique" name="libelle_rubrique"-->
            <form id="form_rubrique_edit" method="POST" enctype="multipart/form-data" action="gestionrubriques/updaterubriques">
                <select class="liste_libelle_rubrique" name="liste_libelle_rubrique">
                    <option></option>
                    <?php foreach ($rubriques as $kk => $vv) { ?>
                        <option class="libelle_une_rubrique" name="libelle_une_rubrique" value="<?php echo $vv['id'] ?>">
                            <?php echo $vv['libelle'] ?>
                        </option>
                    <?php } ?>
                </select>
                <p>Nom de la rubrique</p>
                <input type="text" placeholder="Nom de la rubrique" name="libelle_rubrique" class="libelle_rubrique">
                <p>Diminutif de la rubrique</p>
                <input type="text" name="id_rubrique" placeholder="Diminutif de la rubrique" class="id_rubrique">
                <p>Image de la rubrique</p>
                <div class="container_label_image_rubrique_edit">
                    <label for="image_rubrique_edit" class="label_file_type">
                        <img class="img_label_image_rubrique_edit">
                    </label>
                </div>
                <input type="hidden" name="image_rubrique_alias" class="image_rubrique_alias" value="">
                <input type="file" name="image_rubrique" id="image_rubrique_edit" style="display: none;">
                <input type="button" value="Modifier" class='submit_rubrique' post-id='form_rubrique_edit'>
            </form>
        </div>
    </div>
    <!--<div class="separator"></div>-->
    <div class="delete_rubrique_container">
        <h2>Supprimer une rubrique</h2>
        <div class="delete_rubrique">
            <form id="form_rubrique_delete" method="POST" enctype="multipart/form-data" action="gestionrubriques/deleterubriques">
                <p>Nom de la rubrique</p>
                <select class="liste_libelle_rubrique" name="liste_libelle_rubrique">
                    <option></option>
                    <?php foreach ($rubriques as $kk => $vv) { ?>
                        <option class="libelle_une_rubrique" name="libelle_une_rubrique" value="<?php echo $vv['id'] ?>">
                            <?php echo $vv['libelle'] ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="button" value="Supprimer" class="submit_delete_rubrique">
            </form>
        </div>
    </div>
    <div class="overlay_validation">
        <div class="validation_delete_rubrique">
            <p>
                Vous êtes sur le point de supprimer une rubrique, êtes-vous sûr(e) de vouloir continuer ?
            </p>
            <button value="0" class="oui_delete_rubrique">Oui</button>
            <button value="1" class="non_delete_rubrique">Non</button>
        </div>
    </div>
</div>