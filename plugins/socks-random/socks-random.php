<?php
/**
 * Plugin Name: Random Products Plugin for Socks Shop
 * Description: A WooCommerce plugin that displays random socks.
 * Version: 1.0
 * Author: Aristidas Jasudas
 */

// #Plugin Dashboard - Settings
function random_products_dashboard_page() {
	?>
	<div class="wrap">
		<h2>Random Products Settings</h2>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'random_products_settings_group' );
			do_settings_sections( 'random_products_settings_page' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

function random_products_admin_menu() {
	add_menu_page(
		'Random Products',
		'Random Products',
		'manage_options',
		'random-products-dashboard',
		'random_products_dashboard_page'
	);
}

add_action( 'admin_menu', 'random_products_admin_menu' );

function random_products_settings_init() {
	add_settings_section(
		'random_products_settings_section',
		'Random Products Settings',
		'',
		'random_products_settings_page'
	);

	add_settings_field(
		'random_products_quantity',
		'Number of Products to Show',
		'random_products_quantity_callback',
		'random_products_settings_page',
		'random_products_settings_section'
	);

	add_settings_field(
		'random_products_category',
		'Select a Product Category',
		'random_products_category_callback',
		'random_products_settings_page',
		'random_products_settings_section'
	);

	register_setting(
		'random_products_settings_group',
		'random_products_quantity',
		array(
			'sanitize_callback' => 'absint',
		)
	);
	register_setting(
		'random_products_settings_group',
		'random_products_category',
		array(
			'sanitize_callback' => 'absint',
		)
	);
}


// #This code generates input values in settings page
function random_products_quantity_callback() {
	$quantity = get_option( 'random_products_quantity', 5 ); // Default value is 5 products
	echo '<input type="number" name="random_products_quantity" min="1" value="' . esc_attr( $quantity ) . '" />';
}

function random_products_category_callback() {
	$current_category = get_option( 'random_products_category', '' ); // Default category is empty

	// Retrieve and display WooCommerce product categories
	$product_categories = get_terms( 'product_cat', array( 'hide_empty' => false ) );
	echo '<select name="random_products_category">';
	echo '<option value="">All Categories</option>';
	foreach ( $product_categories as $cat ) {
		echo '<option value="' . esc_attr( $cat->term_id ) . '" ' . selected( $current_category, $cat->term_id, false ) . '>' . esc_html( $cat->name ) . '</option>';
	}
	echo '</select>';
}
add_action( 'admin_init', 'random_products_settings_init' );



// #This code contains shortcode and logic for this short code
function random_products_shortcode( $atts ) {

	return get_random_products();

}

add_shortcode( 'random_products', 'random_products_shortcode' );


function get_random_products(): string {
	// Get the settings
	$quantity = get_option( 'random_products_quantity', 5 ); // Default to 5 if not set
	$category = get_option( 'random_products_category', '' );

	// Set up query arguments
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => $quantity,
		'orderby'        => 'rand',
	);
	if ( ! empty( $category ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $category,
			),
		);
	}

	// Perform the query
	$query = new WP_Query( $args );
	$output = '';
	// Come up with output
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $product;

			$output .= '<div class="product">';
			$output .= '<h2>' . get_the_title() . '</h2>';
			$output .= '<div>' . get_the_post_thumbnail( null, 'thumbnail' ) . '</div>';
			$output .= '<p>' . $product->get_price_html() . '</p>';
			$output .= '</div>';
		}
		wp_reset_postdata();
	} else {
		$output .= '<p>No products found.</p>';
	}
	return $output;
}

// #This adds Widget to dashboard page
function add_random_products_dashboard_widget() {
	wp_add_dashboard_widget(
		'random_products_dashboard_widget',
		'Random Products Dashboard',
		'display_random_products_dashboard_widget'
	);
}

function display_random_products_dashboard_widget() {
	echo '<p>This is the Random Products Dashboard Widget.</p>';
	echo '<p><a href="' . admin_url( 'admin.php?page=random-products-dashboard' ) . '">Go to Random Products (Socks) Dashboard</a></p>';
}

add_action( 'wp_dashboard_setup', 'add_random_products_dashboard_widget' );
