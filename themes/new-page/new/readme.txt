// See the __() WordPress function for valid values for $text_domain.
register_sidebar( array(
    'id'          => 'top-menu',
    'name'        => __( 'Top Menu', $text_domain ),
    'description' => __( 'This sidebar is located above the age logo.', $text_domain ),
) );