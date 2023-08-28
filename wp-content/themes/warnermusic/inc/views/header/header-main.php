<div class="header-main">
   <div class="col-logo col-left">
      <!-- logo -->
      <div class="custom-logo-link">
         <?php if ( has_custom_logo()):?>
            <div class="site-logo">
               <a class="logo-link-home" href="<?= get_home_url() ?>">
                  <?= wp_get_attachment_image(get_theme_mod( 'custom_logo' ), 'full', false);?>
               </a>
            </div>
         <?php else:?>
            <a class="link-home-title" href="<?= get_home_url();?>">
               <?= get_bloginfo();?>
            </a>
         <?php endif;?>
      </div>
   </div>
   <div class="col-right">
      <div class="group-content hiden-on-mobile">
         <div class="group-social-network-desktop">
            <?php get_template_part( '/inc/views/header/header-social' ); ?>
         </div>
         <div class="group-navigation-desktop">
            <?php get_template_part( '/inc/views/header/header-nav' ); ?>
         </div>
      </div>
      <!-- Button Hamburger -->
      <div class="btn-hamburger show-on-mobile">
            <span></span>
            <span></span>
            <span></span>
      </div>
   </div>
</div>


