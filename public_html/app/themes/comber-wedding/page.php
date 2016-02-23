<?php
/**
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */

$background = '';
if (has_post_thumbnail( $post->ID ) ):
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
	$background = 'style="background-image: url('.$image.')"';
endif;

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

	<section id="primary">
		<div class="large-8 columns">
			<?php
			if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="panel">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="large-4 columns">
			<div class="panel">
				Sidebar for photos
				<?php
					$images = array();
					array_push($images, get_field('image_one'), get_field('image_two'), get_field('image_three'));
					foreach($images as $image) {
                        if(!empty($image)) {
                            echo '<br>image id is'.$image ;
                        } else {
                            echo '<br>no image';
                        }
                    }
				?>
			</div>
		</div>
	</section>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>