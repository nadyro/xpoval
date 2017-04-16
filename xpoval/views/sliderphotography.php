<div class="type_range">
    <input type="range" value="" class="range_bg">
</div>
<div class="container_overlay_slider_photography">
    <div class="overlay_slider_photography">
    </div>
</div>
<div class="all_index_page">
    <div class="container_sliderphotography">
        <div class="container_theme">
            <div class="first_block_themes">
                <div class="theme_1">
                    <?php
                    foreach ($value['bloc_1'] as $ll => $mm) {
                        ?>

                        <div class="sous_themes" post-bloc="<?php echo $mm['bloc'] ?>" style="background:url('images/photography/<?php echo $mm['media'] ?>'); background-size: 100% 100%; background-repeat: no-repeat; ">
                            <div class="hover_sous_themes"> <?php
                                foreach ($value['all_each_bloc_1'] as $kk => $vv) {
                                    ?>
                                    <div class="container_hovered_theme">
                                        <div class="hovered_theme" post-bg="<?php echo $vv['media']; ?>">

                                            <div class="g_e" post-id-am="<?php echo $vv['activite_mere_id']; ?>" post-id-sam="<?php echo $vv['id_sous_activite_mere'] ?>" post-id="<?php echo $vv['id'] ?>">
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
                                    <?php
                                }
                                ?></div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="theme_2">
                    <?php
                    foreach ($value['bloc_2'] as $ll => $mm) {
                        ?>
                        <div class="sous_themes" post-bloc="<?php echo $mm['bloc'] ?>" style="background:url('images/photography/<?php echo $mm['media'] ?>'); background-size: 100% 100%; background-repeat: no-repeat; ">
                            <div class="hover_sous_themes"> <?php
                                foreach ($value['all_each_bloc_2'] as $kk => $vv) {
                                    ?>
                                    <div class="container_hovered_theme">
                                        <div class="hovered_theme" post-bg="<?php echo $vv['media']; ?>">

                                            <div class="g_e" post-id-am="<?php echo $vv['activite_mere_id']; ?>" post-id-sam="<?php echo $vv['id_sous_activite_mere'] ?>" post-id="<?php echo $vv['id'] ?>">
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
                                    <?php
                                }
                                ?></div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="second_block_themes">
                <div class="theme_3">
                    <?php
                    foreach ($value['bloc_3'] as $ll => $mm) {
                        ?>
                        <div class="sous_themes" post-bloc="<?php echo $mm['bloc'] ?>" style="background:url('images/photography/<?php echo $mm['media'] ?>'); background-size: 100% 100%; background-repeat: no-repeat; ">
                            <div class="hover_sous_themes"> <?php
                                foreach ($value['all_each_bloc_3'] as $kk => $vv) {
                                    ?>
                                    <div class="container_hovered_theme">
                                        <div class="hovered_theme" post-bg="<?php echo $vv['media']; ?>">

                                            <div class="g_e" post-id-am="<?php echo $vv['activite_mere_id']; ?>" post-id-sam="<?php echo $vv['id_sous_activite_mere'] ?>" post-id="<?php echo $vv['id'] ?>">
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
                                    <?php
                                }
                                ?></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="theme_4">
                    <?php
                    foreach ($value['bloc_4'] as $ll => $mm) {
                        ?>
                        <div class="sous_themes" post-bloc="<?php echo $mm['bloc'] ?>" style="background:url('images/photography/<?php echo $mm['media'] ?>'); background-size: 100% 100%;background-repeat: no-repeat; ">
                            <div class="hover_sous_themes"> 

                                <?php
                                foreach ($value['all_each_bloc_4'] as $kk => $vv) {
                                    ?>
                                    <div class="container_hovered_theme">
                                        <div class="hovered_theme" post-bg="<?php echo $vv['media']; ?>">
                                            <div class="g_e" post-id-am="<?php echo $vv['activite_mere_id']; ?>" post-id-sam="<?php echo $vv['id_sous_activite_mere'] ?>" post-id="<?php echo $vv['id'] ?>">
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
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>