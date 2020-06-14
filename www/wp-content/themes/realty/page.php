<?php get_header(); ?>
      <div id="content">
        <section class="content-block gray">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
              	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="breadcrumbs"><a href="/">Херсон-центр</a> / <?php the_title(); ?></div>
                <h3 class="page-title"><?php the_title(); ?></h3>                
				<div class="page-content"><?php the_content(); ?></div>
				<?php endwhile; ?>
				<?php endif; ?>
              </div>
            </div>
          </div>
        </section>        
      </div>
<?php get_footer(); ?>