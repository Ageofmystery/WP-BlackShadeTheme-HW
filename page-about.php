<?php get_header(); ?>

<main class="content-inner">
    <div class="container">
        <section class="blogs-container">
            <article class="blog-section">
                <div class="text-center">
                    <h2 class="text-primehead text-center">What We Are All About</h2>
                </div>
                <div class="blog-desc text-justify">
                    <p class="text-desc">It’s not always easy to filter out noise and purely focus on the content. Too
                        many blogs and news sites are filled with colourful and distracting
                        advertisement left right and centre. This is where we do things differently! Rather than just
                        focusing purely and generating revenue, we focus
                        on great user experience.</p>
                    <p class="text-desc">You will notice that our news articles are content focused and free of any
                        distractions. On top of that, we deliver content revolving design on a
                        daily basis. Offering you insightful tutorials, techniques, design inspirations, mobile app
                        development, coding, unique advertisements, and
                        freebies.</p>
                    <p class="text-desc">Our focus is and forever will be to bring high quality resources to lean from
                        and to be inspired. Visit us daily for new design related articles!</p>
                </div>
            </article>
            <article class="blog-section">
                <div class="text-center">
                    <h2 class="text-primehead text-center">Meet Our Team!</h2>
                </div>
                <div class="blog-desc row">
                    <?php $queryPost = new WP_Query( array('post_type' => 'team', 'order' => 'ASC', 'posts_per_page' => 20,));
                    if ( $queryPost->have_posts() ) {
                    while ( $queryPost->have_posts() ) : $queryPost->the_post(); ?>
                        <div class="person-team text-center">
                            <figure class="person-img">
                                <?php the_post_thumbnail();?>
                            </figure>
                            <h6 class="text-desc"><?php the_title();?></h6>
                            <p class="person-prof">
                                <?php foreach (get_post_custom_values('profession') as $key => $value) {
                                    echo $value;
                                } ?>
                            </p>
                            <div class="text-desc"><?php the_content(); ?></div>
                        </div>
                    <?php endwhile;
                        wp_reset_postdata();
                    } else {
                        echo '<p class="text-center text-desc">Empty</p>';
                    }; ?>
                </div>
            </article>
        </section>
    </div>
</main>

<?php get_footer(); ?>
