<!-- ALBUMS -->
<div class="portfolio-center-align">

        <div class="portfolio-line">

            <div class="scrollable" id="scrollable">
                <div class="items">
				
                <?php foreach ($data as $item) { ?>
                
                    <!-- Item -->
                    <div class="item">
                        <div class="img">
                            <a href="<?php echo base_url();?>albums/<?php echo url_title($item["title"]);?>/<?php echo $item["album_id"];?>">
                                <p>Ver Album</p>
                                <span class="darken"></span>
                                <span class="border"></span>
                                <img src="<?php echo $item["pic"];?>" alt="<?php echo $item["title"];?>" />
                            </a>
                            <div class="portfolio-text">
                                <h2><a href="<?php echo base_url();?>albums/<?php echo url_title($item["title"]);?>/<?php echo $item["album_id"];?>"><?php echo $item["title"];?></a></h2>
                                <p class="by">by <a href="#">Marcela Khouri</a></p>
                                <p class="text"></p>
                            </div>
                        </div>
                    </div>

				<?php } ?>


                </div>
            </div>

            <!-- Nav -->
            <a class="prev browse left"></a>
            <a class="next browse right"></a>

            <!-- Scroll -->
            <div class="pseudo-scroll">
                <div class="scrollbar"></div>
            </div>

        </div>

</div>