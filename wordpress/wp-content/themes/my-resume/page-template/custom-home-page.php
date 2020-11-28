<?php
/**
 * Template Name: Custom Home
 */
?>
<?php get_header(); ?>
	
<main id="skip-content" role="main">
	<div class="row">
		<div class="col-lg-8 col-md-12 p-0">
			<?php do_action( 'my_resume_above_banner' ); ?>
			<section id="banner">
			    <?php $my_resume_banner_pages = array();
		        $mod = intval( get_theme_mod( 'my_resume_banner_page'));
		        if ( 'page-none-selected' != $mod ) {
		          	$my_resume_banner_pages[] = $mod;
		        }
		      	if( !empty($my_resume_banner_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $my_resume_banner_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
				      	while ( $query->have_posts() ) : $query->the_post(); ?>
			            	<div class="banner-content">
			            		<div class="row">
			            			<div class="col-lg-6 col-md-6">
						              	<div class="logo">
											<?php if ( has_custom_logo() ) : ?>
									    		<?php the_custom_logo(); ?>
									        <?php endif; ?>
									      	<?php $blog_info = get_bloginfo( 'name' ); ?>
									            <?php if ( ! empty( $blog_info ) ) : ?>
									              	<?php if ( is_front_page() && is_home() ) : ?>
									                	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									              	<?php else : ?>
									              		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									          		<?php endif; ?>
									            <?php endif; ?>
									            <?php
									          		$description = get_bloginfo( 'description', 'display' );
									              	if ( $description || is_customize_preview() ) :
									            ?>
									          	<p class="site-description">
									            	<?php echo esc_attr($description); ?>
									          	</p>
									      	<?php endif; ?>
									    </div>
					              	</div>
					              	<div class="col-lg-6 col-md-6">
						              	<p class="designation"><?php echo esc_html(get_theme_mod('my_resume_banner_designation','')); ?></p>
					              	</div>
				              	</div>
			              	</div>
			              	<div class="banner-img">
				          		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?> "/></a>
				          		<div class="social-icons">
						    		<?php if (get_theme_mod('my_resume_facebook') != '') { ?>
						    			<a href="<?php echo esc_url(get_theme_mod('my_resume_facebook')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e('Facebook', 'my-resume'); ?></span></a>
						    		<?php }?>
						    		<?php if (get_theme_mod('my_resume_twitter') != '') { ?>
						    			<a href="<?php echo esc_url(get_theme_mod('my_resume_twitter')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e('Twitter', 'my-resume'); ?></span></a>
						    		<?php }?>
						    		<?php if (get_theme_mod('my_resume_linkedin') != '') { ?>
						    			<a href="<?php echo esc_url(get_theme_mod('my_resume_linkedin')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e('Linkedin', 'my-resume'); ?></span></a>
						    		<?php }?>
						    	</div>
						    </div>
				      	<?php endwhile; 
				      	wp_reset_postdata();?>
				    <?php else : ?>
				    	<div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			  	<div class="clearfix"></div>
			</section>
		</div>
		<div class="col-lg-4 col-md-12 p-0">
			<section class="testimonials">
				<?php if (get_theme_mod('my_resume_testimonial_title') != '') {?>
					<div class="testimonial-title">
						<h3><?php echo esc_html(get_theme_mod('my_resume_testimonial_title','')); ?></h3>
					</div>
				<?php } ?>
				<div class="row m-0">
					<?php 
		      		$my_resume_catData=  get_theme_mod('my_resume_testimonials_cat');
		            if($my_resume_catData){
			            $page_query = new WP_Query(array( 
			            	'category_name' => esc_html( $my_resume_catData ,'my-resume'),
			            	'posts_per_page' => 3
			            ));?>
			        	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
			        		<div class="col-lg-12 col-md-4">
								<div class="testimonial-box">  
									<div class="row">
										<div class="testimonial-img col-lg-3 col-md-12">
								      		<?php the_post_thumbnail(); ?>
								      	</div>
								      	<div class="col-lg-9 col-md-12">
								        	<div class="testimonial-content">
							            		<h4><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h4>
							            		<p><?php the_content(); ?></p>
						            		</div>
						            	</div>
					            	</div>
								</div>
							</div>
					  		<div class="clearfix"></div>    	
		          		<?php endwhile; 
			          	wp_reset_postdata();
		      		} ?>
		      	</div>
			</section>
		</div>
	</div>

	<?php do_action('my_resume_below_banner'); ?>

	<?php /*--- Our Skills ---*/ ?>
	<section id="our_skill">
		<div class="container">
			<?php if (get_theme_mod('my_resume_skills_title') != '') {?>
				<div class="skill-title">
					<h3><?php echo esc_html(get_theme_mod('my_resume_skills_title', '')); ?></h3>
				</div>
			<?php } ?>
      		<div class="row">
	      		<?php 
	      		$my_resume_catData=  get_theme_mod('my_resume_skills_cat');
	            if($my_resume_catData){
		            $page_query = new WP_Query(array( 'category_name' => esc_html( $my_resume_catData ,'my-resume')));?>
		        	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?> 
		        		<div class="col-lg-3 col-md-6">
							<div class="skill-box">  
		          				<div class="skill-img">
						      		<?php the_post_thumbnail(); ?>
						      	</div>
					        	<div class="skill-content">
				            		<h4><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h4>
				            		<p><?php $excerpt = get_the_excerpt(); echo esc_html( my_resume_string_limit_words( $excerpt,10 ) ); ?></p>
				            		<div class="more-btn">
								      	<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','my-resume'); ?><i class="fas fa-plus"></i><span class="screen-reader-text"><?php esc_html_e('Read More','my-resume'); ?></span></a>
								    </div>
			            		</div>
							</div>
						</div>
				  		<div class="clearfix"></div>    	
	          		<?php endwhile; 
		          	wp_reset_postdata();
	      		} ?>
	      	</div>
		</div>
	</section>

	<?php do_action('my_resume_below_services_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>