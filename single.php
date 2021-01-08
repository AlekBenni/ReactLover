<?php
get_header(); ?>


<div class="container">
    <div class="row">
        <?php while (have_posts()): the_post(); ?>

        <div class="col-md-9">
        <div class="card mb-3 pt-3">
            <div class="card-header">
                <h3 class="card-title"><?php the_title(); ?></h3>
            </div>      
            <div class="card-body">               
                <p class="card-text"><?php the_content(' '); ?></p>
            </div>
        </div>
        </div>

        <?php endwhile; ?>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer() ?>

<?php
get_footer();




