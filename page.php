<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
		<div class="banner-w3agile">
			<div class="container">
				<h3><?php the_title(); ?></h3>
			</div>
		</div>
		<div class="content">
				<div class="staff-w3l">
					<div class="container">
						<div class="staff-grids">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-md-8 staff-grid">

								<div class="staff-right">
										<?php the_content(); ?>
											<?php comments_template(); ?>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="retina col-md-4">
								<div class="angrud">
									<?php get_sidebar(); ?>
								</div>
							</div>
					</div>
				</div>
		</div>	

			<?php edit_post_link(__('Edit this entry','html5reset'),'','.'); ?>
			
	<?php endwhile; endif; ?>

<?php get_footer(); ?>