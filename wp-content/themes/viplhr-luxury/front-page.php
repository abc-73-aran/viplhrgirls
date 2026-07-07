<?php
/**
 * Template Name: Luxury Home
 */
get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="luxury-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('<?php echo get_stylesheet_directory_uri(); ?>/images/luxury_hero.jpg') center/cover no-repeat; padding: 220px 20px 180px; text-align: center; position: relative; overflow: hidden;">
        <div class="container" style="max-width: 1100px; margin: 0 auto; position: relative; z-index: 5;">
            <span style="color: var(--gold); text-transform: uppercase; letter-spacing: 5px; font-size: 0.85rem; font-weight: 600; margin-bottom: 20px; display: block;">Lahore's Most Exclusive Concierge</span>
            <h1 style="font-size: clamp(3rem, 10vw, 5.5rem); margin-bottom: 30px; letter-spacing: -2px; color: #FFF !important; text-shadow: 0 5px 15px rgba(0,0,0,0.5);">Defining The Apex of Sophistication</h1>
            <p style="font-size: clamp(1.1rem, 3vw, 1.3rem); color: #CCC; margin-bottom: 60px; font-family: 'Inter', sans-serif; max-width: 850px; margin-left: auto; margin-right: auto; line-height: 1.8; font-weight: 300;">Step into a world where excellence is the only standard. Our elite companions and bespoke services are tailored for those who demand nothing but the absolute best in Pakistan's cultural capital.</p>
            <div class="hero-actions" style="display: flex; gap: 25px; justify-content: center; flex-wrap: wrap;">
                <a href="tel:+923296905800" class="luxury-btn">CALL +92 329 690 5800</a>
                <a href="https://wa.me/923296905800" class="luxury-btn" style="background: transparent !important; border: 1px solid rgba(255,255,255,0.3) !important; color: #FFF !important; backdrop-filter: blur(5px);">WHATSAPP INQUIRY</a>
            </div>
        </div>
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 150px; background: linear-gradient(transparent, var(--primary-bg));"></div>
    </section>

    <!-- Value Proposition -->
    <section style="padding: 100px 20px; background: var(--primary-bg);">
         <div class="container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 50px;">
            <div style="text-align: center;">
                <h3 style="font-size: 1.4rem; margin-bottom: 15px;">Absolute Discretion</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem;">Confidentiality is our hallmark. Your privacy is protected with industrial-grade discretion and professional integrity.</p>
            </div>
            <div style="text-align: center;">
                <h3 style="font-size: 1.4rem; margin-bottom: 15px;">Elite Selection</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem;">We offer a meticulously curated portfolio of companions who embody grace, intelligence, and stunning beauty.</p>
            </div>
            <div style="text-align: center;">
                <h3 style="font-size: 1.4rem; margin-bottom: 15px;">Bespoke Experience</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem;">No two encounters are the same. We tailor every detail to exceed your specific expectations and desires.</p>
            </div>
         </div>
    </section>

    <!-- Feature Section with Generated Images -->
    <section class="portfolio-luxury" style="padding: 120px 20px; background: var(--secondary-bg);">
        <div class="container" style="max-width: 1400px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 100px;">
                <span style="color: var(--gold); text-transform: uppercase; letter-spacing: 3px; font-size: 0.9rem;">Exclusive Portfolio</span>
                <h2 style="font-size: clamp(2.5rem, 6vw, 3.5rem); margin-top: 15px;">Elegance. Grace. Beauty.</h2>
                <div style="width: 60px; height: 1px; background: var(--gold); margin: 40px auto;"></div>
            </div>
            
             <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: 50px;">
                <!-- Model 1 -->
                <div class="portfolio-card" style="position: relative; height: 600px; overflow: hidden; border-radius: 2px;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model1.png" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.9);">
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 60px 40px; background: linear-gradient(transparent, rgba(0,0,0,0.9));">
                        <h3 style="color: #FFF !important; margin: 0; font-size: 2rem;">Elite Companions</h3>
                        <p style="color: var(--gold); margin-top: 10px; font-size: 0.8rem; letter-spacing: 2px; font-weight: 600;">AVAILABLE FOR BOOKING</p>
                    </div>
                </div>
                <!-- Model 2 -->
                <div class="portfolio-card" style="position: relative; height: 600px; overflow: hidden; border-radius: 2px;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model2.png" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.9);">
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 60px 40px; background: linear-gradient(transparent, rgba(0,0,0,0.9));">
                        <h3 style="color: #FFF !important; margin: 0; font-size: 2rem;">Lahore Beauties</h3>
                        <p style="color: var(--gold); margin-top: 10px; font-size: 0.8rem; letter-spacing: 2px; font-weight: 600;">PREMIUM SELECTION</p>
                    </div>
                </div>
                <!-- Model 3 -->
                <div class="portfolio-card" style="position: relative; height: 600px; overflow: hidden; border-radius: 2px;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model3.png" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.9);">
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 60px 40px; background: linear-gradient(transparent, rgba(0,0,0,0.9));">
                        <h3 style="color: #FFF !important; margin: 0; font-size: 2rem;">Bespoke Dates</h3>
                        <p style="color: var(--gold); margin-top: 10px; font-size: 0.8rem; letter-spacing: 2px; font-weight: 600;">LUXURY EXPERIENCE</p>
                    </div>
                </div>
             </div>
        </div>
    </section>

    <!-- Call to Action Strip -->
    <section style="background: var(--gold); padding: 70px 20px; text-align: center;">
        <h2 style="color: #000 !important; font-size: 2.5rem; margin-bottom: 20px; font-weight: 800;">Experience the Ultimate Distinction</h2>
        <p style="color: #000; font-size: 1.1rem; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto; font-weight: 500;">Our concierge is ready to assist you with a seamless and discreet booking experience.</p>
        <a href="tel:+923296905800" class="luxury-btn" style="background: #000 !important; color: #FFF !important; border: none;">BOOK EXCLUSIVELY NOW</a>
    </section>
</main>

<?php get_footer(); ?>
