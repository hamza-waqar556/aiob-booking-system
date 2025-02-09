<?php
/**
 * @package TourBooking
 */

namespace Inc\Controllers;

use \Inc\Base\BaseController;

class CustomPostType extends BaseController
{
    public $custom_post_types = [  ];

    public function register()
    {
        // Store Custom Post Types Before Registering
        $this->storeCustomPostTypes();

        // Register Custom Post Types
        if ( ! empty( $this->custom_post_types ) ) {
            add_action( 'init', [ $this, 'registerCustomPostTypes' ] );
        }
    }

    public function storeCustomPostTypes()
    {

        $cpt_options = $this->aiob_settings;

        $enabled_cpts = get_option( 'aiob_settings', [  ] );

        $cpts = [
            'hotels_cpt'  => [
                'post_type'             => 'hotel',
                'name'                  => 'Hotels',
                'singular_name'         => 'Hotel',
                'menu_name'             => 'Hotels',
                'name_admin_bar'        => 'Hotel',
                'archives'              => 'Hotel Archives',
                'attributes'            => 'Hotel Attributes',
                'parent_item_colon'     => 'Parent Hotel',
                'all_items'             => 'All Hotels',
                'add_new_item'          => 'Add New Hotel',
                'add_new'               => 'Add New',
                'new_item'              => 'New Hotel',
                'edit_item'             => 'Edit Hotel',
                'update_item'           => 'Update Hotel',
                'view_item'             => 'View Hotel',
                'view_items'            => 'View Hotels',
                'search_items'          => 'Search Hotels',
                'not_found'             => 'No Hotels Found',
                'not_found_in_trash'    => 'No Hotels Found in Trash',
                'featured_image'        => 'Hotel Featured Image',
                'set_featured_image'    => 'Set Hotel Featured Image',
                'remove_featured_image' => 'Remove Hotel Featured Image',
                'use_featured_image'    => 'Use Hotel Featured Image',
                'insert_into_item'      => 'Insert into Hotel',
                'uploaded_to_this_item' => 'Uploaded to this Hotel',
                'items_list'            => 'Hotels List',
                'items_list_navigation' => 'Hotels List Navigation',
                'filter_items_list'     => 'Filter Hotels List',
                'label'                 => 'Hotel',
                'description'           => 'Hotels Custom Post Type',
                'supports'              => [ 'title', 'editor', 'thumbnail' ],
                'taxonomies'            => [ 'category', 'post_tag' ],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'menu_icon'             => 'dashicons-building',
             ],
            'flights_cpt' => [
                'post_type'             => 'flight',
                'name'                  => 'Flights',
                'singular_name'         => 'Flight',
                'menu_name'             => 'Flights',
                'name_admin_bar'        => 'Flight',
                'archives'              => 'Flight Archives',
                'attributes'            => 'Flight Attributes',
                'parent_item_colon'     => 'Parent Flight',
                'all_items'             => 'All Flights',
                'add_new_item'          => 'Add New Flight',
                'add_new'               => 'Add New',
                'new_item'              => 'New Flight',
                'edit_item'             => 'Edit Flight',
                'update_item'           => 'Update Flight',
                'view_item'             => 'View Flight',
                'view_items'            => 'View Flights',
                'search_items'          => 'Search Flights',
                'not_found'             => 'No Flights Found',
                'not_found_in_trash'    => 'No Flights Found in Trash',
                'featured_image'        => 'Flight Featured Image',
                'set_featured_image'    => 'Set Flight Featured Image',
                'remove_featured_image' => 'Remove Flight Featured Image',
                'use_featured_image'    => 'Use Flight Featured Image',
                'insert_into_item'      => 'Insert into Flight',
                'uploaded_to_this_item' => 'Uploaded to this Flight',
                'items_list'            => 'Flights List',
                'items_list_navigation' => 'Flights List Navigation',
                'filter_items_list'     => 'Filter Flights List',
                'label'                 => 'Flight',
                'description'           => 'Flights Custom Post Type',
                'supports'              => [ 'title', 'editor' ],
                'taxonomies'            => [  ],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 6,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'menu_icon'             => 'dashicons-airplane',
             ],
            'tours_cpt'   => [
                'post_type'             => 'tour',
                'name'                  => 'Tours',
                'singular_name'         => 'Tour',
                'menu_name'             => 'Tours',
                'name_admin_bar'        => 'Tour',
                'archives'              => 'Tour Archives',
                'attributes'            => 'Tour Attributes',
                'parent_item_colon'     => 'Parent Tour',
                'all_items'             => 'All Tours',
                'add_new_item'          => 'Add New Tour',
                'add_new'               => 'Add New',
                'new_item'              => 'New Tour',
                'edit_item'             => 'Edit Tour',
                'update_item'           => 'Update Tour',
                'view_item'             => 'View Tour',
                'view_items'            => 'View Tours',
                'search_items'          => 'Search Tours',
                'not_found'             => 'No Tours Found',
                'not_found_in_trash'    => 'No Tours Found in Trash',
                'featured_image'        => 'Tour Featured Image',
                'set_featured_image'    => 'Set Tour Featured Image',
                'remove_featured_image' => 'Remove Tour Featured Image',
                'use_featured_image'    => 'Use Tour Featured Image',
                'insert_into_item'      => 'Insert into Tour',
                'uploaded_to_this_item' => 'Uploaded to this Tour',
                'items_list'            => 'Tours List',
                'items_list_navigation' => 'Tours List Navigation',
                'filter_items_list'     => 'Filter Tours List',
                'label'                 => 'Tour',
                'description'           => 'Tours Custom Post Type',
                'supports'              => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
                'taxonomies'            => [ 'category' ],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 7,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'menu_icon'             => 'dashicons-universal-access-alt',
             ],
         ];

        foreach ( $cpt_options as $option_key => $post_type ) {
            if ( ! empty( $enabled_cpts[ $option_key ] ) && isset( $cpts[ $option_key ] ) ) {
                $this->custom_post_types[ $option_key ] = $cpts[ $option_key ];
            }
        }
    }

    public function registerCustomPostTypes()
    {
        foreach ( $this->custom_post_types as $post_type ) {
            register_post_type( $post_type[ 'post_type' ],
                [
                    'labels'              => [
                        'name'                  => $post_type[ 'name' ],
                        'singular_name'         => $post_type[ 'singular_name' ],
                        'menu_name'             => $post_type[ 'menu_name' ],
                        'name_admin_bar'        => $post_type[ 'name_admin_bar' ],
                        'archives'              => $post_type[ 'archives' ],
                        'attributes'            => $post_type[ 'attributes' ],
                        'parent_item_colon'     => $post_type[ 'parent_item_colon' ],
                        'all_items'             => $post_type[ 'all_items' ],
                        'add_new_item'          => $post_type[ 'add_new_item' ],
                        'add_new'               => $post_type[ 'add_new' ],
                        'new_item'              => $post_type[ 'new_item' ],
                        'edit_item'             => $post_type[ 'edit_item' ],
                        'update_item'           => $post_type[ 'update_item' ],
                        'view_item'             => $post_type[ 'view_item' ],
                        'view_items'            => $post_type[ 'view_items' ],
                        'search_items'          => $post_type[ 'search_items' ],
                        'not_found'             => $post_type[ 'not_found' ],
                        'not_found_in_trash'    => $post_type[ 'not_found_in_trash' ],
                        'featured_image'        => $post_type[ 'featured_image' ],
                        'set_featured_image'    => $post_type[ 'set_featured_image' ],
                        'remove_featured_image' => $post_type[ 'remove_featured_image' ],
                        'use_featured_image'    => $post_type[ 'use_featured_image' ],
                        'insert_into_item'      => $post_type[ 'insert_into_item' ],
                        'uploaded_to_this_item' => $post_type[ 'uploaded_to_this_item' ],
                        'items_list'            => $post_type[ 'items_list' ],
                        'items_list_navigation' => $post_type[ 'items_list_navigation' ],
                        'filter_items_list'     => $post_type[ 'filter_items_list' ],
                     ],
                    'label'               => $post_type[ 'label' ],
                    'description'         => $post_type[ 'description' ],
                    'supports'            => $post_type[ 'supports' ],
                    'taxonomies'          => $post_type[ 'taxonomies' ],
                    'hierarchical'        => $post_type[ 'hierarchical' ],
                    'public'              => $post_type[ 'public' ],
                    'show_ui'             => $post_type[ 'show_ui' ],
                    'show_in_menu'        => $post_type[ 'show_in_menu' ],
                    'menu_position'       => $post_type[ 'menu_position' ],
                    'show_in_admin_bar'   => $post_type[ 'show_in_admin_bar' ],
                    'show_in_nav_menus'   => $post_type[ 'show_in_nav_menus' ],
                    'can_export'          => $post_type[ 'can_export' ],
                    'has_archive'         => $post_type[ 'has_archive' ],
                    'exclude_from_search' => $post_type[ 'exclude_from_search' ],
                    'publicly_queryable'  => $post_type[ 'publicly_queryable' ],
                    'capability_type'     => $post_type[ 'capability_type' ],
                    'menu_icon'           => $post_type[ 'menu_icon' ],
                 ],
            );
        }
    }

}
