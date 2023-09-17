<?php
/**
 * Template name: Default Page (Warnermusic)
 */

get_header();
?>
<div id="site-default-page" class="site-default-page padding-page">
    <div class="container">
        <?php the_title( '<h1 class="main-title">', '</h1>' );?>
        <div class="separator-left-warner"></div>
        <div class="content"><?php the_content();?></div>
    </div>
</div>
<?php get_footer();