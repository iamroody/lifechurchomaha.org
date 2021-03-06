<?php
/**
 * Template Name: Blog
 * 
 * The template for displaying the Blog page.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ChurchThemes
 */

$page_options_meta = get_post_meta($post->ID,'_page_options',true);
isset($page_options_meta['ct_page_layout']) ? $page_layout = $page_options_meta['ct_page_layout'] : $page_layout = null;
isset($page_options_meta['ct_page_sidebar']) ? $page_sidebar = $page_options_meta['ct_page_sidebar'] : $page_sidebar = null;
isset($page_options_meta['ct_page_tagline']) ? $page_tagline = $page_options_meta['ct_page_tagline'] : $page_tagline = null;
isset($page_options_meta['ct_social_footer']) ? $page_social = $page_options_meta['ct_social_footer'] : $page_social = null;

get_header();

?>
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
<?php
	if($page_layout == 'left'): get_sidebar();
?>
			<div id="content" class="grid_8 omega">
<?php
	elseif($page_layout == 'full'):
?>
			<div id="content" class="grid_12 alpha">
<?php
	else:
?>
			<div id="content" class="grid_8 alpha">what?
<?php
	endif;
?>
<?php

	get_template_part('loop');

?>
			</div>
<?php if($page_layout == 'right' || empty($page_layout)): get_sidebar(); endif; ?>
		</div>
<?php get_footer(); ?>
