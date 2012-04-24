<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>							
<li class="widget png_scale" id="categories_id">
<div id="searchblock">
 <h2 class="blocktitle"><span>Search</span></h2>
 <?php get_search_form( $echo ); ?>
</div><!-- #searchblock -->
 <h2 class="blocktitle"><span>Categories</span></h2>	
 <ul>
<?php wp_list_categories('exclude=99,100&title_li='); ?>
</ul>		
</li>
<li class="widget png_scale" id="text_id">
<h2 class="blocktitle">Previous Articles</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>

    
<li class="widget png_scale" id="meta">
<h2 class="blocktitle">Connect</h2>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li class="rss"><?php $t_feedburnerurl = t_get_option('t_feedburnerurl'); if ($t_feedburnerurl == '') {?>
							<a href="<?php bloginfo('rss2_url'); ?>">Read in RSS</a>
							<?php } else { ?>
							<a href="<?php echo $t_feedburnerurl ?>">Read in RSS</a>
							<?php } ?>
</li>




<?php wp_meta(); ?>
</ul>

</li> 






<li class="widget png_scale" id="meta">
<h2 class="blocktitle">Meta</h2>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li class="rss"><?php $t_feedburnerurl = t_get_option('t_feedburnerurl'); if ($t_feedburnerurl == '') {?>
							<a href="<?php bloginfo('rss2_url'); ?>">Read in RSS</a>
							<?php } else { ?>
							<a href="<?php echo $t_feedburnerurl ?>">Read in RSS</a>
							<?php } ?>
</li>




<?php wp_meta(); ?>
</ul>

</li> 






 <?php endif; ?> 
</ul>