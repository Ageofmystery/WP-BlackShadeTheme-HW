<?php get_header();?>

<main class="content-inner">
    <div class="container">
        <section class="blogs-container">
            <?php if (have_posts()) :
                while (have_posts()) {
                    the_post(); ?>
                    <article class="blog-section">
                        <div class="text-center">
                            <h2 class="text-primehead text-center"><a
                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="text-postdate text-center">Posted on <?php echo get_the_time('F j, Y'); ?></p>
                            <figure class="blog-img">
                                <?php the_post_thumbnail(); ?>
                            </figure>
                        </div>
                        <div class="blog-desc text-justify"><?php the_excerpt(); ?></div>
                        <a class="btn-more" href="<?php the_permalink(); ?>"><span
                                class="fa fa-arrow-circle-o-right"></span>Read More</a>
                    </article>
                <?php };
            else :
                echo '<p class="text-center text-desc">Empty</p>';
            endif; ?>
<!---->
<!--            <nav class="navigation pagination row center-xs" role="navigation">-->
<!--                <h2 class="screen-reader-text">Навигация по записям</h2>-->
<!--                <div class="nav-links"><span class="page-numbers current"><span class="meta-nav screen-reader-text">Страница </span>1</span>-->
<!--                    <a class="page-numbers" href="http://wptest.ru/page/2/"><span class="meta-nav screen-reader-text">Страница </span>2</a>-->
<!--                    <span class="page-numbers dots">…</span>-->
<!--                    <a class="page-numbers" href="http://wptest.ru/page/86/"><span class="meta-nav screen-reader-text">Страница </span>86</a>-->
<!--                    <a class="page-numbers" href="http://wptest.ru/page/87/"><span class="meta-nav screen-reader-text">Страница </span>87</a>-->
<!--                    <a class="next page-numbers" href="http://wptest.ru/page/2/">Следующая страница</a>-->
<!--                </div>-->
<!--            </nav>-->

<!--            --><?php //the_posts_pagination(); ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
