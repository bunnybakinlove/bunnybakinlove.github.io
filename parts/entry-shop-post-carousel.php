<?php
/**
 * Shop Post Carousel
 *
 * @package Cressida
 */
$cressida_post_meta_items       = get_post_meta( get_the_ID(), 'lt_shop_post_meta', true );
$cressida_post_meta_items_intro = get_post_meta( get_the_ID(), 'lt_shop_post_meta_intro', true );

if ( ! empty( $cressida_post_meta_items ) ) :
	$cressida_items_number = count( $cressida_post_meta_items );

	if ( $cressida_items_number > 4 ) :
		$cressida_row_class = 'featured-promote-box-carousel';
		$cressida_item_class = '';
	else :
		$cressida_row_class = 'row';
		$cressida_item_class = 'col';
	endif;

	if ( isset( $cressida_post_meta_items_intro['title'] ) && ! empty( $cressida_post_meta_items_intro['title'] ) ) : ?>
		<h3 class="widget-title">
			<span><?php echo esc_html( $cressida_post_meta_items_intro['title'] ); ?></span>
		</h3>
	<?php endif; // isset( $cressida_post_meta_items_intro['title'] ) ?>

<div class="<?php echo esc_attr( $cressida_row_class ); ?>">

	<?php foreach ( $cressida_post_meta_items as $cressida_item ) :

		if ( ! empty( $cressida_item['image'] ) ) : ?>

			<div class="featured-promote-box-item <?php echo esc_attr( $cressida_item_class ); ?>">
				<div class="single-promo-widget single-promo-widget-item widget widget_text">
					<div class="promote-box-widget">
						<div class="textwidget">

							<div class="promote-box-action">
								<?php if ( $cressida_item['url'] ) : ?>
									<a href="<?php echo esc_url( $cressida_item['url'] ); ?>" target="_blank">
								<?php endif; // $cressida_item['url'] ?>

								<?php if ( $cressida_item['image'] ) : ?>
									<div class="promote-box-image">
										<img class="img-responsive" src="<?php echo esc_url( $cressida_item['image'] ); ?>">
									</div>
								<?php endif; // $cressida_item['image'] ?>

								<?php if ( $cressida_item['url'] ) : ?>
									</a>
								<?php endif; // $cressida_item['url'] ?>
							</div><!-- promote-box-action -->
						</div><!-- textwidget -->
					</div><!-- promote-box-widget -->
				</div>
			</div>

		<?php endif;

		endforeach; ?>

</div><!-- row promote-box-carousel -->
<?php endif;