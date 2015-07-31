<?php get_header(); ?>

<div class="content">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php $post_format = get_post_format(); ?>
				
			<?php if ( $post_format == 'gallery' ) : ?>
			
				<div class="featured-media">	
	
					<?php rams_flexslider('post-image'); ?>
					
				</div> <!-- /featured-media -->
			
			<?php elseif ( has_post_thumbnail() ) : ?>
					
				<div class="featured-media">
		
					<?php the_post_thumbnail('post-image'); ?>
					
				</div> <!-- /featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner">
				
				<div class="post-header">
													
					<p class="post-date">
					
						<a href="<?php the_permalink(); ?>" title="<?php the_time('h:i'); ?>"><?php the_time(get_option('date_format')); ?></a>
						
					</p>
											
					<h2 class="post-title"><?php the_title(); ?></h2>
															
				</div> <!-- /post-header -->
				    
			    <div class="post-content">
			    
			    	<?php the_content(); ?>
			    
			    </div> <!-- /post-content -->
			    
			    <div class="clear"></div>
			
			</div> <!-- /post-inner -->
			
			<?php 
		    	$args = array(
					'before'           => '<div class="clear"></div><p class="page-links"><span class="title">' . __( 'Pages:','rams' ) . '</span>',
					'after'            => '</p>',
					'link_before'      => '<span>',
					'link_after'       => '</span>',
					'separator'        => '',
					'pagelink'         => '%',
					'echo'             => 1
				);
	    	
	    		wp_link_pages($args); 
			?>
			
		</div> <!-- /post -->
				
		<div class="comments-container">
							
			<?php comments_template( '', true ); ?>
			
		</div> <!-- /comments-container -->
									                        
   	<?php endwhile; else: ?>

		<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "rams"); ?></p>
	
	<?php endif; ?>    

</div> <!-- /content -->
		
<?php get_footer(); ?>
