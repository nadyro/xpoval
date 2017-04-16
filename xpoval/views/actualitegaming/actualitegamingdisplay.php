<?php
foreach ($actualite as $kk => $vv) {
}
?>
<div class="container_actualite_gaming_display">
    <div class="container_background_grande_actualite">
        <div class="background_grande_actualite" style="background:url('/xpoval/images/actualitegaming/<?php echo $vv['id_sous_activite_mere'] ?>/<?php echo $vv['image'] ?>.jpg');
             background-size: cover; background-position-x: 50%; background-position-y: 50%;">
            <div class="overlay_background_grande_actualite">
                <h1><?php echo html_entity_decode($vv['titre']); ?></h1>
                <div class="g_e" post-id-sam="<?php echo $vv['id_sous_activite_mere'] ?>" post-id="<?php echo $vv['id'] ?>">
                    <div class="e_a">
                        J'aime
                    </div>
                    <div class="e_c">
                        Commenter
                    </div>
                    <div class="e_p">
                        Partager
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contenu_grande_actualite">
    <div class="description_grande_actualite">
        <?php echo html_entity_decode($vv['description']); ?>
    </div>
    <div class="grande_actualite_contenu">
        <?php echo html_entity_decode($vv['contenu']) ?>
    </div>
    <div class="date_grande_actualite">
        <p class="date_actualite">Le <?php echo date("d/m/Y", strtotime($vv['date_ajout'])); ?>
           à <?php echo date("H:i", strtotime($vv['date_ajout'])); ?>
        </p>
    </div>
        </div>





























</div>