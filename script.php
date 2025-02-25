
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
    </style>';
}
add_action( 'admin_head', 'hide_elementor_pro_activation_message' );
