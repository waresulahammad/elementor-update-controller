
// Stop Elementor Pro from checking for updates
add_filter( 'site_transient_update_plugins', 'disable_elementor_pro_update_check' );

function disable_elementor_pro_update_check( $transient ) {
    // Define the plugin's path
    $plugin = 'elementor-pro/elementor-pro.php';

    // Check if Elementor Pro is listed in the update transient
    if ( isset( $transient->response[$plugin] ) ) {
        unset( $transient->response[$plugin] ); // Remove the update information for Elementor Pro
    }

    return $transient;
}


// Hide Elementor Pro license activation message
add_filter( 'elementor_pro/license/valid', '__return_true' );




// Add custom CSS to hide Elementor Pro activation message in the WordPress Dashboard
function hide_elementor_pro_activation_message() {
    echo '<style>
        .e-notice.e-notice--extended {
            display: none !important;
        }
		.notice.notice-warning.is-dismissible {
		  display: none;
		}
    </style>';
}
add_action( 'admin_head', 'hide_elementor_pro_activation_message' );


// Hide Elementor License_submenu
function hide_elementor_license_submenu() {
    remove_submenu_page( 'elementor', 'elementor-license' );
}
add_action( 'admin_menu', 'hide_elementor_license_submenu', 999 );




function hide_elementor_connect_text() {
    echo '<style>
        .active_license a.elementor-plugins-gopro {
            font-size: 0 !important;
        }
        .active_license a.elementor-plugins-gopro::after {
            content: " "; /* This prevents layout shifts */
            font-size: initial;
        }
    </style>';
}
add_action('admin_head', 'hide_elementor_connect_text');

