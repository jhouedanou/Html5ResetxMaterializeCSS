<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
    <div class="banner">
        <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
            <div class="carousel-inner" role="listbox">
                <?php
              			$args = array( 'cat'=> 8);
              			$loop = new WP_Query( $args );
              			if ($loop->have_posts()){?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                    <div class="item">
                        <?php
		    						if ( has_post_thumbnail()) {
		    							the_post_thumbnail('full', array('class' => 'img-responsive'));
		    						}
		    					?>
                            <div class="carousel-caption kb_caption kb_caption_right">
                                <h3 data-animation="animated flipInX"><?php the_title(); ?></h3>
                                <h4 data-animation="animated flipInX"><?php the_excerpt(); ?></h4>
                                <a class="btn btn-default" role="button" href="<?php the_permalink();?>">En savoir plus</a>
                            </div>
                    </div>
                    <?php endwhile;?>
                    <?php 
            	  			}else{
            	  			//echo('qsqs');	
            	  			}
            	  			wp_reset_query(); // Remember to reset
            	  		?>
            </div>
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev"><span class="dashicons dashicons-controls-skipback"></span></a>
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next"><span class="dashicons dashicons-controls-skipforward"></span></a>
        </div>
    </div>
    <div class="content">
        <div class="welcome-w3">
            <div class="container">
                <?php
				  			$args = array( 'cat'=> 11);
				  			$loop = new WP_Query( $args );
				  			if ($loop->have_posts()){?>
                    <div class="marquee">
                        <p>Notre devise : Avec conviction, nous réussissons là où les autres n’ont pas réussi | Organisation pour la promotion des Droits de l’Homme, le bien-être Social, le retour, l’entretien et le maintien de la Paix dans le monde</p>
                    </div>
                    <?php 
					  			}else{
					  			//echo('qsqs');	
					  			}
					  			wp_reset_query(); // Remember to reset
					  		?>
            </div>
        </div>
        <div class="student-w3ls">
            <div class="container">
                <div class="col-md-8">
                    <div class="student-grids">
                        <?php
							 global $more;
							        $more = 0;
							  $args = array(
							  'page_id' => 45, // id of a page, post, or custom type
							  'post_type' => 'any');
							  $the_query = new WP_Query($args);
							  while ( $the_query->have_posts() ) : $the_query->the_post(); 
							?>
                            <h3 class="tittle1">Planète paix</h3>
                            <div class="col-md-8 student-grid">
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                <a class="btn btn-info" role="button" href="<?php the_permalink();?>">En savoir plus</a>
                            </div>
                            <div class="col-md-4 student-grid">
                                <?php
									if ( has_post_thumbnail()) {
										the_post_thumbnail('full', array('class' => 'img-responsive'));
									}
								?>
                            </div>
                            <div class="clearfix"></div>
                            <?php 
							  endwhile; 
							  wp_reset_query();
							?>
                    </div>
                    <div class="partnerloop">
                        <h3 class="tittle1">Nos partenaires</h3>
                        <?php
						  			$args = array( 'cat'=> 12);
						  			$loop = new WP_Query( $args );
						  			if ($loop->have_posts()){?>
                            <ul class="autoplay row">
                                <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                                <li class="col-md-4">
                                    <?php
								       							if ( has_post_thumbnail()) {
								       								the_post_thumbnail('medium', array('class' => 'riches sidelines'));
								       							}
								       						?><span class="nompartner"><?php the_title(); ?></span></li>
                                <?php endwhile;?>
                            </ul>
                            <?php 
							  			}else{
							  			//echo('qsqs');	
							  			}
							  			wp_reset_query(); // Remember to reset
							  		?>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="tittle1">Citations de paix</h3>
                    <?php
						  			$args = array( 'cat'=> 13);
						  			$loop = new WP_Query( $args );
						  			if ($loop->have_posts()){?>
                        <ul class="pueblo">
                            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                            <li class="bravador">
                                <?php the_content(); ?>
                                <span><?php the_title(); ?></span>
                            </li>
                            <?php endwhile;?>
                        </ul>
                        <?php 
							  			}else{
							  			//echo('qsqs');	
							  			}
							  			wp_reset_query(); // Remember to reset
							  		?>
                        <div class="pub">
                            <h3 class="tittle1">Publicité</h3>
                            <?php
				  		    			$args = array( 'cat'=> 28);
				  		    			$loop = new WP_Query( $args );
				  		    			if ($loop->have_posts()){?>
                                <ul>
                                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                                    <li>
                                        <?php the_content(); ?>
                                    </li>
                                    <?php endwhile;?>
                                </ul>
                                <?php 
				  		  	  			}else{
				  		  	  			//echo('qsqs');	
				  		  	  			}
				  		  	  			wp_reset_query(); // Remember to reset
				  		  	  		?>
                        </div>
                </div>
            </div>
        </div>
        <div class="testimonials-w3">
            <div class="container">
                <h3 class="tittle2">Le mot du président</h3>
                <div class="test-grid">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/quote.png" alt=/>
                    <?php
							$args = array( 'cat'=> 7);
							$loop = new WP_Query( $args );
							if ($loop->have_posts()){?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                        <h5><a href="<?php the_permalink();?>"><?php the_excerpt(); ?></a></h5>
                        <?php endwhile;?>
                        <?php 
								}else{
								//echo('qsqs');	
								}
								wp_reset_query(); // Remember to reset
							?>
                </div>
            </div>
        </div>
        <div class="new-w3agile">
            <div class="container">
                <div class="new-grids">
                    <div class="col-md-4 new-left">
                        <h3 class="tittle1">Agenda</h3>
                        <?php
							  			$args = array( 'cat'=> 9);
							  			$loop = new WP_Query( $args );
							  			if ($loop->have_posts()){?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                            <div class="new-top1">
                                <h5><?php the_title(); ?></h5>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                <a class="btn btn-default" role="button" href="<?php the_permalink();?>">En savoir plus</a>
                            </div>
                            <?php endwhile;?>
                            <?php 
								  			}else{
								  			//echo('qsqs');	
								  			}
								  			wp_reset_query(); // Remember to reset
								  		?>
                            <div class="actualites">
                                <?php get_sidebar(); ?>
                            </div>
                    </div>
                    <div class="col-md-8 new-right">
                        <h3 class="tittle1">Actualités</h3>
                        <?php
								  			$args = array( 'cat'=> 3);
								  			$loop = new WP_Query( $args );
								  			if ($loop->have_posts()){?>
                            <ul>
                                <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                                <li class="new-bottom">
                                    <h4><?php the_title(); ?></h4>
                                    <?php
														if ( has_post_thumbnail()) {
															the_post_thumbnail('medium', array('class' => 'img-responsive flota'));
														}
													?>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p>
                                        <a class="btn btn-default" role="button" href="<?php the_permalink();?>">En savoir plus</a>
                                </li>
                                <?php endwhile;?>
                            </ul>
                            <?php 
									  			}else{
									  			//echo('qsqs');	
									  			}
									  			wp_reset_query(); // Remember to reset
									  		?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--news-->
    </div>
    <!--content-->
    <?php get_footer(); ?>
