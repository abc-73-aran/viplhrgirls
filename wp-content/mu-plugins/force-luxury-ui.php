<?php
/**
 * Plugin Name: Force Luxury UI
 * Description: Premium luxury UI, SEO optimized hero/title, sticky WhatsApp, full local content with periodic banners
 */

// --- Force SSL Integration ---
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// PHP-based redirect fallback to HTTPS
if (!is_ssl() && !(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
    if (php_sapi_name() !== "cli" && !headers_sent()) {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
        exit();
    }
}

if (!defined('FORCE_SSL_ADMIN')) {
    define('FORCE_SSL_ADMIN', true);
}
add_filter('option_home', function($url) { 
    return (is_ssl() || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) 
        ? str_replace('http://', 'https://', $url) : $url; 
});
add_filter('option_siteurl', function($url) { 
    return (is_ssl() || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) 
        ? str_replace('http://', 'https://', $url) : $url; 
});

// --- SEO Title Optimization ---
add_filter('pre_get_document_title', function($title) {
    if (is_front_page()) {
        return "Call Girls & Escorts in Lahore - +92 329 690 5800 | VIPLHRGIRLS";
    }
    return $title;
}, 9999);

// --- Inject Favicon & Core CSS ---
add_action('wp_head', function() {
    ?>
    <!-- Original Favicon Integration -->
    <link rel="icon" href="https://viplhrgirls.com/wp-content/uploads/vip_premium_favicon_custom.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="https://viplhrgirls.com/wp-content/uploads/vip_premium_favicon_custom.png" />
    
    <style id="brutal-luxury-force">
        
        :root {
            --lux-bg: #050505 !important;
            --lux-surface: #0f0f0f !important;
            --lux-gold: #C5A059 !important;
            --lux-gold-dim: rgba(197, 160, 89, 0.2) !important;
            --lux-white: #FFFFFF !important;
            --text-muted: #A0A0A0 !important;
        }

        html, body, #page, #content, .site-content, .grid-container, .inside-article, 
        .site-main, .site-header, .site-footer, footer, header, 
        .separate-containers .inside-article, .main-navigation {
            background-color: var(--lux-bg) !important;
            background: var(--lux-bg) !important;
            color: var(--lux-white) !important;
        }

        h1, h2, h3, h4, .entry-title, .widget-title {
            font-family: 'Playfair Display', serif !important;
            color: var(--lux-gold) !important;
            font-weight: 700 !important;
            letter-spacing: 1px;
        }

        body { 
            font-family: 'Inter', sans-serif !important; 
            overflow-x: hidden;
        }

        /* --- Header & Logo --- */
        .luxury-header {
            position: absolute;
            top: 0; left: 0; right: 0;
            padding: 30px 40px;
            display: flex;
            justify-content: flex-start; /* Aligns logo to the left */
            align-items: center;
            z-index: 9999;
            background: transparent !important;
        }
        
        .luxury-header-logo img {
            max-height: 120px;
            width: auto;
            /* Magically removes the black background, leaving only the gold! */
            mix-blend-mode: screen;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.9));
        }
        
        @media (max-width: 768px) {
            .luxury-header { display: none !important; }

            /* Fix hero buttons on mobile - prevent text wrapping */
            .luxury-btn, .luxury-btn-outline {
                padding: 13px 18px !important;
                font-size: 0.72rem !important;
                letter-spacing: 1px !important;
                white-space: nowrap !important;
            }
        }

        /* --- Animations --- */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 1s ease-out forwards;
            opacity: 0;
        }
        
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }

        /* --- Buttons --- */
        .luxury-btn {
            background: linear-gradient(135deg, #d4af37, #C5A059, #aa8022) !important;
            color: #000 !important;
            padding: 18px 45px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 2px !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            border-radius: 2px !important;
            transition: all 0.4s ease !important;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.3) !important;
            border: 1px solid transparent !important;
        }
        
        .luxury-btn:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 25px rgba(197, 160, 89, 0.5) !important;
            background: linear-gradient(135deg, #e6c552, #d4af37, #c5a059) !important;
        }
        
        .luxury-btn-outline {
            background: transparent !important;
            color: var(--lux-gold) !important;
            border: 1px solid var(--lux-gold) !important;
            box-shadow: none !important;
            padding: 16px 40px !important;
        }
        
        .luxury-btn-outline:hover {
            background: var(--lux-gold-dim) !important;
            color: #FFF !important;
        }

        .site-logo, .custom-logo-link, .header-widget { display: none !important; }
        
        /* --- Hero Section --- */
        .luxury-hero-wrap {
            height: 100vh;
            min-height: 700px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center; 
            padding: 0 20px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            background: linear-gradient(to bottom, rgba(5,5,5,0.4), rgba(5,5,5,1)), url('https://viplhrgirls.com/wp-content/themes/viplhr-luxury/images/luxury_hero.jpg') top center/cover no-repeat;
            position: relative;
        }
        
        .hero-content {
            z-index: 2;
            position: relative;
        }

        /* --- Content Area & Grids --- */
        #force-luxury-content {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            background: var(--lux-bg) !important;
            z-index: 9999;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
            line-height: 1.8;
            font-size: 1.15rem;
            color: var(--text-muted) !important;
        }

        .premium-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 120px;
        }
        
        .text-block {
            text-align: center;
            max-width: 900px;
            margin: 0 auto 100px;
        }
        
        .text-block h2 {
            font-size: clamp(2rem, 4vw, 3rem) !important;
            margin-bottom: 25px;
        }

        @media (max-width: 900px) {
            .premium-section {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: left;
            }
            /* Reset visual order for mobile */
            .premium-section.img-left .section-image { grid-row: 1; }
            .premium-section.img-left .section-text { grid-row: 2; }
            .premium-section.img-right .section-image { grid-row: 1; }
            .premium-section.img-right .section-text { grid-row: 2; }
        }

        /* Ensure ALL text in columns is left aligned for professional look */
        .section-text {
            text-align: left !important;
        }

        .section-text h2 {
            font-size: clamp(2rem, 3.5vw, 2.8rem) !important;
            margin-top: 0;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .section-text p, .text-block p {
            margin-bottom: 25px;
            font-weight: 300;
        }

        .section-image {
            position: relative;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }

        .section-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s ease;
        }
        
        .section-image:hover img {
            transform: scale(1.03);
        }

        /* --- Periodic Prominent Banners --- */
        .periodic-banner {
            background: var(--lux-surface);
            border-top: 1px solid var(--lux-gold-dim);
            border-bottom: 1px solid var(--lux-gold-dim);
            padding: 60px 20px;
            text-align: center;
            margin: 80px 0;
            position: relative;
            overflow: hidden;
            border-radius: 4px;
        }
        
        .periodic-banner h3 {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--lux-white) !important;
        }
        
        .periodic-banner p {
            max-width: 600px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
            color: #DDD;
        }
        
        .periodic-banner .phone-highlight {
            display: inline-block;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--lux-gold);
            font-family: 'Playfair Display', serif;
            letter-spacing: 2px;
            margin: 20px 0;
            text-shadow: 0 5px 15px rgba(197, 160, 89, 0.2);
        }

        /* --- Sticky WhatsApp --- */
        .sticky-whatsapp {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            color: #FFF !important;
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
            z-index: 10000;
            text-decoration: none !important;
            transition: all 0.3s ease;
            animation: pulse-green 2s infinite;
        }

        .sticky-whatsapp:hover {
            transform: scale(1.1);
            background: #20b858;
        }

        .sticky-whatsapp svg {
            width: 35px;
            height: 35px;
            fill: #FFF;
        }

        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

    </style>
    <?php
}, 9999);

add_action('wp_body_open', function() {
    if (is_front_page()) {
        ?>
        <header class="luxury-header animate-fade-up">
            <a href="/" class="luxury-header-logo">
                <img src="https://viplhrgirls.com/wp-content/uploads/vip_premium_logo_custom.png" alt="VIPLHRGIRLS Logo" />
            </a>
        </header>

        <!-- HERO SECTION (SEO Optimized w/ Number in H1) -->
        <div class="luxury-hero-wrap">
            <div class="hero-content animate-fade-up">
                <span style="color: var(--lux-gold); text-transform: uppercase; letter-spacing: 6px; font-size: 0.85rem; display: block; margin-bottom: 20px;">Premium Escort Service</span>
                <h1 style="font-size: clamp(2.5rem, 6vw, 4.5rem); margin: 0 0 20px; line-height: 1.1; color: #FFF !important; text-shadow: 0 10px 30px rgba(0,0,0,0.8);">
                    Premium Escorts &<br>Call Girls in Lahore<br>
                    <span style="color: var(--lux-gold); font-size: 0.8em; display:block; margin-top:15px;">+92 329 690 5800</span>
                </h1>
                <p style="max-width: 800px; margin: 0 auto 40px; color: #CCC; font-size: 1.25rem; font-weight: 300; line-height: 1.7;">Discreet, luxury companionship tailored to the highest standards. Experience the very best independent Call Girls in Lahore and elite agency companions.</p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="tel:+923296905800" class="luxury-btn">CALL NOW: +92 329 690 5800</a>
                    <a href="https://wa.me/923296905800" class="luxury-btn luxury-btn-outline" target="_blank">CHAT ON WHATSAPP</a>
                </div>
            </div>
        </div>
        
        <!-- MAIN CONTENT -->
        <div id="force-luxury-content">
            
            <div class="text-block animate-fade-up">
                <p style="font-size: 1.25rem; color: #DDD;">VIPLHRGIRLS is the most reliable, secure, and exclusive escort service agency in Lahore. Our selection includes not only beautiful local call girls but also stunning Russian escorts, ensuring that we cater to all your preferences. Whether you are looking for an elegant companion for a social event, a passionate partner for a quiet evening, or someone to help you unwind after a long day, VIPLHRGIRLS has the perfect match for you.</p>
                <p>Our escorts in Lahore are carefully chosen for their beauty, intelligence, and engaging personalities. We pride ourselves on providing an exceptional experience that goes beyond just physical attraction. We offer professional, high-class companions in Gulberg, Johar Town, Iqbal Town, and beyond.</p>
            </div>

            <!-- Section 1: Text Left, Image Right -->
            <div class="premium-section img-right animate-fade-up delay-1">
                <div class="section-text">
                    <h2>Escorts in Lahore – Premium Call Girl Agency</h2>
                    <p>If you're seeking top-tier escorts in Lahore, our agency offers an exclusive selection of independent call girls and agency companions. We understand that discretion and privacy are crucial, which is why we guarantee a seamless and confidential booking process. By browsing our profiles, you can find the perfect match for your desires, ensuring an unforgettable time with the best escorts in Lahore.</p>
                    <a href="tel:+923296905800" class="luxury-btn" style="padding: 14px 30px !important;">Book Your Escort Now</a>
                </div>
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/qGMb8GQBTPql7sTILncuLg.jpeg" alt="Premium Escorts in Lahore" loading="lazy" />
                </div>
            </div>

            <!-- PERIODIC BANNER 1 -->
            <div class="periodic-banner animate-fade-up">
                <h3>Call Girls in Lahore For Every Occasion</h3>
                <p>Our concierge team is available 24/7. Call us directly to find the perfect independent call girl in Lahore matching your desires.</p>
                <div class="phone-highlight">+92 329 690 5800</div>
                <div><a href="https://wa.me/923296905800" class="luxury-btn">Message on WhatsApp</a></div>
            </div>

            <!-- Section 2: Image Left, Text Right (BUT TEXT IS LEFT ALIGNED internally) -->
            <div class="premium-section img-left animate-fade-up delay-1" style="grid-template-columns: 1fr 1fr;">
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/P36xu2ZDSsS5nc2onlxFMA.jpeg" alt="Russian Escorts in Lahore" loading="lazy" />
                </div>
                <div class="section-text">
                    <h2>Call Girls in Lahore – Exclusive Companionship</h2>
                    <p>When it comes to call girls in Lahore, VIPLHRGIRLS stands out as the premier choice for those seeking high-class, discreet, and professional companionship. Our stunning call girls are not only beautiful but also intelligent, charming, and highly engaging, ensuring that your time with them is both memorable and enjoyable.</p>
                    <p>We offer a range of call girls to match your specific preferences, whether you're attending a formal event or simply looking to relax with an intimate companion. Our commitment to privacy and client satisfaction guarantees an experience that is professional, comfortable, and unforgettable.</p>
                </div>
            </div>
            
            <!-- Mid-Text Block -->
            <div class="text-block animate-fade-up">
                <h2>Russian Escorts in Lahore – Exotic Beauty</h2>
                <p>If you're looking for something a little different, our Russian escorts in Lahore bring a touch of exotic beauty and international charm to your experience. Known for their stunning looks, intelligence, and engaging personalities, our Russian companions are the ideal choice for those seeking an unforgettable time in Lahore.</p>
                <p>Whether you're looking for a companion for a special night out or a private and intimate experience, our Russian escorts provide an exceptional level of service and sophistication that will make your time truly special.</p>
            </div>

            <!-- PERIODIC BANNER 2 -->
            <div class="periodic-banner animate-fade-up" style="background: linear-gradient(rgba(5,5,5,0.9), rgba(5,5,5,0.9)), url('https://viplhrgirls.com/wp-content/themes/viplhr-luxury/images/luxury_hero.jpg') center/cover;">
                <h3 style="color: var(--lux-gold) !important;">Book Your Exotic Companion Today</h3>
                <p style="color: #FFF;">Book the most exquisite Russian and local call girls in Lahore instantly.</p>
                <div class="phone-highlight" style="text-shadow: 0 5px 15px rgba(0,0,0,1);">+92 329 690 5800</div>
                <div><a href="tel:+923296905800" class="luxury-btn">CALL NOW TO BOOK</a></div>
            </div>

            <!-- Section 3: Text Left, Image Right -->
            <div class="premium-section img-right animate-fade-up delay-1">
                <div class="section-text">
                    <h2>Gulberg Lahore Call Girl – Unparalleled Elegance</h2>
                    <p>If you're looking for a call girl in Lahore Gulberg, VIPLHRGIRLS offers exclusive services that bring the perfect blend of sophistication, charm, and elegance. Gulberg is one of Lahore's most prestigious areas, and our escorts reflect that same level of quality. Whether you're attending a luxurious event or looking to enjoy a private moment, our Gulberg call girls are trained to provide the best possible experience.</p>
                    <p>Their beauty, professionalism, and ability to engage in meaningful conversation make them the perfect choice for any occasion. Our goal is to ensure your satisfaction, comfort, and a memorable experience every time.</p>
                </div>
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/Leonardo_Kino_XL_A_Young_Pakistani_model_from_Islamabad_with_a_3.jpg" alt="Gulberg Lahore Call Girl" loading="lazy" />
                </div>
            </div>
            
             <!-- Section 4: Image Left, Text Right -->
            <div class="premium-section img-left animate-fade-up delay-1">
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/nu0PXLvrSqWMEt1-edRJuA.jpeg" alt="Escort Gardens Johar Town Lahore" loading="lazy" />
                </div>
                <div class="section-text">
                    <h2>Premium Companions in Johar Town Lahore</h2>
                    <p>For those in the Johar Town area, VIPLHRGIRLS offers premium escort services in Gardens Johar Town Lahore. Whether you’re attending a formal event or just seeking a relaxing night, our gorgeous companions will ensure every moment is delightful and unforgettable.</p>
                    <p>Our services in Johar Town cater to those who desire beauty, charm, and sophistication. Enjoy a truly exceptional experience with a companion who knows how to make every moment count.</p>
                    <a href="tel:+923296905800" class="luxury-btn luxury-btn-outline" style="padding: 14px 30px !important;">Book Johar Town Escort</a>
                </div>
            </div>

            <!-- PERIODIC BANNER 3 -->
            <div class="periodic-banner animate-fade-up">
                <h3>VIP Local & Foreign Escort Services</h3>
                <p>Available 24/7 in Gulberg, Johar Town, DHA, and Iqbal Town. Contact our concierge for immediate arrangements.</p>
                <div class="phone-highlight">+92 329 690 5800</div>
            </div>

            <!-- Section 5: Text Left, Image Right -->
            <div class="premium-section img-right animate-fade-up delay-1">
                <div class="section-text">
                    <h2>Call Girl in Iqbal Town Lahore – Exceptional Needs</h2>
                    <p>Our call girls in Iqbal Town Lahore are available to cater to your every need, offering companionship that is both professional and unforgettable. Whether you're seeking a charming date for an upscale social event or looking for an intimate companion for private moments, our escorts in Iqbal Town are ready to deliver an experience that exceeds your expectations.</p>
                    <p>With a focus on professionalism, discretion, and client satisfaction, we ensure that every encounter with our Iqbal Town call girls is special and memorable.</p>
                </div>
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/7x9_WfdIQ9yaxy08Rse9rg-1.jpeg" alt="Call Girl in Iqbal Town Lahore" loading="lazy" />
                </div>
            </div>

            <!-- Section 6: Image Left, Text Right -->
            <div class="premium-section img-left animate-fade-up delay-1">
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/ff3VGtkaTbmGep_0k3_Rcw.jpeg" alt="Call Girl Numbers in Lahore" loading="lazy" />
                </div>
                <div class="section-text">
                    <h2>Call Girl Numbers in Lahore – Easy Access</h2>
                    <p>At VIPLHRGIRLS, we understand the importance of convenience when booking premium companions. That's why we provide call girl numbers in Lahore (+923296905800) that make it easy for you to reach out and book the perfect companion. Our call girls are available for various occasions, from intimate gatherings to social events, and we're here to ensure your experience is seamless.</p>
                    <p>With a focus on discretion and professionalism, we make sure your personal information remains secure while providing you with the highest-quality companionship in Lahore.</p>
                </div>
            </div>

            <!-- PERIODIC BANNER 4 -->
            <div class="periodic-banner animate-fade-up" style="border: 1px solid var(--lux-gold);">
                <h3 style="color: var(--lux-gold) !important;">Call Girl Numbers in Lahore</h3>
                <p>Direct line to the most exclusive escort agency representing the finest companions.</p>
                <div class="phone-highlight" style="font-size: 3rem;">+92 329 690 5800</div>
            </div>
            
            <!-- Section 7: Text Left, Image Right -->
            <div class="premium-section img-right animate-fade-up delay-1">
                <div class="section-text">
                    <h2>Call Girl for Rent in Lahore – Discretion At Service</h2>
                    <p>If you're looking for a call girl for rent in Lahore, VIPLHRGIRLS offers a variety of stunning companions who can meet your needs and provide an unforgettable experience. Whether you're hosting a special event, enjoying a quiet dinner, or simply looking for companionship, we offer a service that is discreet, professional, and tailored to your preferences.</p>
                    <p>Our call girls for rent in Lahore are available for different time frames, ensuring flexibility based on your schedule. Rest assured that each experience is designed to provide comfort, elegance, and a high level of satisfaction.</p>
                </div>
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/ng-qwPWGRGCKkokrR0yR0Q.jpg" alt="Call Girl for Rent in Lahore" loading="lazy" />
                </div>
            </div>
            
            <!-- Text Block: Rates -->
            <div class="text-block animate-fade-up">
                <h2>Rates of Call Girls in Lahore – Affordable Luxury</h2>
                <p>At VIPLHRGIRLS, we believe that luxury companionship should be accessible without compromising on quality. Our rates for call girls in Lahore are competitive, providing excellent value for the experience you’ll receive. We offer a range of pricing options based on the type of service you require, from intimate dates to social events.</p>
                <p>Our goal is to provide clients with high-quality companionship that meets their expectations without breaking the bank. For detailed information about our rates, please feel free to contact us directly via Phone or WhatsApp at +92 329 690 5800.</p>
            </div>
            
            <!-- Section 8: Image Left, Text Right -->
            <div class="premium-section img-left animate-fade-up delay-1">
                <div class="section-image">
                    <img src="https://viplhrgirls.com/wp-content/uploads/2024/11/vwK9BDZJTa-fvqbo-Y1saA.jpg" alt="VIPLHRGIRLS" loading="lazy" />
                </div>
                <div class="section-text">
                    <h2>Final Thoughts – Book Your Perfect Companion Today</h2>
                    <p>Whether you're looking for an escort in Lahore, a call girl in Gulberg, or a Russian call girl in Lahore, VIPLHRGIRLS is here to offer a range of stunning companions for every occasion. Our services are designed to provide comfort, elegance, and discretion, ensuring your experience is tailored to meet your desires. For guides and updates, visit our <a href="https://viplhrgirls.com/blog/" style="color: var(--lux-gold);">Lahore escorts blog</a>.</p>
                    <p>With a focus on professionalism, privacy, and client satisfaction, VIPLHRGIRLS is your trusted partner for premium luxury escort services. Book with us today and experience the very best that Lahore has to offer in companionship and luxury. Travelling to the capital? Our partner site <a href="https://vipisbgirls.com/" target="_blank" rel="noopener" style="color: var(--lux-gold);">VIP Islamabad Girls</a> offers the same elite standard in Islamabad, while <a href="https://viplhrclub.com/" target="_blank" rel="noopener" style="color: var(--lux-gold);">VIP Lahore Club</a> covers exclusive club companionship in Lahore.</p>
                </div>
            </div>

            <!-- FAQ SECTION (AEO: matches FAQPage structured data) -->
            <div class="text-block animate-fade-up" itemscope>
                <h2>Frequently Asked Questions</h2>
                <div style="text-align: left; max-width: 900px; margin: 0 auto;">
                    <h3 style="margin-top: 35px;">How do I book an escort or call girl in Lahore with VIPLHRGIRLS?</h3>
                    <p>Booking is simple and discreet: call or WhatsApp our concierge at <a href="tel:+923296905800" style="color: var(--lux-gold);">+92 329 690 5800</a>. Our team is available 24/7 and will arrange the perfect companion for your schedule and location in Lahore.</p>
                    <h3 style="margin-top: 35px;">Which areas of Lahore does VIPLHRGIRLS serve?</h3>
                    <p>We serve all major areas of Lahore including Gulberg, DHA, Johar Town, Iqbal Town, Bahria Town and Model Town, with both in-call and out-call arrangements.</p>
                    <h3 style="margin-top: 35px;">Is the service confidential?</h3>
                    <p>Yes. Absolute discretion is our hallmark. Your personal information is never shared and every booking is handled privately by our concierge team.</p>
                    <h3 style="margin-top: 35px;">Are companions available in other cities such as Islamabad?</h3>
                    <p>Yes. Through our partner network &mdash; <a href="https://vipisbgirls.com/" target="_blank" rel="noopener" style="color: var(--lux-gold);">VIP Islamabad Girls</a> and <a href="https://viplhrclub.com/" target="_blank" rel="noopener" style="color: var(--lux-gold);">VIP Lahore Club</a> &mdash; we can arrange elite companionship in Islamabad and across our wider network.</p>
                    <h3 style="margin-top: 35px;">What are the rates for call girls in Lahore?</h3>
                    <p>Rates depend on the companion and the type of booking (dinner date, event or private meeting). Contact us on <a href="https://wa.me/923296905800" target="_blank" rel="noopener" style="color: var(--lux-gold);">WhatsApp</a> for current availability and pricing.</p>
                </div>
            </div>

            <!-- Final CTA Banner -->
            <div style="text-align: center; padding: 100px 20px; border-top: 2px solid var(--lux-gold);" class="animate-fade-up delay-2">
                <h2 style="margin-top:0; font-size: clamp(2.5rem, 5vw, 3.5rem); margin-bottom: 20px;">Ready to experience the pinnacle of companionship in Lahore?</h2>
                <p style="font-size: 1.3rem; margin-bottom: 40px; color: #CCC;">Book now and let us provide you with a partner who matches your desires. Direct bookings only.</p>
                <a href="tel:+923296905800" class="luxury-btn" style="transform: scale(1.1); font-size: 1.2rem; padding: 22px 55px !important;">📞 CALL: +92 329 690 5800</a>
            </div>
            
        </div>
        
        <!-- STICKY WHATSAPP BUTTON -->
        <a href="https://wa.me/923296905800" class="sticky-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.666.596 1.216.774 1.389.86.173.086.275.072.376-.043.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.031 22.056c-1.571 0-3.085-.4-4.416-1.12l-5.18 1.36 1.38-4.996c-.82-1.39-1.254-2.986-1.255-4.636.002-5.145 4.186-9.332 9.336-9.332 2.492.001 4.836.974 6.598 2.738 1.761 1.764 2.731 4.107 2.73 6.602-.002 5.146-4.187 9.334-9.336 9.334z"/>
            </svg>
        </a>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.animationPlayState = 'running';
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                document.querySelectorAll('.animate-fade-up').forEach(el => {
                    el.style.animationPlayState = 'paused';
                    observer.observe(el);
                });
            });
        </script>
        <?php
    }
}, 1);

add_action('wp_head', function() {
    if(is_front_page()) {
        echo '<style>.site-main { display: none !important; }</style>';
    }
}, 9999);

add_action('template_redirect', function() {
    if (is_front_page()) {
        ob_start(function($buffer) {
            $old_nums = ['03091115696', '0309 1115696', '+923091115696'];
            $new_num = '+923296905800';
            return str_replace($old_nums, $new_num, $buffer);
        });
    }
});
