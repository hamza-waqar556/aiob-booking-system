<?php

/**
 * @package TourBooking
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
    }

    public function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style( 'admin', $this->plugin_url . 'src/assets/scss/admin.css', [  ], '1.0.0' );
        wp_enqueue_script( 'admin', $this->plugin_url . 'src/assets/js/admin.js', [ 'jquery' ], '1.0.0', false );
    }
}
