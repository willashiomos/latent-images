<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.post-item').hover(function(){
				$(this).find('.post-title').css({'text-decoration': 'underline'});
                $(this).find('.post-title').css({'text-decoration-color': '#506CCF'});
			}, function() {
				$(this).find('.post-title').css('text-decoration', 'none');
			});
		});
	</script>
</head>

<?php
	/**
	 * Category Page
	 * @package latentimages
	 */

	get_header();
?>
<div class="body" style="padding-top: 110px;">
    <div class="page-container mt-5">
        <div class="row no-gutters section-title"><?php single_cat_title("")?></div>
        <div class="row horizontal-line line-hide mb-5"></div>

        <div class="col-md-12">
            <div class="row">
                <?php $posts = new WP_Query(array(
                        'cat' => get_query_var('cat'),
                        'orderby' => 'post_date',
                        'order' => 'DESC'
                    ));
                if ($posts -> have_posts()) {
                    while ($posts -> have_posts()):
                        $posts -> the_post();
                        $date = get_the_date('m \- d \- Y');
                ?>
                    <div class="post-item col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 60px;">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full category-post-thumbnail mb-4']);?>
                        </a>
                        <div class="post-date mb-1 text-pink"><?php echo $date?></div>
                        <a href="<?php the_permalink(); ?>" class="post-title"><?php echo the_title()?></a>
                    </div>
                    <?php
                    endwhile;
                } else { ?>
                    <h1 class="mb-4">Posts Coming Soon</h1>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <?php
        get_footer();
    ?>
</div>