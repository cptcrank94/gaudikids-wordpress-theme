<?php
    get_header();
?>
<div class="pageHead d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <h2><?php echo get_the_title(); ?></h2>
        </div>
    </div>
    <div class="background"></div>
</div>
<section class="pageContent">
    <div class="container">
        <div class="row">
            <?php
            if( have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    the_content(); 
                }
            }
            ?>
        </div>
    </div>
</section>
<?php
    get_footer();
?>