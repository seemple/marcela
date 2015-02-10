    <!-- Background FlexSlider -->
    <div id="background-slider">
        <ul class="slides">

            <!-- Slide -->
            <?php foreach ($data as $item) { ?>
            <li style="background-image: url('<?php echo $item["pic"];?>'); background-size: cover;">
                <section>
                    <div class="section-content">
                        <p class="category">Samurai Photography</p>
                        <h2 class="caption">Responsive template</h2>
                        <p class="text">
                            Samurai Photography - is the best way to build an awesome photography site in our world. You can easily create a realy good site with a pretty design and good gallery system.
                        </p>
                        <em class="href"> <a href="blog-single.html">Read Full Post</a> </em>
                    </div>
                </section>
            </li>
            <?php }?>


        </ul>
    </div>
