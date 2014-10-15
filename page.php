<?php get_header(); ?>

<?php if( is_page('Welcome to Side') ) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="row">
    	<div class="large-8 columns">
	    	<div class="slideshow-wrapper">
		    	<div class="preloader"></div>
				<ul data-orbit data-options="timer_speed:4500; bullets:false; slide_number:false;">
        		<?php
    				$args = array (
    					'post_type' => 'slider',
    					'category_name' => 'home-page',
    					'posts_per_page' => '5'
    				);
    				$awards = new WP_Query( $args );
    				if ( $awards->have_posts() ) {
    					while ( $awards->have_posts() ) {
    						$awards->the_post();
    			?>
    					<li><?php the_post_thumbnail('large'); ?></li>
    			<?php
    					}
    				} else {
    					// no posts found
    				}
    				wp_reset_postdata();    		
        		?>			
    			</ul>
		    </div>
    	</div>
    	<div class="large-3 columns hide-for-small">
			<?php
				$devices = array(
				"iphone", "ipod",
				"android", "windows ce", "windows phone os",
				"blackberry", "palm", "symbian", "series60"
				);
				if(!mobile_detected($devices)) :
			?>
			<ul class="twitter">
			<?php
				    dynamic_sidebar('tweets');
			?>
			</ul>
			<?php endif; ?>
    	</div>
    	<div class="large-1 columns"></div>
	</div>
	  	
    <?php endwhile; ?>

    <?php else : ?>
    
    <?php endif; ?>
    
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div> 
    
	<div class="row" id="page-awards">
		<div class="large-12 columns">
			<h3 class="awards">Latest Projects</h3>
		</div>
	</div> 
	
	<div class="row">
   		<?php
   			$args = array (
   				'post_type' => 'projects',
   				'posts_per_page' => '3',
   				'category_name' => 'english-language-projects',
   				'orderby' => 'menu_order'
   			);
   			$work = new WP_Query( $args );
   			if ( $work->have_posts() ) {
   				while ( $work->have_posts() ) {
   					$work->the_post();
   		?>
   				<div class="large-4 columns">
   					<div class="row">
   						<div class="small-6 large-12 columns">
	   						<p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider'); ?></a></p>
   						</div>
   						<div class="small-6 large-12 columns">
	   						<p class="projectTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
   						</div>
   					</div>
   				</div>
   		<?php
   				}
   			} else {
   				// no posts found
   			}
   			wp_reset_postdata();    		
   		?>		
	</div>
    
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div> 
    
	<div class="row" id="page-awards">
		<div class="large-12 columns">
			<h3 class="inside">InSIDE</h3>
		</div>
	</div> 
	
	<div class="row">
	   	<div class="large-12 columns">
			<div id="news">
			<?php 
				$args = array (
					'post_type' => 'post',
					'posts_per_page' => '10',
				);
				$news = new WP_Query( $args );
				if ( $news->have_posts() ) {
					while ( $news->have_posts() ) {
						$news->the_post(); 
			?>
				<div class="newsStory">
				<p class="title closed"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><span class="inSIDEtitle"><?php the_title(); ?></span><span class="date"><?php the_time('M Y') ?></span></a></p>
				<div class="content">
					<div class="row" id="post-<?php the_ID(); ?>">

					</div>
				</div>
			</div>
			<?php 
					}
				} else {
					// no posts found
				}
				wp_reset_postdata(); 
			?>	
			</div>
	   	</div>	
	</div>
	
	<div class="row">
		<div class="large-10 columns hide-for-medium-up">
			<?php
				$devices = array(
				"iphone", "ipod",
				"android", "windows ce", "windows phone os",
				"blackberry", "palm", "symbian", "series60"
				);
				if(mobile_detected($devices)) :
			?>
			<hr />
			<ul class="twitter">
			<?php
				    dynamic_sidebar('tweets');
			?>
			</ul>
			<br />
			<?php endif; ?>
		</div>
	</div>
	
	
<?php } ?>

<?php if( is_page('About Side') ) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="home">
		<div class="large-12 columns">
		</div>
	</div>
	<div class="row">
    	<div class="large-12 columns">
    		<p><?php the_post_thumbnail('header'); ?></p>
	    	<?php the_content(); ?>
	    	<hr />
    	</div>
	</div>
	  	
    <?php endwhile; ?>

    <?php else : ?>
    
    <?php endif; ?>

	<div class="row" id="page-awards">
		<div class="large-12 columns">
			<h3 class="awards">Awards</h3>
		</div>
	</div>  

	<div class="row" id="awardsSection">
		<div class="large-4 columns">
			<img src="<?php global $post; $image = get_post_meta( $post->ID, '_cmb_image', true ); echo $image;  ?>">
		</div>
		<div class="large-8 columns">
			<p><strong>Develop Industry Excellence Awards</strong></p>
			<dl class="awardlist">
    		<?php
				$args = array (
					'post_type' => 'awards',
					'posts_per_page' => '100',
					'order' => 'ASC',
					'orderby' => 'menu_order',
				);
				$awards = new WP_Query( $args );
				if ( $awards->have_posts() ) {
					while ( $awards->have_posts() ) {
						$awards->the_post();
			?>
					<dt><span><?php global $post; $year = get_post_meta( $post->ID, '_cmb_year', true ); echo $year;  ?></span> <?php the_title(); ?></dt>
						<dd><?php global $post; $extra = get_post_meta( $post->ID, '_cmb_extra', true ); echo $extra;  ?></dd>
			<?php
					}
				} else {
					// no posts found
				}
				wp_reset_postdata();    		
    		?>		
			</dl>
		</div>
		<div class="large-4 columns"> </div>
	</div>
	
	
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">
			<h3 class="biog">Biographies</h3>
		</div>
	</div>
	
	<div class="row">
		<div id="news">
			<?php
				$args = array (
					'post_type' => 'founder',
					'order' => 'ASC',
					'orderby' => 'id',
				);
				$founder = new WP_Query( $args );
				if ( $founder->have_posts() ) {
					while ( $founder->have_posts() ) {
						$founder->the_post();
			?>
			<div class="large-4 columns">
				<?php the_post_thumbnail('slider'); ?>
				<div class="newsStory">
					<p class="title closed"><a href="#"><?php the_title(); ?><br /><em><?php global $post; $image = get_post_meta( $post->ID, '_cmb_job_title', true ); echo $image;  ?></em></a></p>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
					}
				} else {
	
				}
				wp_reset_postdata();		
			?>
		</div>
	</div>

<?php } ?>

<?php if( is_page('Selected Projects') ) { ?>

	<div class="row" id="home">
		<div class="large-12 columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
			
		    <?php endwhile; ?>
		
		    <?php else : ?>
		    
		    <?php endif; ?>	

		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">		
			<ul class="cat_list">
				<li><a href="#" data-filter=".english-language-projects">English language projects</a></li>
				<li><a href="#" data-filter=".localisation-projects">Localisation projects</a></li>
			</ul>
				<ul class="row" id="filtered">
				<?php
					$args = array (
						'post_type' => 'projects',
						'posts_per_page' => '18',
 						'category_name' => 'filtered-projects',
					);
					$projects = new WP_Query( $args );if ( $projects->have_posts() ) {
						while ( $projects->have_posts() ) {
							$projects->the_post();
				?>	
					<li class="large-4 columns <?php $post_cats = get_the_category(); foreach( $post_cats as $category ) { echo $category->slug.' ';} ?>">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider'); ?></a>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>					
					</li>
				<?php
						}
					} else {
						// no posts found
					}
					
					// Restore original Post Data
					wp_reset_postdata();
				?>		
				</ul>
		</div>
	</div>	
	
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">
			<h3 class="list">Project List</h3>
		</div>
	</div>
	<div class="row">

		<?php
			$args = array (
				'post_type' => 'projects',
				'posts_per_page' => '1000',
				'order' => 'ASC',
				'orderby' => 'title'
			);
			
			// The Query
			$project = new WP_Query( $args );
			
			// The Loop
			if ( $project->have_posts() ) {
				while ( $project->have_posts() ) {
					$project->the_post();
		?>
			<div class="large-4 columns project">
				<p><?php the_title(); ?></p>
			</div>
		<?php
				}
			} else {
				// no posts found
			}
			
			// Restore original Post Data
			wp_reset_postdata();		
		?>
		
	</div>
    
<?php } ?>

<?php if( is_page('Contact') ) { ?>	

	<div class="row" id="home">
		<div class="large-12 columns"> </div>
		<div class="large-4 columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php the_content(); ?>
			
		    <?php endwhile; ?>
		
		    <?php else : ?>
		    
		    <?php endif; ?>			
		</div>
		<div class="large-5 columns">
			<img src="<?php echo get_template_directory_uri(); ?>/img/map.png" alt="map" />
		</div>
		<div class="large-3 columns">
			&nbsp;
		</div>
	</div>
	  
<?php } ?>

<?php get_footer(); ?>	