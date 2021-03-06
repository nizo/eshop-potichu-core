<?php
global $avia_config;


// check if we got posts to display:
if (have_posts()) :
	$first = true;

	$counterclass = "";
	$post_loop_count = 1;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if($page > 1) $post_loop_count = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) +1;
	$blog_style = avia_get_option('blog_style','multi-big');


	while (have_posts()) : the_post();


	$the_id 		= get_the_ID();
	$parity			= $post_loop_count % 2 ? 'odd' : 'even';
	$last           = count($wp_query->posts) == $post_loop_count ? " post-entry-last " : "";
	$post_class 	= "post-entry-".$the_id." post-loop-".$post_loop_count." post-parity-".$parity.$last." ".$blog_style;
	$post_format 	= get_post_format() ? get_post_format() : 'standard';

	?>

	<article <?php post_class('post-entry post-entry-type-'.$post_format . " " . $post_class . " "); avia_markup_helper(array('context' => 'entry')); ?>>
        <div class="entry-content-wrapper clearfix <?php echo $post_format; ?>-content">

            <header class="entry-content-header">
                <?php
				$featuredImageURL = '';				
				if (has_post_thumbnail( $post->ID ) ):
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );					
					$featuredImageURL = $image[0];					
				endif;
			
                echo "<span class='search-result-counter {$counterclass}' style=\"background-image: url('" . $featuredImageURL . "');\"></span>";
								

				
                //echo the post title
                $markup = avia_markup_helper(array('context' => 'entry_title','echo'=>false));
                echo "<h2 class='post-title entry-title'><a title='".the_title_attribute('echo=0')."' href='".get_permalink()."' $markup>".get_the_title()."</a></h2>";

            ?> 
            </header>
			

            <?php
                echo '<div class="entry-content" '.avia_markup_helper(array('context' => 'entry_content','echo'=>false)).'>';
                $excerpt = trim(get_the_excerpt());
                if(!empty($excerpt))
                {
                    echo get_the_excerpt();
                }
                else
                {
                    $excerpt = strip_shortcodes( get_the_content() );
                    $excerpt = apply_filters('the_excerpt', $excerpt);
                    $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
                    echo $excerpt;
                }
                echo '</div>';
            ?>
        </div>

        <footer class="entry-footer"></footer>
        
        <?php do_action('ava_after_content', $the_id, 'loop-search'); ?>
	</article><!--end post-entry-->

	<?php


		$first = false;
		$post_loop_count++;
		if($post_loop_count >= 100) $counterclass = "nowidth";
	endwhile;
	else:


?>

	<article class="entry entry-content-wrapper clearfix" id='search-fail'>
            <p class="entry-content" <?php avia_markup_helper(array('context' => 'entry_content')); ?>>
                <strong><?php _e('Nothing Found', 'avia_framework'); ?></strong><br/>               
            </p>

            <div class='hr_invisible'></div>

            <section class="search_not_found">
                <p><?php _e('You might want to consider some of our suggestions to get better results:', 'avia_framework'); ?></p>
                <ul>
                    <li><?php _e('Check your spelling.', 'avia_framework'); ?></li>
                    <li><?php _e('Try a similar keyword, for example: tablet instead of laptop.', 'avia_framework'); ?></li>
                    <li><?php _e('Try using more than one keyword.', 'avia_framework'); ?></li>
                </ul>

                <div class='hr_invisible'></div>                

        <?php  
        echo '</section>';
	echo "</article>";

	endif;
	echo avia_pagination('', 'nav');
?>
