<article class="entry-item-media">
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-item-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'brittany_light_square' ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="entry-item-media-content">
		<p class="entry-meta">
			<?php brittany_light_the_post_entry_sticky_label(); ?>

			<time class="entry-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</p>

		<h2 class="entry-item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</div>
</article>
