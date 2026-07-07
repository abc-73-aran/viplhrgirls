<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style id="luxury-force-css">
        :root {
            --primary-bg: #050505;
            --gold: #C5A059;
            --text-white: #FFFFFF;
            --text-muted: #888888;
        }
        html, body, #page, #content, .site-content, .grid-container, .inside-article, .entry-content, .site-main, .separate-containers .inside-article, .separate-containers .sidebar > div, footer {
            background-color: var(--primary-bg) !important;
            background: var(--primary-bg) !important;
            color: var(--text-white) !important;
        }
        body { font-family: 'Inter', sans-serif !important; }
        h1, h2, h3, h4 { font-family: 'Playfair Display', serif !important; color: var(--gold) !important; }
        .site-header { background: transparent !important; }
        .main-navigation { background: rgba(5,5,5,0.8) !important; backdrop-filter: blur(10px); }
        .luxury-btn {
            background: var(--gold) !important;
            color: #000 !important;
            padding: 18px 45px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 2px !important;
            display: inline-block !important;
            text-decoration: none !important;
        }
        .entry-header, .site-info, .entry-meta { display: none !important; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <div class="inside-header grid-container" style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
            <div class="site-logo">
                <a href="/" style="color: var(--gold); font-family: 'Playfair Display'; font-size: 1.5rem; font-weight: 900; text-decoration: none;">VIPLHR GIRLS</a>
            </div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="inside-navigation grid-container">
                    <ul class="nav-menu" style="display: flex; list-style: none; gap: 30px; margin: 0;">
                        <li><a href="/" style="color: #FFF; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px;">HOME</a></li>
                        <li><a href="/blog/" style="color: #FFF; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px;">BLOG</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
