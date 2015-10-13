    <div id="loading"></div>
    <!-- Background FlexSlider -->
    <div id="background-slider">
        <ul class="slides">

            <!-- Slide -->
            <?php $n=0; foreach ($data as $item) { ?>
            <li style="background-image: url('<?php echo $item["pic"];?>'); background-size: cover;">
                <?php if ($n==0){?>
				<section>
                    <div class="section-content">
                        <p class="category">Portfolio Profesional</p>
                        <h2 class="caption">MARCELA KHOURI</h2>
                        <p class="text">Les doy la bienvenida a mi website, donde podrán apreciar una selección de mis mejores fotografías. Espero que lo disfruten!
                        </p>
                    </div>
                </section>
				<?php }?>
            </li>
            <?php $n++;}?>


        </ul>
    </div>
