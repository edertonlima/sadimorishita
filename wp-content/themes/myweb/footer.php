
	<footer class="footer">
		<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">
						<img class="img-footer" src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/sadimorishita_logo_footer.png" alt="<?php //the_field('titulo', 'option'); ?>">

						<ul>
							<li class=""><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
						</ul>
					</div>

					<div class="content-vertical">
						<div class="endereco-footer">
							<h2>Escritório <strong>São Paulo</strong></h2>
							<p>Av. Maria Coelho Aguiar, 215, Bloco F, 6º andar<br>Centro Empresarial, São Paulo/SP - CEP 05804-900</p>
						</div>

						<div class="endereco-footer">
							<h2>Escritório <strong>Santo André</strong></h2>
							<p>Av. Industrial, nº 780, cj. 912<br>Santo André, Brasil – CEP 09080-500</p>
						</div>
					</div>

					<div class="content-vertical">
						<div class="info-contato">
							<h2>Fale <strong>Conosco</strong></h2>
							<span class="telefone"><em>+55 11</em> 3390-3518</span>
							<p>contato@adimorishita.com.br</p>
						</div>
					</div>
				</div>

		</div>
			

		<div class="copy">
			<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">

						<?php /* <img class="img-footer" src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/sadimorishita_logo_footer.svg" alt="<?php //the_field('titulo', 'option'); ?>"> */ ?>
						<span>Sadi | Morishita Advogados. <i class="far fa-copyright"></i> Copyright <?php echo date('Y'); ?>.</span>

					</div>
					<div class="content-vertical">
						
						<ul>
							<li><a href="<?php echo get_home_url(); ?>/nossos-advogados" title=""><i class="fas fa-angle-right"></i> Nossos Advogados</a></li>
							<li><a href="#" title=""><i class="fas fa-angle-right"></i> Escritórios</a></li>
							<li><a href="#" title=""><i class="fas fa-angle-right"></i> Fale Conosco</a></li>
							<?php /* <li class="redes-sociais"><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li> */ ?>
						</ul>

					</div>
				</div>

			</div>
		</div>

	</footer>

    
	<?php /*
    <a href="javascript:trocarIdioma('es')"><img alt="espanhol" src="images/es.png"></a>
    <a href="javascript:trocarIdioma('en')"><img alt="ingles" src="images/en.png"></a>
    */?>
    <!-- O Javascript deve vir depois -->

    <script type="text/javascript">
    var comboGoogleTradutor = null; //Varialvel global

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'pt',
            includedLanguages: 'pt,en,es',
            //layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');

        comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
    }

    function changeEvent(el) {
        if (el.fireEvent) {
            el.fireEvent('onchange');
        } else {
            var evObj = document.createEvent("HTMLEvents");

            evObj.initEvent("change", false, true);
            el.dispatchEvent(evObj);
        }
    }

    function trocarIdioma(sigla) {
        if (comboGoogleTradutor) {
            comboGoogleTradutor.value = sigla;
            changeEvent(comboGoogleTradutor);//Dispara a troca
        }
    }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>
</html>

	<?php wp_footer(); ?>

	<script type="text/javascript">
		$('#slide').on('slide.bs.carousel', function () {
			$('.button', this).removeClass('active');
		})

		$('#slide').on('slid.bs.carousel', function (e) {

			$('#btn_slide_'+e.to).addClass('active');
/*
e.direction     // The direction in which the carousel is sliding (either "left" or "right").
e.relatedTarget // The DOM element that is being slid into place as the active item.
e.from          // The index of the current item.     
e.to            // The index of the next item.
*/
//console.log(e.to);
		})

	</script>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owlcarousel/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$('#carousel-advogados').owlCarousel({
		    //center: true,
		    items:3,
		    loop:true,
		    margin:30,
		    dots:false,
		    responsive:{
		        /*600:{
		            items:4
		        }*/
		    }
		});

		var owl = $('#carousel-advogados');
		owl.owlCarousel();
		// Go to the next item
		$('.control .left').click(function() {
		    owl.trigger('next.owl.carousel');
		})
		// Go to the previous item
		$('.control .right').click(function() {
		    // With optional speed parameter
		    // Parameters has to be in square bracket '[]'
		    owl.trigger('prev.owl.carousel', [300]);
		})
	</script>
</body>
</html>