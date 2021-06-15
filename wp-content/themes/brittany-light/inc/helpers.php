<?php
function brittany_light_wrap_archive_widget_post_counts_in_span( $output ) {
	$output = preg_replace_callback( '#(<li>.*?<a.*?>.*?</a>.*&nbsp;)(\(.*?\))(.*?</li>)#', 'brittany_light_replace_archive_widget_post_counts_in_span', $output );

	return $output;
}

function brittany_light_replace_archive_widget_post_counts_in_span( $matches ) {
	return sprintf( '%s<span class="ci-count">%s</span>%s',
		$matches[1],
		$matches[2],
		$matches[3]
	);
}

function brittany_light_wrap_category_widget_post_counts_in_span( $output, $args ) {
	if ( ! isset( $args['show_count'] ) || 0 === (int) $args['show_count'] ) {
		return $output;
	}
	$output = preg_replace_callback( '#(<a.*?>\s*)(\(.*?\))#', 'brittany_light_replace_category_widget_post_counts_in_span', $output );

	return $output;
}

function brittany_light_replace_category_widget_post_counts_in_span( $matches ) {
	return sprintf( '%s<span class="ci-count">%s</span>',
		$matches[1],
		$matches[2]
	);
}


/**
 * Returns the appropriate page(d) query variable to use in custom loops (needed for pagination).
 *
 * @uses get_query_var()
 *
 * @param int $default_return The default page number to return, if no query vars are set.
 * @return int The appropriate paged value if found, else 0.
 */
function brittany_light_get_page_var( $default_return = 0 ) {
	$paged = get_query_var( 'paged', false );
	$page  = get_query_var( 'page', false );

	if ( false === $paged && false === $page ) {
		return $default_return;
	}

	return max( $paged, $page );
}

/**
 * Returns just the URL of an image attachment.
 *
 * @param int $image_id The Attachment ID of the desired image.
 * @param string $size The size of the image to return.
 * @return bool|string False on failure, image URL on success.
 */
function brittany_light_get_image_src( $image_id, $size = 'full' ) {
	$img_attr = wp_get_attachment_image_src( intval( $image_id ), $size );
	if ( ! empty( $img_attr[0] ) ) {
		return $img_attr[0];
	}
}

if ( ! function_exists( 'mb_str_replace' ) ) :
	/**
	 * Multi-byte version of str_replace.
	 *
	 * @param string $needle The value being searched.
	 * @param string $replacement The value that replaces the found needle.
	 * @param string $haystack The string being searched and replaced on.
	 * @return string
	 */
	function mb_str_replace( $needle, $replacement, $haystack ) {
		return implode( $replacement, mb_split( $needle, $haystack ) );
	}
endif;


/**
 * Returns the n-th first characters of a string.
 * Uses substr() so return values are the same.
 *
 * @param string $string The string to get the characters from.
 * @param string $length The number of characters to return.
 * @return string
 */
function brittany_light_substr_left( $string, $length ) {
	return substr( $string, 0, $length );
}

/**
 * Returns the n-th last characters of a string.
 * Uses substr() so return values are the same.
 *
 * @param string $string The string to get the characters from.
 * @param string $length The number of characters to return.
 * @return string
 */
function brittany_light_substr_right( $string, $length ) {
	return substr( $string, - $length, $length );
}

if ( ! function_exists( 'brittany_light_get_related_posts' ) ) :
/**
 * Returns a set of related posts, or the arguments needed for such a query.
 *
 * @uses wp_parse_args()
 * @uses get_post_type()
 * @uses get_post()
 * @uses get_object_taxonomies()
 * @uses get_the_terms()
 * @uses wp_list_pluck()
 *
 * @param int $post_id A post ID to get related posts for.
 * @param int $related_count The number of related posts to return.
 * @param array $args Array of arguments to change the default behavior.
 * @return object|array A WP_Query object with the results, or an array with the query arguments.
 */
function brittany_light_get_related_posts( $post_id, $related_count, $args = array() ) {
	$args = wp_parse_args( (array) $args, array(
		'orderby' => 'rand',
		'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
	) );

	$post_type = get_post_type( $post_id );
	$post      = get_post( $post_id );

	$term_list  = array();
	$query_args = array();
	$tax_query  = array();
	$taxonomies = get_object_taxonomies( $post, 'names' );

	foreach ( $taxonomies as $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );
		if ( is_array( $terms ) && count( $terms ) > 0 ) {
			$term_list = wp_list_pluck( $terms, 'slug' );
			$term_list = array_values( $term_list );
			if ( ! empty( $term_list ) ) {
				$tax_query['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $term_list,
				);
			}
		}
	}

	if ( count( $taxonomies ) > 1 ) {
		$tax_query['tax_query']['relation'] = 'OR';
	}

	$query_args = array(
		'post_type'      => $post_type,
		'posts_per_page' => $related_count,
		'post_status'    => 'publish',
		'post__not_in'   => array( $post_id ),
		'orderby'        => $args['orderby'],
	);

	if ( 'query' === $args['return'] ) {
		return new WP_Query( array_merge( $query_args, $tax_query ) );
	} else {
		return array_merge( $query_args, $tax_query );
	}
}
endif;



$brittany_light_glob_inline_js = array();
if ( ! function_exists( 'brittany_light_add_inline_js' ) ) :
/**
 * Registers an inline JS script.
 * The script will be printed on the footer of the current request's page, either on the front or the back end.
 * Inline scripts are printed inside a jQuery's ready() event handler, and $ is available.
 * Passing a $handle allows to reference and/or overwrite specific inline scripts.
 *
 * @param string $script A JS script to be printed.
 * @param string $handle An optional handle by which the script is referenced.
 */
function brittany_light_add_inline_js( $script, $handle = false ) {
	global $brittany_light_glob_inline_js;

	$handle = sanitize_key( $handle );

	if ( ( false !== $handle ) && ( '' !== $handle ) ) {
		$brittany_light_glob_inline_js[ $handle ] = "\n" . $script . "\n";
	} else {
		$brittany_light_glob_inline_js[] = "\n" . $script . "\n";
	}
}
endif;

if ( ! function_exists( 'brittany_light_get_inline_js' ) ) :
/**
 * Retrieves the inline JS scripts that are registered for printing.
 *
 * @return array The inline JS scripts queued for printing.
 */
function brittany_light_get_inline_js() {
	global $brittany_light_glob_inline_js;

	return $brittany_light_glob_inline_js;
}
endif;

if ( ! function_exists( 'brittany_light_print_inline_js' ) ) :
/**
 * Prints the inline JS scripts that are registered for printing, and removes them from the queue.
 */
function brittany_light_print_inline_js() {
	global $brittany_light_glob_inline_js;

	if ( empty( $brittany_light_glob_inline_js ) ) {
		return;
	}

	$sanitized = array();

	foreach ( $brittany_light_glob_inline_js as $handle => $script ) {
		$sanitized[ $handle ] = wp_check_invalid_utf8( $script );
	}

	echo '<script type="text/javascript">' . "\n";
	echo "\t" . 'jQuery(document).ready(function($){' . "\n";

	foreach ( $sanitized as $handle => $script ) {
		echo "\n/* --- CI Theme Inline script ($handle) --- */\n";
		echo $script;
	}

	echo "\t" . '});' . "\n";
	echo '</script>' . "\n";

	$brittany_light_glob_inline_js = array();
}
endif;

if ( ! function_exists( 'brittany_light_inflect' ) ) :
	/**
	 * Returns a string depending on the value of $num.
	 *
	 * When $num equals zero, string $none is returned.
	 * When $num equals one, string $one is returned.
	 * When $num is any other number, string $many is returned.
	 *
	 * @access public
	 *
	 * @param int $num
	 * @param string $none
	 * @param string $one
	 * @param string $many
	 *
	 * @return string
	 */
	function brittany_light_inflect( $num, $none, $one, $many ) {
		$num = intval( $num );
		if ( 0 === $num ) {
			return $none;
		} elseif ( 1 === $num ) {
			return $one;
		} else {
			return $many;
		}
	}
endif;

if ( ! function_exists( 'brittany_light_e_inflect' ) ) :
	/**
	 * Echoes a string depending on the value of $num.
	 *
	 * When $num equals zero, string $none is echoed.
	 * When $num equals one, string $one is echoed.
	 * When $num is any other number, string $many is echoed.
	 *
	 * @access public
	 *
	 * @param int $num
	 * @param string $none
	 * @param string $one
	 * @param string $many
	 *
	 * @return void
	 */
	function brittany_light_e_inflect( $num, $none, $one, $many ) {
		echo brittany_light_inflect( $num, $none, $one, $many );
	}
endif;

if ( ! function_exists( 'brittany_light_merge_wp_queries' ) ) :
/**
 * Merges multiple WP_Queries by accepting any number of valid, discreet parameter arrays.
 * It runs each query individually, merges the (unique) post IDs, and re-queries the DB for those IDs, respecting their order.
 * Uses WP_Query() so parameters and return values are the same.
 *
 * @param array ... Unlimited WP_Query() parameter arrays.
 * @return WP_Query object
 */
function brittany_light_merge_wp_queries() {
	$args = func_get_args();

	if ( $args < 2 ) {
		return new WP_Query();
	}

	$merged         = array();
	$post_types     = array();
	$all_post_types = array(); // Will not be reset on iterations, so that there is a record of all post types needed.

	// Let's handle each query.
	foreach ( $args as $arg ) {
		// How many posts to get
		$numberposts = - 1;
		if ( ! empty( $arg['posts_per_page'] ) ) {
			$numberposts = $arg['posts_per_page'];
		} elseif ( ! empty( $arg['numberposts'] ) ) {
			$numberposts = $arg['numberposts'];
		} elseif ( ! empty( $arg['showposts'] ) ) {
			$numberposts = $arg['showposts'];
		}

		$arg['posts_per_page'] = $numberposts;

		// Make sure only IDs will be returned. We want the query to be lightweight.
		$arg['fields'] = 'ids';

		// What post types to retrieve
		if ( ! empty( $arg['post_type'] ) ) {
			$post_types = $arg['post_type'];

			// Keep the post type(s) for later use.
			if ( is_array( $post_types ) ) {
				$all_post_types = array_merge( $all_post_types, $post_types );
			} else {
				$all_post_types[] = $post_types;
			}
		}

		$this_posts = new WP_Query( $arg );

		foreach ( $this_posts->posts as $p ) {
			$merged[] = $p;
		}

		wp_reset_postdata();
	}

	$all_post_types = array_unique( $all_post_types );

	$merged = array_unique( $merged );

	if ( 0 === count( $merged ) ) {
		$merged[] = 0;
	}

	$params = array(
		'post__in'        => $merged,
		'post_type'       => $all_post_types,
		'posts_per_page'  => - 1,
		'suppress_filter' => false,
		'orderby'         => 'post__in',
	);

	$params = apply_filters( 'brittany_light_merge_wp_queries', $params, $args );

	$merged_query = new WP_Query( $params );

	return $merged_query;
}
endif;

if ( ! function_exists( 'brittany_light_dropdown_posts' ) ) :
/**
 * Retrieve or display list of posts as a dropdown (select list).
 *
 * @since 2.1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @param string $name Optional. Name of the select box.
 * @return string HTML content, if not displaying.
 */
function brittany_light_dropdown_posts( $args = '', $name = 'post_id' ) {
	$defaults = array(
		'depth'                 => 0,
		'post_parent'           => 0,
		'selected'              => 0,
		'echo'                  => 1,
		//'name'                  => 'page_id', // With this line, get_posts() doesn't work properly.
		'id'                    => '',
		'class'                 => '',
		'show_option_none'      => '',
		'show_option_no_change' => '',
		'option_none_value'     => '',
		'post_type'             => 'post',
		'post_status'           => 'publish',
		'suppress_filters'      => false,
		'numberposts'           => -1,
		'select_even_if_empty'  => false, // If no posts are found, an empty <select> will be returned/echoed.
	);

	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );

	$hierarchical_post_types = get_post_types( array( 'hierarchical' => true ) );
	if ( in_array( $r['post_type'], $hierarchical_post_types ) ) {
		$pages = get_pages($r);
	} else {
		$pages = get_posts($r);
	}

	$output = '';
	// Back-compat with old system where both id and name were based on $name argument
	if ( empty($id) )
		$id = $name;

	if ( ! empty($pages) || $select_even_if_empty == true ) {
		$output = "<select name='" . esc_attr( $name ) . "' id='" . esc_attr( $id ) . "' class='" . esc_attr( $class ) . "'>\n";
		if ( $show_option_no_change ) {
			$output .= "\t<option value=\"-1\">$show_option_no_change</option>";
		}
		if ( $show_option_none ) {
			$output .= "\t<option value=\"" . esc_attr( $option_none_value ) . "\">$show_option_none</option>\n";
		}
		if ( ! empty($pages) ) {
			$output .= walk_page_dropdown_tree($pages, $depth, $r);
		}
		$output .= "</select>\n";
	}

	$output = apply_filters( 'brittany_light_dropdown_posts', $output, $name, $r );

	if ( $echo )
		echo $output;

	return $output;
}
endif;

/**
 * Determine whether a plugin is active.
 *
 * @param string $plugin The path to the plugin file, relative to the plugins directory.
 * @return bool True if plugin is active, false otherwise.
 */
function brittany_light_can_use_plugin( $plugin ) {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	return is_plugin_active( $plugin );
}

/**
 * Conditionally returns a Javascript/CSS asset's version number.
 *
 * When the site is in debug mode, the normal asset's version is returned.
 * When it's not in debug mode, the theme's version is returned, so that caches can be invalidated on theme updates.
 *
 * @param bool $version The version string of the asset.
 *
 * @return false|string Theme version if SCRIPT_DEBUG or WP_DEBUG are enabled. Otherwise, $version is returned.
 */
function brittany_light_asset_version( $version = false ) {
	static $theme_version = false;

	if ( ! $theme_version ) {
		$theme         = wp_get_theme();
		$theme_version = $theme->get( 'Version' );
	}

	if ( $version ) {
		if ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ||
			( defined( 'WP_DEBUG' ) && WP_DEBUG )
		) {
			return $version;
		}
	}

	return $theme_version;
}

/**
 * Generic fallback callback for the main menu.
 *
 * Displays a few useful links, in contrast to the default wp_page_menu() which may flood the menu area.
 *
 * @param array $args
 *
 * @return void|string
 */
function brittany_light_main_menu_fallback( $args ) {
	$id    = ! empty( $args['menu_id'] ) ? $args['menu_id'] : 'menu-' . $args['theme_location'];
	$class = $args['menu_class'];

	$items = apply_filters( 'brittany_light_main_menu_fallback_items', array(
		home_url( '/' )              => __( 'Home', 'brittany-light' ),
		admin_url( 'nav-menus.php' ) => __( 'Set primary menu', 'brittany-light' ),
	) );

	$items_html = '';
	if ( $items ) {
		foreach ( $items as $item_url => $item_text ) {
			$items_html .= sprintf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $item_url ), esc_html( $item_text ) );
		}
	}

	if ( empty( $items_html ) ) {
		return false;
	}

	$menu_html = sprintf( $args['items_wrap'], esc_attr( $id ), esc_attr( $class ), $items_html );

	if ( $args['echo'] ) {
		echo wp_kses_post( $menu_html );
	} else {
		return $menu_html;
	}
}

// Make sure this function is defined, even if the plugin is disabled.
if ( ! function_exists( 'brittany_light_documentation_url' ) ) {
	/**
	 * Returns the URL to the theme's documentation page.
	 *
	 * @return string
	 */
	function brittany_light_documentation_url() {
		$url = 'https://www.cssigniter.com/docs/brittany-light/';

		return apply_filters( 'brittany_light_documentation_url', $url );
	}
}
