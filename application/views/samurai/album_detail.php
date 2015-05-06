<div class="portfolio-single-center-align">

        <div class="portfolio-single-title">
            <h2>Suspendisse tellus massa</h2>
            <p>by <a href="#">HACHIRO</a> on September 17, 2013</p>
            <a href="portfolio.html" class="back">&lt; back to the gallery</a>
        </div>

        <section class="slider">
            <div id="slider" class="flexslider">
                <ul class="slides">

                    <!-- ITEM -->
                    <?php foreach ($data as $item) { ?>
					<li>
                        <!-- Story -->
                        <div class="hover">
                            <div class="share">
                                <p>SHARE:</p>
                                <ul>
                                    <li class="facebook"><a href="#" ></a></li>
                                    <li class="twitter"><a href="#" ></a></li>
                                    <li class="mail"><a href="#" ></a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <p class="read"></p>
                            </div>
                        </div>
                        <!--<div class="story">
                            <div class="content">
                                <span class="close"><?php echo $item["title"];?></span>
                                <p class="text"></p>
                            </div>
                        </div>-->

                        <!-- IMG -->
                        <img src="<?php echo $item["pic"];?>" alt="image" />
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div id="carousel" class="flexslider">
                <ul class="slides">
                <?php foreach ($data as $item) { ?>
                    <li>
                        <div class="hover"></div>
                        <img src="<?php echo $item["pic"];?>" alt="<?php echo $item["title"];?>" />
                    </li>
   				<?php }?>
            </div>

            <!-- Scroll -->
            <div class="pseudo-scroll">
                <div class="scrollbar"></div>
            </div>

        </section>
    </div>