    <!-- Footer -->
    <nav class="footer-menu">
        <div class="home">
            <!-- Social -->
            <ul class="left">
                <li class="facebook"><a href="#" ></a></li>
                <li class="twitter"><a href="#" ></a></li>
                <li class="google"><a href="#" ></a></li>
                <li class="pinterest"><a href="#" ></a></li>
                <li class="flickr"><a href="#" ></a></li>
                <li class="linkedin"><a href="#" ></a></li>
                <li class="instagram"><a href="#" ></a></li>
                <li class="mail"><a href="#" ></a></li>
            </ul>

            <!-- Footer Menu -->
            <div class="center">
                <ul class="nav">
                    <li><span>Mis Albumes</span>
                        <ul>
                            <?php foreach ($albumlist as $item) {?>
                            <li><a href="<?php echo base_url();?>albums/<?php echo url_title($item["title"]);?>/<?php echo $item["album_id"];?>"><?php echo $item["title"];?></a></li>
                        	<?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Copy -->
            <p class="right"> &copy; 2015 - Marcela Khouri Fotograf&iacute;a.</p>
        </div>
    </nav>

