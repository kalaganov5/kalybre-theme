<?php

/**
 * Widget that adds blog list
 */
class WalkerEdgeClassBlogListWidget extends WalkerEdgeClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgtf_blog_list_widget', // Base ID
	        esc_html__( 'Walker Blog List Widget', 'walker' ),
	        array( 'description' => esc_html__( 'Display a list of your blog posts', 'walker' ) )
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'widget_title',
                'title' => esc_html__( 'Widget Title', 'walker' )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Number of Posts', 'walker' ),
                'name' => 'number_of_posts'
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Order By', 'walker' ),
                'name' => 'order_by',
                'options' => array(
                    'title' => esc_html__( 'Title', 'walker' ),
                    'date' => esc_html__( 'Date', 'walker' ),
                    'rand' => esc_html__( 'Random', 'walker' ),
                    'name' => esc_html__( 'Post Name', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Order', 'walker' ),
                'name' => 'order',
                'options' => array(
                    'ASC' => esc_html__( 'ASC', 'walker' ),
                    'DESC' => esc_html__( 'DESC', 'walker' )
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Category Slug', 'walker' ),
                'name' => 'category',
                'description' => esc_html__( 'Leave empty for all or use comma for list', 'walker' )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Image Size', 'walker' ),
                'name' => 'image_size',
                'options' => array(
                    'original' => esc_html__( 'Original', 'walker' ),
                    'landscape' => esc_html__( 'Landscape', 'walker' ),
                    'square' => esc_html__( 'Square', 'walker' )
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Text Length', 'walker' ),
                'name' => 'text_length',
                'description' => esc_html__( 'Number of characters', 'walker' )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Title Tag', 'walker' ),
                'name' => 'title_tag',
                'options' => array(
                    'h5' => esc_html__( 'h5', 'walker' ),
                    'h2' => esc_html__( 'h2', 'walker' ),
                    'h3' => esc_html__( 'h3', 'walker' ),
                    'h4' => esc_html__( 'h4', 'walker' ),
                    'h6' => esc_html__( 'h6', 'walker' ),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Section', 'walker' ),
                'name' => 'post_info_section',
                'options' => array(
                    'yes' => esc_html__( 'Yes', 'walker' ),
                    'no' => esc_html__( 'No', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Author', 'walker' ),
                'name' => 'post_info_author',
                'options' => array(
                    'yes' => esc_html__( 'Yes', 'walker' ),
                    'no' => esc_html__( 'No', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Date', 'walker' ),
                'name' => 'post_info_date',
                'options' => array(
                    'yes' => esc_html__( 'Yes', 'walker' ),
                    'no' => esc_html__( 'No', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Category', 'walker' ),
                'name' => 'post_info_category',
                'options' => array(
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Comments', 'walker' ),
                'name' => 'post_info_comments',
                'options' => array(
                    'yes' => esc_html__( 'Yes', 'walker' ),
                    'no' => esc_html__( 'No', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Like', 'walker' ),
                'name' => 'post_info_like',
                'options' => array(
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Post Info Share', 'walker' ),
                'name' => 'post_info_share',
                'options' => array(
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Enable Read More Button', 'walker' ),
                'name' => 'read_more_button',
                'options' => array(
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        //prepare variables
        $params = '';

        $instance['type'] = 'standard';
        $instance['number_of_columns'] = 1;

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-blog-list-widget">';

            if($instance['widget_title'] !== '') {
	            echo wp_kses_post( $args['before_title'].$instance['widget_title'].$args['after_title'] );
            }

            //finally call the shortcode
            echo do_shortcode("[edgtf_blog_list $params]"); // XSS OK

            echo '</div>'; //close div.mkdf-plw-seven
    }
}