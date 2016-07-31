<?php
add_shortcode('CTA', 'build_cta');
add_filter( 'img_caption_shortcode', 'build_img_caption', 10, 3 );
add_shortcode( 'contact-form', 'build_contact_form' );
add_shortcode('map', 'build_map');

function build_map($empy, $attr, $content) {
    return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13409.843848504559!2d-117.28430525248889!3d32.8386989988096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dc03e69a829e43%3A0x1a2dfeae172332a5!2s7421+Draper+Ave%2C+San+Diego%2C+CA+92037!5e0!3m2!1sen!2sus!4v1469559688415" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
';
}

function build_img_caption( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}
    $header = substr($attr['caption'], strpos($attr['caption'], '<header>')+8);
    $header = substr($header, 0, strpos($header, '</header>'));
    $footer = substr($attr['caption'], strpos($attr['caption'], '<footer>')+8);
    $footer = substr($footer, 0, strpos($footer, '</footer>'));
    $captionHtml = '<div class="cap-header">' . $header . '</div>' . '<div class="cap-footer">' . $footer . '</div>';

	return '<div ' . $attr['id']
	. 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
	. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
    . do_shortcode( $content )
    . '<div class="wp-caption-text">' . $captionHtml . '</div>'
	. '</div>';

}
function build_cta($atts, $content=null) {
    if ($content != null) {
        return '<div class="post-cta-wrapper">' 
            . '<a class="btn post-cta" href="' .  get_bloginfo('wpurl') . '/'.  $atts['url']. '">'
            . $content.'</a>'
            . '</div>';
    }
}
function build_contact_form() {
    ob_start();
    get_template_part('form');
    return ob_get_clean();   
} 

?>
