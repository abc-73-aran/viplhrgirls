<?php get_header(); ?>
<main id="main" class="site-main" style="padding: 160px 20px 100px;">
    <div class="container" style="max-width: 900px; margin: 0 auto;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 50px; text-align: center;">
                    <h1 class="entry-title" style="font-size: 3.5rem;"><?php the_title(); ?></h1>
                    <div style="width: 50px; height: 1px; background: var(--gold); margin: 30px auto;"></div>
                </header>
                <div class="entry-content" style="color: var(--text-muted); line-height: 1.8; font-size: 1.1rem;">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>
