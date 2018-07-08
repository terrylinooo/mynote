<?php
/**
 * The Single page of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */

get_header();
?>

<?php title_progress_bar(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="post-header">

			<div class="container">

				<h1 id="post-title"><?php the_title(); ?></h1>

				<div class="post-head-buttons">

					<?php the_edit_button(); ?>

					<div class="btn-counter">
						<div class="btn">
							<i class="fas fa-comment"></i> Comment
						</div>
						<div class="count-box">
							<?php echo esc_html( get_comments_number() ); ?>
						</div>
					</div>

					<?php if ( is_single() && get_post_type() === 'repository' ) : ?>

						<?php $github = get_post_meta( get_the_ID(), 'github_repository', true ); ?>

						<?php

						$github_buttons = array(
							'watch'    => array( 'octicon-eye', '/subscription' ),
							'star'     => array( 'octicon-star', '' ),
							'fork'     => array( 'octicon-repo-forked', '/fork' ),
							'issue'    => array( 'octicon-issue-opened', '/issues' ),
							'download' => array( 'octicon-cloud-download', '/archive/master.zip' ),
						);

						foreach ( $github_buttons as $k => $v ) :
							if ( ! empty( $github[ $k ] ) ) :
							?>
								<div class="github-button-container">
									<a class="github-button" href="<?php echo esc_url( $github['url'] . $v[1] ); ?>" data-icon="<?php echo $v[0]; ?>" data-size="large" data-show-count="true">
										<?php echo ucfirst( $k ); ?>
									</a>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="post-meta">

				<?php

					printf( '<a href="%1$s" title="written %2$s" class="author-link">%3$s</a> <time itemprop="datePublished" datetime="%4$s">%5$s</time>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						sprintf( esc_html__( '%1$s @ %2$s', 'githuber' ),
							esc_html( get_the_date() ), 
							esc_attr( get_the_time() )
						),
						get_the_author(),
						get_the_time( 'c' ),
						sprintf( 
							_x( 'written %s ago', '%s', 'githuber' ),
							human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
						)
					);

				?>

				</div>

			</div>

		</div>

	<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<main role="main">
		<section class="row">
			<div class="col col-sm-8">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>

					<?php the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>

						<?php the_content(); ?>

						<?php the_tags( __( 'Tags: ', 'githuber' ), ', ', '<br>' ); ?>

						<p>
							<?php esc_html_e( 'Categorised in: ', 'githuber' ); ?>
							<?php githuber_category(); ?>
						</p>

						<?php comments_template(); ?>

					</article>

					<?php endwhile; ?>

				<?php else : ?>

					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
					</article>

				<?php endif; ?>

			</div>
			<div class="col col-sm-4">
				<nav id="toc" data-toggle="toc" class="sticky-top toc"></nav>
			</div>
		</section>
	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>

