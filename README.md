indiepub-spoken-essay
=====================

## Requirements

### WPaudio MP3 Player

This plugin currently requires the [WPaudio MP3 Player](http://wordpress.org/plugins/wpaudio-mp3-player/) plugin. Eventually, all the functionality to play spoken essays will be included in this plugin.

### Font Awesome fonts

The icons used by this plugin come from the Font Awesome page (see [Font Awesome](fortawesome.github.io/Font-Awesome/)). If your theme does not already load Font Awesome, you'll need to download the package to your theme directory and then load it by adding the following code snippet to your theme's `functions.php` file (this assumes Font Awesome has been copied to a directory called `font-awesome` inside your theme directory):

```
/**
 * Register font-awesome style sheet.
 */
add_action( 'wp_enqueue_scripts', 'register_font_awesome_style' );
function register_font_awesome_style() {
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '3.2.1' );
	wp_enqueue_style( 'font-awesome' );
}
```