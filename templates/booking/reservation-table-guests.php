<?php
/**
 * Room guests
 *
 * This template can be overridden by copying it to yourtheme/hotelier/booking/reservation-table-guests.php.
 *
 * @author  Benito Lopez <hello@lopezb.com>
 * @package Hotelier/Templates
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php for ( $q = 0; $q < $quantity; $q++ ) : ?>

	<div class="reservation-table__room-guests reservation-table__room-guests--booking">

		<?php if ( $quantity > 1 ) : ?>
			<span class="reservation-table__room-guests-label"><?php echo sprintf( esc_html__( 'Number of guests (Room %d):', 'wp-hotelier' ), $q + 1 ); ?></span>
		<?php else : ?>
			<span class="reservation-table__room-guests-label"><?php esc_html_e( 'Number of guests:', 'wp-hotelier' ); ?></span>
		<?php endif; ?>

		<?php
		$adults_options = array();

		for ( $i = 1; $i <= $adults; $i++ ) {
			$adults_options[ $i ] = $i;
		}

		$adults_std = htl_get_reservation_table_guests_default_adults_selection( $adults, $item_key, $q );
		$adults_std = apply_filters( 'hotelier_reservation_table_guests_default_selection_adults', $adults_std );

		$adults_args = array(
			'type'    => 'select',
			'label'   => esc_html__( 'Adults', 'wp-hotelier' ),
			'class'   => array(),
			'default' => $adults_std,
			'options' => $adults_options
		);

		htl_form_field( 'adults[' . $item_key . '][' . $q . ']', $adults_args );

		if ( $children > 0 ) {
			$children_options = array();

			for ( $i = 0; $i <= $children; $i++ ) {
				$children_options[ $i ] = $i;
			}

			$children_std = htl_get_reservation_table_guests_default_children_selection( 0, $item_key, $q );
			$children_std = apply_filters( 'hotelier_reservation_table_guests_default_selection_children', $children_std );

			$children_args = array(
				'type'    => 'select',
				'label'   => esc_html__( 'Children', 'wp-hotelier' ),
				'class'   => array(),
				'default' => $children_std,
				'options' => $children_options
			);

			htl_form_field( 'children[' . $item_key . '][' . $q . ']', $children_args );
		} ?>
	</div>

<?php endfor; ?>
