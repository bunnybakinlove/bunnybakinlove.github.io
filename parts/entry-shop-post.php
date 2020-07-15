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
	$cressida_items = array();

	if ( $cressida_items_number > 4 ) :
		$cressida_items = array_slice( $cressida_post_meta_items, 0, 4 );
		$cressida_view_more = '<div class="row">';
		$cressida_view_more .= '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '#shop-this-post-carousel-wrap" class="col text-center promote-box-more">';
		$cressida_view_more .= esc_html__( 'View more items &raquo;', 'cressida' );
		$cressida_view_more .= '</a>';
		$cressida_view_more .= '</div><!-- row -->';
	else :
		$cressida_items = $cressida_post_meta_items;
		$cressida_view_more = '';
	endif;

	?>

	<div class="featured-promote-box">
		<div class="row">
			<?php foreach ( $cressida_items as $cressida_item ) :
				if ( ! empty( $cressida_item['image'] ) ) : ?>
					<div class="featured-promote-box-item col">
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
						</div><!-- single-promo-widget single-promo-widget-item widget widget_text -->
					</div><!-- featured-promote-box-item col-->
				<?php endif; // ! empty( $cressida_item['image'] )
				endforeach;
			?>
		</div><!-- row -->

		<?php echo $cressida_view_more; // WPCS: XSS ok. ?>
	</div><!-- featured-promote-box -->

<?php endif; // ! empty( $cressida_post_meta_items )