<?php

$search_query = get_search_query();

$theme_options = get_option('ct_theme_options');
$ct_search_results_title = $theme_options['search_results_title'];
$page_layout = $theme_options['search_results_layout'];

if(empty($ct_search_results_title)): $ct_search_results_title =  __('Search Results', 'churchthemes'); endif;

get_header(); ?>
		<div id="ribbon" class="page">
			<div class="container_12 content">
				<div class="grid_7 alpha">
					<h1><?php echo $ct_search_results_title; ?></h1>
				</div>
				<div class="grid_5 omega">
					<span class="tagline">&quot;<?php echo $search_query;?>&quot;</span>
				</div>
			</div>
		</div>
		<div id="wrapper3" class="container_12">
<?php
	if($page_layout == 'left'):
		get_sidebar();
?>
			<div id="content" class="grid_8 omega">
<?php
	elseif($page_layout == 'full'):
?>
			<div id="content" class="grid_12 alpha">
<?php
	else:
?>
			<div id="content" class="grid_8 alpha">
<?php
	endif;
?>
<?php $i = 0; if(have_posts()): while(have_posts()): the_post(); $i++; ?>
				<div <?php if($i == 1): echo post_class('post first'); else: post_class('post'); endif; ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'churchthemes'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="excerpt">
						<div class="image"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark"><?php echo get_the_post_thumbnail($post->ID, 'archive'); ?></a></div>
						<p><?php the_excerpt(); ?><p>
					</div>
					<div class="clear"></div>
				</div>
<?php endwhile; else: ?>
				<div <?php post_class('post first'); ?>>
					<h2><?php _e('No results found', 'churchthemes'); ?></h2>
					<p><?php _e('Sorry, nothing was found matching that criteria. Please try your search again.', 'churchthemes'); ?></p>
					<?php get_search_form(); ?>
				</div>
<?php endif; ?>
<?php pagination(); ?>
			</div>
<?php if($page_layout == 'right' || empty($page_layout)): get_sidebar(); endif; ?>
		</div>
<?php get_footer(); ?>