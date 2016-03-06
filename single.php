<?php get_header();?>

<main class="content-inner">
    <div class="container">
        <section class="blogs-container">
            <?php if (have_posts()) :
            while (have_posts()) {
            the_post(); ?>
                <article class="blog-section">
                    <div class="text-center">
                        <h2 class="text-primehead text-center"><?php the_title(); ?></h2>
                        <p class="text-postdate text-center">Posted on <?php echo get_the_time('F j, Y'); ?></p>
                        <figure class="blog-img">
                            <?php the_post_thumbnail('mini-thumb'); ?>
                        </figure>
                    </div>
                    <div class="blog-desc text-justify"> <?php the_content(); ?></div>
                </article>
            <?php }; endif; ?>
            <div class="text-center share-sc">
                <h6 class="text-desc">Share this article...</h6>
                <ul class="share-list row center-xs">
                    <li><a class="text-desc" href="#"><span class="fa fa-twitter"></span><span class="val-counter">0</span></a></li>
                    <li><a class="text-desc" href="#"><span class="fa fa-facebook"></span><span class="val-counter">0</span></a></li>
                    <li><a class="text-desc" href="#"><span class="fa fa-pinterest-p"></span><span class="val-counter">0</span></a></li>
                </ul>
            </div>
        </section>
        <section class="comments-block">
            <h4 class="text-primehead">Comments</h4>
            <?php if (comments_open()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        </section>
        <section class="newcomment-block">
            <h4 class="text-primehead">Leave a Comment</h4>
            <?php $args = array(
            'fields'               => array(
            'author' => '<h6 class="text-desc comment-form-author">' . '<label for="new-name">' . __( 'Name *' ) . ( $req ? ' <span class="required text-desc">*</span>' : '' ) . '</label> ' .
                '<input id="new-name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></h6>',
            'email'  => '<h6 class="text-desc comment-form-email"><label for="new-email">' . __( 'Email *' ) . ( $req ? ' <span class="required text-desc">*</span>' : '' ) . '</label> ' .
                '<input id="new-email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></h6>',
            ),
            'comment_field'        => '<h6 class="text-desc comment-form-comment"><label for="new-message">' . _x( 'Your Comment *', 'noun' ) . '</label><textarea id="new-message" name="comment" rows="10" cols="70" aria-required="true" required="required"></textarea></h6>',
            'must_log_in'          => '<p class="must-log-in text-desc">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
            'logged_in_as'         => '<p class="logged-in-as text-desc">' . sprintf( __( '<a class="comment-reply-link" href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a class="comment-reply-link" href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
            'comment_notes_before' => '<p class="comment-notes text-desc"><span class="text-desc" id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
            'id_form'              => 'commentform',
            'class_form'           => 'new-comment-form text-desc',
            'title_reply'          => __( '' ),
            'title_reply_to'       => __( '' ),
            'cancel_reply_before'  => '<span class="text-desc">',
                'cancel_reply_after'   => '</span>',
            'submit_field'         => '<h6 class="form-submit text-desc">%1$s %2$s</h6>',
            );

            comment_form( $args ); ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
