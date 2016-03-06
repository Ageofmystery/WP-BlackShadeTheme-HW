<?php if ( post_password_required() ) {return;} ?>

	<?php if ( have_comments() ) : ?>

	<?php function comment_formatted($comment, $args, $depth){ $GLOBALS['comment'] = $comment; ?>

	<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<figure class="round-avatar">
			<?php echo get_avatar( $comment, $size='71'); ?>
		</figure>
		<h6 class="commenter-name text-desc"><?php echo get_comment_author(); ?></h6>
		<p class="text-postdate"><?php printf( '%1$s &mdash; %2$s', get_comment_date('F j, Y'),  get_comment_time('g:i A')) ?></p>

		<?php if ($comment->comment_approved == '0') : ?>
			<p class="text-desc">Ваш комментарий ожидает проверки.</p>
		<?php endif; ?>

		<?php comment_text() ?>
		<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Click to Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

		<?php } ?>

		<?php wp_list_comments( array(
			'style'       => 'div',
			'short_ping'  => true,
			'type'        => 'comment',
			'callback'    => 'comment_formatted',
		) ); ?>


	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments text-desc"><?php _e( 'Comments are closed.', 'BlackShadeClassic' ); ?></p>
	<?php endif; ?>

	<?php else : { ?> <p class="text-desc">No comments yet. You will be first :)</p> <?php } endif; // have_comments() ?>



