<div class="all_index_page">

    <div class="container_index_page">
        <div class="top_page">
            <div class="container_slider">
                <div class="slider" style="background: url(images/pdp_1.jpg) no-repeat center center; background-size: cover; background-position-x: 50%; background-position-x: 50%;">
                    <div class="container_slider_overlay">

                        <div class="overlay_slider">
                            <div class="click_slider"></div>
                            <div class="management_overlay_slider">
                                <div class="text_overlay_slider">
                                    <p>
                                        Worgen isles. Spooky and old, like piratery and sea wars.
                                    </p>
                                </div>
                            </div>
                            <div class="list_slider">
                                <ul>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xpoval">
                <h1>Xpoval 
                    <span>A new kind of gaming.</span></h1>
            </div>
        </div>
        <div class="bottom_page">
            <div class="gaming_and_photography">
                <a href="actualitegaming">
                    <div class="gaming_news divs_style clickable" style="background: url(images/rubriques/lol/lol_bg/lol_bg_3.jpg) no-repeat center center; background-size: cover;">
                        <div class="overlay_banners">
                            <h2>Actualités Gaming</h2>
                        </div>

                    </div>
                </a>
                <a href="sliderphotography">
                    <div class="slider_photography divs_style clickable" style="background: url(images/rubriques/ow/ow_bg/ow_bg_2.jpg) no-repeat center center; background-size: cover;">
                        <div class="overlay_banners">
                            <div class="container_slider_infos">
                                <div class="list_slider_photography">
                                    <ul>

                                    </ul>
                                </div>
                                <div class="infos_slider_photography">
                                    <h2>
                                        A beautiful view of the mount Everest by Jordan.
                                    </h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>

            <div class="proteam_and_music">
                <div class="proteam divs_style clickable" style="background: url(images/rubriques/wow/wow_bg/wow_bg_3.jpg) no-repeat center center; background-size: cover;">
                    <div class="overlay_banners">
                        <h2>The Team</h2>
                    </div>
                </div>
                <div class="music divs_style clickable" style="background: url(images/rubriques/cs/cs_bg/cs_bg_4.jpg) no-repeat center center; background-size: cover;">
                    <div class="overlay_banners">
                        <h2>Here comes the music</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="secondcontainerindexpage">
        <div class="fresh_news">
            <?php
            $y = 10;
            for ($i = 1; $i <= $y; $i++) {
                if ($i % 2) {
                    ?>
                    <div class="forte_news">
                        <div class="first_bloc_news">
                            <div class="description_bloc_news">

                            </div>
                        </div>
                        <div class="second_bloc_news">
                            <div class="description_bloc_news">

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="panel_news">
            <?php
            $z = 10;
            for ($i = 1; $i <= $y; $i++) {
                if ($i % 2) {
                    ?>
                    <div class="forte_news">

                        <div class="description_bloc_news">

                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>