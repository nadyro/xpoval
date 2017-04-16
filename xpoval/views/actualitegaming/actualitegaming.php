<div class="all_actualitegaming_page">
    <div class="container_actualitegaming_page">
        <div class="bloc_ga_pa">
            <div class="grande_actualite clickable" post-id-actualite="<?php echo $sous_activites['grandeactualite'][0]['id'] ?>" post-id="1" post-name="ga" <?php if (!empty($sous_activites['grandeactualite'][0])) { ?> style="background-size: cover; background-position-x: 50%; background-position-y: 50% !important;
                 background:url('/xpoval/images/actualitegaming/<?php echo $sous_activites['grandeactualite'][0]['id_sous_activite_mere'] ?>/<?php echo $sous_activites['grandeactualite'][0]['image'] ?>.jpg')"<?php } ?>>
                <div class="description_actualite grande_actualite_details">
                        <h2>
                            <?php echo (empty($sous_activites['grandeactualite'][0]) ? "This trip is awesome." : html_entity_decode($sous_activites['grandeactualite'][0]['titre'])); ?>
                        </h2>
                        <p>
                            <?php echo (empty($sous_activites['grandeactualite'][0]) ? "He who runs through the world opens his mind to a far greater universe." : html_entity_decode($sous_activites['grandeactualite'][0]['description'])); ?>
                        </p>
                </div>
            </div>
            <div class="petite_actu_mc clickable" post-id="2" post-name="pa">
                <ul>
                    <?php foreach ($sous_activites['petiteactualite'] as $kk => $vv) { ?>
                        <li><div class="temporis"><p><?php echo (date("d-m-y", strtotime($vv['date_ajout'])) < date("d-m-y", strtotime("now")) ? date("d/m/y", strtotime($vv['date_ajout'])) : date("G:i", strtotime($vv['date_ajout']))); ?> </p>
                                <img class="img_temporis" src="images/actualitegaming/<?php echo $vv['id_sous_activite_mere']; ?>/<?php echo $vv['image'] . ".jpg"; ?>">
                                <p class="titre_actualite"><?php echo html_entity_decode($vv['titre']); ?></p></div></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="actualites_normales">
            <div class="bloc_actus_normales">
                <div class="petite_actu_normale clickable pan" post-id="3" post-name="pan">
                    <h2>The night</h2>
                    <ul>
                        <?php foreach ($sous_activites['petiteactunormale_3'] as $kk => $vv) { ?>
                            <li><div class="temporis"><p><?php echo (date("d-m-y", strtotime($vv['date_ajout'])) < date("d-m-y", strtotime("now")) ? date("d/m/y", strtotime($vv['date_ajout'])) : date("G:i", strtotime($vv['date_ajout']))); ?> </p>
                                    <img class="img_temporis" src="images/actualitegaming/<?php echo $vv['id_sous_activite_mere']; ?>/<?php echo $vv['image'] . ".jpg"; ?>">
                                    <p class="titre_actualite"><?php echo html_entity_decode($vv['titre']); ?></p></div></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="grande_actu_normale clickable gan" post-id="4" post-name="gan">
                    <h2>The day</h2>
                    <ul>
                        <?php foreach ($sous_activites['grandeactunormale'] as $kk => $vv) { ?>
                            <li><div class="temporis"><p><?php echo (date("d-m-y", strtotime($vv['date_ajout'])) < date("d-m-y", strtotime("now")) ? date("d/m/y", strtotime($vv['date_ajout'])) : date("G:i", strtotime($vv['date_ajout']))); ?> </p>
                                    <img class="img_temporis" src="images/actualitegaming/<?php echo $vv['id_sous_activite_mere']; ?>/<?php echo $vv['image'] . ".jpg"; ?>">
                                    <p class="titre_actualite"><?php echo html_entity_decode($vv['titre']); ?></p></div></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="petite_actu_normale clickable pan2" post-id="5" post-name="pan2">
                    <h2>The life</h2>
                    <ul>
                        <?php foreach ($sous_activites['petiteactunormale_5'] as $kk => $vv) { ?>
                            <li><div class="temporis"><p><?php echo (date("d-m-y", strtotime($vv['date_ajout'])) < date("d-m-y", strtotime("now")) ? date("d/m/y", strtotime($vv['date_ajout'])) : date("G:i", strtotime($vv['date_ajout']))); ?> </p>
                                    <img class="img_temporis" src="images/actualitegaming/<?php echo $vv['id_sous_activite_mere']; ?>/<?php echo $vv['image'] . ".jpg"; ?>">
                                    <p class="titre_actualite"><?php echo html_entity_decode($vv['titre']); ?></p></div></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sous_actualites">
            <div class="first_sous_actualite clickable" post-id="6" post-name="fsa">
                <div class="overlay_sous_actualite">
                    <div class="container_childrenP">
                        <p class="desc_o_sa">
                            Description de la première sous actualité.
                        </p>
                    </div>
                </div>
            </div>
            <div class="separation_sous_actualite"></div>
            <div class="second_sous_actualite clickable" post-id="7" post-name="fsa2">
                <div class="overlay_sous_actualite">
                    <p class="desc_o_sa">
                        Description de la seconde sous actualité.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>