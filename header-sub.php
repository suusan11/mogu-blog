<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-01-26
 * Time: 22:50
 */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <title><?php bloginfo('name'); ?></title>

    <!--to use Adobe font-->
    <script>
        (function(d) {
            var config = {
                    kitId: 'hrm5nof',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>
    <?php wp_head(); ?>
</head>
<body>
<header class="header__sub">
    <nav class="header__sub-nav">
        <a class="header__sub-nav-logo" href="<?php echo home_url('/'); ?>"><img src="./images/pig.svg" alt="sample icon"></a>
	    <?php
	    wp_nav_menu( array(
			    'theme_location' => 'sub',
			    'menu_class' => 'header__sub-nav-menus'
		    )
	    )
	    ?>
    </nav>
</header>
