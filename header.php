<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tiny_Framework
 * @since Tiny Framework 1.0
 */
?><!DOCTYPE html>

<?php tha_html_before(); // custom action hook ?>

<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->

<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>

<?php tha_head_top(); // custom action hook ?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="profile" href="http://microformats.org/profile/specs" />
<link rel="profile" href="http://microformats.org/profile/hatom" />

<?php tha_head_bottom(); // custom action hook ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?><?php tinyframework_semantics( 'body' ); // Function located in: inc/semantics.php ?>>

<?php tha_body_top(); // custom action hook ?>

<span class="skiplink"><a class="screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'tiny-framework' ); ?>"><?php esc_html_e( 'Skip to content', 'tiny-framework' ); ?></a></span>

<?php // Tip04 - Reminder to turn ON JavaScript ?>

<noscript>
	<div id="no-javascript">
		<?php esc_html_e( 'Advanced features of this website require that you enable JavaScript in your browser. Thank you!', 'tiny-framework' ); ?>
	</div>
</noscript>

<div id="page" class="site">

	<?php tha_header_before(); // custom action hook ?>

	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="https://schema.org/WPHeader">

		<?php tha_header_top(); // custom action hook ?>

		<div class="site-branding" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

			<?php // Tip14 - custom logo feature support. Check: inc/template-tags.php for more details.
			tinyframework_the_site_logo();
			?>

			<div id="site-title-wrapper">

				<?php
					if ( is_front_page() && is_home() ) : ?>

						<h1 id="site-title"<?php tinyframework_semantics( 'site-title' ); // Function located in: inc/semantics.php ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"<?php tinyframework_semantics( 'site-url' ); // Function located in: inc/semantics.php ?>><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<p id="site-title"<?php tinyframework_semantics( 'site-title' ); // Function located in: inc/semantics.php ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"<?php tinyframework_semantics( 'site-url' ); // Function located in: inc/semantics.php ?>><?php bloginfo( 'name' ); ?></a></p>

					<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
					?>

						<p id="site-description"<?php tinyframework_semantics( 'site-description' ); // Function located in: inc/semantics.php ?>><?php echo $description; ?></p>

					<?php endif;
				?>

			</div><!-- #site-title-wrapper -->

		</div><!-- .site-branding -->

		<?php
		/* Accessibility. Aria Label: Provides a label to differentiate multiple navigation landmarks
		 * hidden heading: provides navigational structure to site for scanning with screen reader
		 */
		?>

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'tiny-framework' ); ?>" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">

			<h2 class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'tiny-framework' ); ?></h2>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'tiny-framework' ); ?></button>

			<?php // Search form for mobile menu ?>

			<div class="search-box-wrapper search-container-mobile">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>

			<!--<button class="go-to-top"><a href="#page"><span class="icon-webfont fa-chevron-circle-up" aria-hidden="true"></span></a></button>-->

			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'nav-menu',
				'depth'          => 4,
				) );
			?>

		</nav><!-- #site-navigation -->

		<?php tha_header_bottom(); // custom action hook ?>

	</header><!-- .site-header -->

	<?php tha_header_after(); // custom action hook ?>

	<div id="content" class="site-content">
