<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage ChurchThemes
 */

$page_options_meta = get_post_meta($post->ID,'_page_options',true);
isset($page_options_meta['ct_page_layout']) ? $page_layout = $page_options_meta['ct_page_layout'] : $page_layout = null;
isset($page_options_meta['ct_page_sidebar']) ? $page_sidebar = $page_options_meta['ct_page_sidebar'] : $page_sidebar = null;
isset($page_options_meta['ct_page_tagline']) ? $page_tagline = $page_options_meta['ct_page_tagline'] : $page_tagline = null;
isset($page_options_meta['ct_social_footer']) ? $page_social = $page_options_meta['ct_social_footer'] : $page_social = null;

get_header(); ?>
		<div id="ribbon" class="page">
			<div class="container_12 content">
				<div class="<?php if(!empty($page_tagline)): ?>grid_8<?php else: ?>grid_12<?php endif; ?> alpha">
					<h1><?php the_title(); ?></h1>
				</div>
<?php if(!empty($page_tagline)): ?>
				<div class="grid_4 omega">
					<span class="tagline"><?php echo $page_tagline; ?></span>
				</div>
<?php endif; ?>
			</div>
		</div>
		<div id="wrapper3" class="container_12">
<?php if($page_layout == 'left'): get_sidebar(); endif; ?>
			<div id="content" class="<?php if($page_layout == 'full'): echo 'grid_12'; else: echo 'grid_8'; endif; ?> <?php if($page_layout == 'left'): echo 'omega'; else: echo 'alpha'; endif; ?>">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php
					wp_link_pages(array(
						'before' => '' . __('Pages:', 'churchthemes'),
						'after' => ''
					));
				?>
				<?php edit_post_link( __('Edit this page', 'churchthemes'), '', ''); ?>
				<?php comments_template('', true); ?>
<?php endwhile; ?>
			</div>			
<?php if($page_layout == 'right' || empty($page_layout)): get_sidebar(); endif; ?>
		</div>
<?php get_footer(); ?>