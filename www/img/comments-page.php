<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package okna
 */

get_header(); ?>

	<div id="about" class="content-area">
		<div class="main">
		<?php the_post(); ?>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
			<h2>Фотогалерея</h2>
			<div id="aniimated-thumbnials">
				<?php if( have_rows('foto-gallery') ): ?>
					<?php while( have_rows('foto-gallery') ): the_row();?>
					  <a href="<?= get_sub_field('fotos');?>">
					    <img src="<?= get_sub_field('fotos');?>" />
					  </a>
					<?php endwhile; endif; ?>
			</div>
		</div><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
