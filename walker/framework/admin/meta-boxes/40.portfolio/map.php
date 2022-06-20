<?php

$edgt_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$edgt_pages[$page->ID] = $page->post_title;
}

//Portfolio Images

$edgtPortfolioImages = new WalkerEdgeClassMetaBox("portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images');
$walker_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images",$edgtPortfolioImages);

	$edgt_portfolio_image_gallery = new WalkerEdgeClassMultipleImages("edgt_portfolio-image-gallery","Portfolio Images","Choose your portfolio images");
	$edgtPortfolioImages->addChild("edgt_portfolio-image-gallery",$edgt_portfolio_image_gallery);

//Portfolio Images/Videos 2

$edgtPortfolioImagesVideos2 = new WalkerEdgeClassMetaBox("portfolio-item", "Portfolio Images/Videos (single upload)");
$walker_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images_videos2",$edgtPortfolioImagesVideos2);

	$edgt_portfolio_images_videos2 = new WalkerEdgeClassImagesVideosFramework("Portfolio Images/Videos 2","ThisIsDescription");
	$edgtPortfolioImagesVideos2->addChild("edgt_portfolio_images_videos2",$edgt_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$edgtAdditionalSidebarItems = walker_edge_create_meta_box(
    array(
        'scope' => array('portfolio-item'),
        'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'walker' ),
        'name' => 'portfolio_properties'
    )
);

	$edgt_portfolio_properties = walker_edge_add_options_framework(
	    array(
	        'label' => esc_html__( 'Portfolio Properties', 'walker' ),
	        'name' => 'edgt_portfolio_properties',
	        'parent' => $edgtAdditionalSidebarItems
	    )
	);