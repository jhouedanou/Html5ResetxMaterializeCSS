<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<div class="banner-w3agile">
	<div class="container">
		<h3><?php single_cat_title(); ?></h3>
	</div>
</div>
		<div class="content">
			<div class="staff-w3l">
				<div class="container">
					<div class="staff-grids grid">
			<?php //post_navigation(); ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
						<div class="col-md-4 staff-grid grid-item">

							<div class="staff-right new-right">
									<?php
										if ( has_post_thumbnail()) {
											the_post_thumbnail('medium', array('class' => 'riches'));
										}
									?>
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt(); ?></p>
									 <a class="btn btn-default" role="button" href="<?php the_permalink();?>">En savoir plus</a>

							</div>
						</div>
									<?php endwhile; ?>

					</div>
				</div>
			</div>
		</div>
			<?php //post_navigation(); ?>
		<div class="lecrea">
			<?php echo easy_wp_pagenavigation(); ?>
		</div>
			

	<?php else : ?>

		<h2><?php _e('Nothing Found','html5reset'); ?></h2>

	<?php endif; ?>

							<div class="clearfix"> </div>
						</div>
					<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/smoothbox.jquery2.js"></script>
				</div>
			</div>
		</div>		


			

<?php get_footer(); ?>
