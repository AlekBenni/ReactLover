
<?php get_header() ?>


<div class="container">
    <div class="row">

        <div class="col md-9">
            <div class="row">
                <?php if(have_posts()): while (have_posts()): the_post(); ?>

                <div class="col-md-12">

                    <div class="card mb-3" >
                    <div class="card-header">
                        <h3 class="card-title"><?php the_title(); ?></h3>
                    </div>           
                    <div class="card-body">
                        <?php the_post_thumbnail('my-thumb', array('class' => 'float-left mr-3')) ?> 
                        <p class="card-text"><?php the_content(' '); ?></p>
                        <a href="<?php the_permalink() ?>" class="btn btn-danger">Читайте статью</a>
                    </div>
                    </div>
                </div>

                <?php endwhile; ?>

                <?php else: ?>
                    <p>Dont have a posts</p>
                <?php endif; ?>
            </div>
        </div>

        <?php get_sidebar(); ?>
        
    </div>
    <div class="row">
        <div class="pag_wrapper">
            <?php the_posts_pagination(array(
                'show_all'     => false, // показаны все страницы участвующие в пагинации
                'end_size'     => 2,     // количество страниц на концах
                'mid_size'     => 2,     // количество страниц вокруг текущей
                'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'    => __('« Previous'),
                'type'         => 'list', 
                'screen_reader_text' => __( ' ' ),
            )) ?>
        </div>
    </div>
</div>
<?php get_footer() ?>
