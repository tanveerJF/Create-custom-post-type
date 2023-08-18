<?php

// let's create the function for the custom type
function acvr_custom_post() 
{ 
	
	// creating a News custom type 
	register_post_type( 'news_post', 
		// Add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'News', 'acvr' ), 
			'singular_name' => __( 'News', 'acvr' ),  
			'all_items' => __( 'All News', 'acvr' ), 
			'add_new' => __( 'Add News', 'acvr' ),  
			'add_new_item' => __( 'Add New News', 'acvr' ), 
			'edit' => __( 'Edit', 'acvr' ),  
			'edit_item' => __( 'Edit Post Types', 'acvr' ), 
			'new_item' => __( 'New Post Type', 'acvr' ),  
			'view_item' => __( 'View Post Type', 'acvr' ),  
			'search_items' => __( 'Search News', 'acvr' ), 
			'not_found' =>  __( 'Nothing found in the Database.', 'acvr' ),  
			'not_found_in_trash' => __( 'Nothing found in Trash', 'acvr' ), 
			'parent_item_colon' => ''
			), 
			'description' => __( 'News post type', 'acvr' ), 
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, 
			'menu_icon' => 'dashicons-pressthis',  
			'has_archive' => 'news_post', 
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			//'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
		) 
	); /* end of register post type */
	
	/**
	* Register news taxanomies
	**/
	
	 $args = array(
        'labels' => array(
            'name' => 'News Type',
            'singular_name' => 'News Type',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'news_type_tax' ),
    );
    register_taxonomy( 'news_type_tax', 'news_post', $args );
	
	$args_cat = array(
        'labels' => array(
            'name' => 'News Categories',
            'singular_name' => 'News Categories',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'news_category_tax' ),
    );
    register_taxonomy( 'news_category_tax', 'news_post', $args_cat );

	}
	
	// adding the function to the Wordpress init
	add_action( 'init', 'acvr_custom_post');


?>
