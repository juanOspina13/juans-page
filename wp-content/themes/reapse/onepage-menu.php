     <!-- menu items -->
      <div class='tabs-main' >
      
        <ul class='tabs' >
          
          <?php
            $defaults = array(
              'theme_location'  => 'onepage_menu',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'menu_class'      => '',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '%3$s',
              'depth'           => 0,
              'walker'          => new reapse_description_walker,
                );

              if(has_nav_menu('onepage_menu')) {
                  wp_nav_menu( $defaults );
                }              
              else {
                  echo ' ';
                  } ?>
          
        </ul>
      </div>
    