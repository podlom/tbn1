<?php
/*
 Plugin Name: Banners Network bn1
 Plugin URI: https://blog.shkodenko.com.ua
 Description: Display banner using [show_bn lang=en] shortcode.
 Version: 1.0.0
 Author: Taras Shkodenko
 Author URI: https://www.shkodenko.com
 Created on 2022-08-21
 */


class TaBn0Plugin {

	/** @var string Banners Service Domain Name */
	const BANNER_DOMAIN = 'bn1.shkodenko.com.ua';

	public static function bnShort( $atts, $content = '' ) {
		$lang = 'en';
		if ( isset( $atts['lang'] ) ) {
			$lang = $atts['lang'];
		}
		$html = file_get_contents( 'http://' . self::BANNER_DOMAIN . '/?lang=' . $lang );
		if ( $html !== false ) {
			return $html;
		}
		return '<!-- Banner HTML goes here... -->';
	}
}
add_shortcode( 'show_bn', array( 'TaBn0Plugin', 'bnShort' ) );

/*
 * @exampe footer.php usage in theme
 *
```

<div id="bn0" class="banner">
	<?php echo do_shortcode('[show_bn lang=en]'); ?>
</div>

```
 *
 */
