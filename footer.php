          </div> <!-- .row -->
      </div> <!-- .content-inner -->
  </div> <!-- .conten -->

  <div class="container-fluid footersctn footer-bg clearfix">
      <div class="container">
          <div class="row">
              <div class="footer-content">
                  <div class="col-md-4 align-left">
                      <?php echo stripslashes( get_theme_mod( 'vsblog_left_footer_setting', 'All right reserved.' ) ); ?>
                  </div>
                  
                  <div class="col-md-4">
                      <?php echo stripslashes( get_theme_mod( 'vsblog_center_footer_setting', 'Terms of Use - Privacy Policy' ) ); ?>
                  </div>
                  
                  <div class="col-md-4 align-right">
                      <?php echo stripslashes( get_theme_mod( 'vsblog_right_footer_setting', 'WordPress VSblog theme' ) ); ?>
                  </div>
              </div>
          </div>
          <div class="row">
			<span class="footnote">Copyright © Vladimir Skripachev, 2016. All rights reserved</span>
          </div>
      </div>
  </div>
  <?php wp_footer(); ?>
</body>
</html>