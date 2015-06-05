
    <!-- Content -->
    <div class="contacts-center">
        <div class="content">

            <h2>Contact Us</h2>

            <div class="contact-content">
                <div class="left">
                    <p class="contacts">
                        Samurai Photography         <br>
                        Germany Berlin, Main street 43  <br>
                        Vivamus tempor,            <br>
                        Suspendisse tellus,      <br>
                        Phasellus sit amet.                        <br>
                        T: +8 800 435-17-20                <br>
                        E: info@samurai.co.uk            <br>
                    </p>

                    <p class="info">
                        Vivamus tempor vel magna vel blandit.
                        Donec non nisi eget lacus commodo blandit
                        id vel arcu. Phasellus ac metus quis.
                    </p>
                </div>

                <div class="right">
                    <form method="post" id="formContacto" action="<?= base_url();?>contacto/enviar" >
                        <div class="form-left">
                            <input name="nombre" class="campos" type="text" placeholder="Su nombre (requerido)"/>
                            <input name="email" class="campos" type="text" placeholder="Email (requerido)"/>
                            <input name="telefono" class="campos" type="text" placeholder="Telefono"/>
                            <input name="ubicacion" class="campos" type="text" placeholder="Su Ubicacion"/>
                            <input name="contacto" class="campos" type="text" placeholder="Como me conoció?"/>
                        </div>

                        <div class="form-right">
                            <input name="asunto" class="campos" type="text" placeholder="Asunto del mensaje"/>
                            <textarea name="mensaje"  class="campos" placeholder="Su mensaje (requerido)"></textarea>
                            <input type="submit" value="ENVIAR"/>
                        </div>
                    </form>
                </div>
            </div>


            <div class="line"></div>

            <div class="contact-footer"></div>

        </div>
    </div>

