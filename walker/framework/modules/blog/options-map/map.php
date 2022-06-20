<?php

if ( ! function_exists('walker_edge_blog_options_map') ) {

	function walker_edge_blog_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__( 'Blog', 'walker' ),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = walker_edge_get_custom_sidebars();

		$panel_blog_lists = walker_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'walker' )
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label' => esc_html__( 'Blog Layout for Archive Pages', 'walker' ),
			'description' => esc_html__( 'Choose a default blog layout', 'walker' ),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard' => esc_html__( 'Blog: Standard', 'walker' ),
				'standard-whole-post' => esc_html__( 'Blog: Standard Whole Post', 'walker' ),
				'masonry' => esc_html__( 'Blog: Masonry', 'walker' ),
				'masonry-full-width' => esc_html__( 'Blog: Masonry Full Width', 'walker' ),
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label' => esc_html__( 'Archive and Category Sidebar', 'walker' ),
			'description' => esc_html__( 'Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'walker' ),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default' => esc_html__( 'No Sidebar', 'walker' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'walker' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'walker' ),
				'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'walker' ),
				'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'walker' ),
			)
		));

		walker_edge_add_admin_field(
			array(
				'name' => 'archive_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Archive and Category Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for Archive and Category pages', 'walker' ),
				'parent' => $panel_blog_lists
			)
		);

		if(count($custom_sidebars) > 0) {
			walker_edge_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__( 'Sidebar to Display', 'walker' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'walker' ),
				'parent' => $panel_blog_lists,
				'options' => walker_edge_get_custom_sidebars()
			));
		}

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__( 'Pagination', 'walker' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enabling this option will display pagination links on bottom of Blog Post List', 'walker' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_pagination_container'
				)
			)
		);

		$pagination_container = walker_edge_add_admin_container(
			array(
				'name' => 'edgtf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__( 'Pagination Range limit', 'walker' ),
				'description' => esc_html__( 'Enter a number that will limit pagination to a certain range of links', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label' => esc_html__( 'Pagination on Masonry', 'walker' ),
			'description' => esc_html__( 'Choose a pagination style for Masonry Blog List', 'walker' ),
			'parent'      => $pagination_container,
			'default_value' => 'standard',
			'options'     => array(
				'standard' => esc_html__( 'Standard', 'walker' ),
				'load-more' => esc_html__( 'Load More', 'walker' ),
				'infinite-scroll' => esc_html__( 'Infinite Scroll', 'walker' )
			),	
		));

        walker_edge_add_admin_field(array(
            'name'        => 'masonry_fullwidth_pagination',
            'type'        => 'select',
            'label' => esc_html__( 'Pagination on Masonry Full Width', 'walker' ),
            'description' => esc_html__( 'Choose a pagination style for Masonry Full Width Blog List', 'walker' ),
            'parent'      => $pagination_container,
			'default_value' => 'standard',
            'options'     => array(
                'standard' => esc_html__( 'Standard', 'walker' ),
                'load-more' => esc_html__( 'Load More', 'walker' ),
                'infinite-scroll' => esc_html__( 'Infinite Scroll', 'walker' )
            ),
        ));


        walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__( 'Load More Pagination on Other Lists', 'walker' ),
				'parent' => $pagination_container,
				'description' => esc_html__( 'Enable Load More Pagination on other lists', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);	
	
		walker_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Number of Words in Excerpt', 'walker' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Standard Type Number of Words in Excerpt', 'walker' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Masonry Type Number of Words in Excerpt', 'walker' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_boxed_article',
			'type'          => 'yesno',
			'label' => esc_html__( 'Enable Article Box Layout', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show box around post content on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no',
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_feature_image',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Feature Image', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show feature image for your posts on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes',
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_category',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Category', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show category post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_date',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Date', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show date post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_author',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Author', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show author post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_comment',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show comments post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_like',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Like', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show like post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_share',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Share', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show share post info on your blog page', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_list_tags',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Tags', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show post tags on your blog page.', 'walker' ),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		/**
		 * Blog Single
		 */
		$panel_blog_single = walker_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'walker' )
			)
		);


		walker_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label' => esc_html__( 'Sidebar Layout', 'walker' ),
			'description' => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'walker' ),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default' => esc_html__( 'No Sidebar', 'walker' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'walker' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'walker' ),
				'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'walker' ),
				'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'walker' ),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			walker_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__( 'Sidebar to Display', 'walker' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'walker' ),
				'parent' => $panel_blog_single,
				'options' => walker_edge_get_custom_sidebars()
			));
		}

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Post Title in Title Area', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_feature_image_max_width',
				'default_value' => '',
				'label' => esc_html__( 'Featured Image Max Width', 'walker' ),
				'parent' => $panel_blog_single,
				'description' => esc_html__( 'Define maximum width for featured image on single post pages. Default value is 1100', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_category',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Category', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show category post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_date',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Date', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show date post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_author',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Author', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show author post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_comment',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show comments post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_like',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Like', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show like post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_share',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Share', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show share post info on your single post page', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_tags',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Tags', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show post tags on your single post page.', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label' => esc_html__( 'Show Related Posts', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show related posts on your single post page.', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_related_image_container'
			)
		));

		$related_image_container = walker_edge_add_admin_container(
			array(
				'name' => 'related_image_container',
				'hidden_property' => 'blog_single_related_posts',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_related_image_size',
				'default_value' => '',
				'label' => esc_html__( 'Related Posts Image Max Width', 'walker' ),
				'parent' => $related_image_container,
				'description' => esc_html__( 'Define maximum width for related posts images on your single post pages. Default value is 1100', 'walker' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments Form', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show comments form on your page.', 'walker' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'walker' ),
				'parent' => $panel_blog_single,
				'description' => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'walker' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = walker_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		walker_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Navigation Only in Current Category', 'walker' ),
				'description' => esc_html__( 'Limit your navigation only through current category', 'walker' ),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Author Info Box', 'walker' ),
				'parent' => $panel_blog_single,
				'description' => esc_html__( 'Enabling this option will display author name and descriptions on Blog Single pages', 'walker' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = walker_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		walker_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label' => esc_html__( 'Show Author Email', 'walker' ),
				'description' => esc_html__( 'Enabling this option will show author email', 'walker' ),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Author Social Icons', 'walker' ),
				'description' => esc_html__( 'Enabling this option will show author social icons on your single post page', 'walker' ),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'walker_edge_options_map', 'walker_edge_blog_options_map', 13);
}