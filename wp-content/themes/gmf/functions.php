<?php
/**
 * gmf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gmf
 */

if ( ! function_exists( 'gmf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gmf_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gmf, use a find and replace
		 * to change 'gmf' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gmf', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gmf' ),
			'menu-2' => esc_html__( 'Secondary', 'gmf' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gmf_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gmf_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gmf_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gmf_content_width', 640 );
}
add_action( 'after_setup_theme', 'gmf_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gmf_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gmf' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gmf' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'gmf' ),
		'id'            => 'sidebar-pages',
		'description'   => esc_html__( 'Add sub nav here only.', 'gmf' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 id="subnav-title" class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gmf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gmf_scripts() {
	wp_enqueue_style( 'bootstrap4-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
	wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i' );
	wp_enqueue_style( 'gmf-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '20151215', true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery', 'popper'), '20151215', true );

	wp_script_add_data( 'jquery4', array( 'integrity', 'crossorigin' ) , array( 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo', 'anonymous' ) );
	wp_script_add_data( 'jquery4', array( 'integrity', 'crossorigin' ) , array( 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49', 'anonymous' ) );
	wp_script_add_data( 'jquery4', array( 'integrity', 'crossorigin' ) , array( 'sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy', 'anonymous' ) );

	wp_enqueue_script( 'gmf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gmf-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gmf_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Custom Functions by Mark Caron
 */
$get_theme_name = explode('/themes/', get_template_directory());
define('RELATIVE_PLUGIN_PATH',  str_replace(home_url() . '/', '', plugins_url()));
define('RELATIVE_CONTENT_PATH', str_replace(home_url() . '/', '', content_url()));
define('THEME_NAME', next($get_theme_name));
define('THEME_PATH', RELATIVE_CONTENT_PATH . '/themes/' . THEME_NAME);
define('CLIENT_NAME', 'Governor Morehead Foundation');
define('CLIENT_SLUG', 'gmf');

require get_template_directory() . '/inc/custom-debug.php';		// Custom Debugging
require get_template_directory() . '/inc/custom-settings.php';	// Custom Settings Functions
require get_template_directory() . '/inc/custom-admin.php';		// Custom Admin Functions
require get_template_directory() . '/inc/posttype-event.php';	// Custom Event Post Type
require get_template_directory() . '/inc/posttype-bio.php';	// Custom Bios Post Type

require get_template_directory() . '/inc/custom-metaboxes.php';	// Custom Metabox General Functions
require get_template_directory() . '/inc/custom-meta-home.php';	// Custom Metabox Functions for Home Template
require get_template_directory() . '/inc/custom-meta-donate.php';	// Custom Metabox Functions for Donate Template
require get_template_directory() . '/inc/custom-meta-2col.php';	// Custom Metabox Functions for Donate Template


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Loads the image management javascript
 */
function meta_image_enqueue() {
    global $typenow;
    // $current_screen = get_current_screen();

		if ( is_admin() ) {
      wp_enqueue_media();

      // Registers and enqueues the required javascript.
      wp_register_script('meta-image', '/' . THEME_PATH . '/js/meta-image.js', false, null, true);
      wp_localize_script( 'meta-image', 'meta_image',
          array(
              'title' => 'Choose or Upload an Image',
              'button' => 'Use this image',
          )
      );
      wp_enqueue_script( 'meta-image' );

	    // Admin only styles
	    wp_enqueue_style( 'gmf-admin-style', '/' . THEME_PATH . '/admin.css', false, null );

		} // End if

} // End example_image_enqueue()
add_action( 'admin_enqueue_scripts', 'meta_image_enqueue' );



// Accessible Nav Menu widget class
class Accessible_Nav_Menu_Widget extends WP_Widget {

  function Accessible_Nav_Menu_Widget() {
      $widget_ops = array( 'description' => __('Add an accessible menu to your sidebar.') );
      parent::__construct( 'nav_menu', __('Accessible Nav Menu'), $widget_ops );
  }

  function widget($args, $instance) {
      // Get menu
      $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

      if ( !$nav_menu )
          return;

      /** This filter is documented in wp-includes/default-widgets.php */
      $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

      echo $args['before_widget'];

      if ( !empty($instance['title']) )
          echo $args['before_title'] . $instance['title'] . $args['after_title'];

      wp_nav_menu( array(
				'fallback_cb' => '',
				'menu' => $nav_menu,
				'container_class' => 'a11y-menu-wrapper',
				'menu_class' => 'a11y-menu',
				'items_wrap' => '<ul id="%1$s" class="%2$s" aria-labelledby="subnav-title">%3$s</ul>',
			) );

      echo $args['after_widget'];
  }

  function update( $new_instance, $old_instance ) {
      $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
      $instance['nav_menu'] = (int) $new_instance['nav_menu'];
      return $instance;
  }

  function form( $instance ) {
      $title = isset( $instance['title'] ) ? $instance['title'] : '';
      $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

      // Get menus
      $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

      // If no menus exists, direct the user to go and create some.
      if ( !$menus ) {
          echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
          return;
      }
      ?>
      <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
          <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
          <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
              <option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
      <?php
          foreach ( $menus as $menu ) {
              echo '<option value="' . $menu->term_id . '"'
                  . selected( $nav_menu, $menu->term_id, false )
                  . '>'. esc_html( $menu->name ) . '</option>';
          }
      ?>
          </select>
      </p>
      <?php
  }
}

add_action('widgets_init', create_function('', 'return register_widget("Accessible_Nav_Menu_Widget");'));
