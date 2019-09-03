<div class="circle_wrapper"><div class="circle small one"></div></div>
<div class="circle_wrapper"><div class="circle medium two"></div></div>
<div class="circle_wrapper"><div class="circle large three"></div></div>
<div class="circle_wrapper"><div class="circle large2 four"></div></div>
    </div>
        <footer id="footer">
            <div class="wrapper">
                <div class="fwidget one floatLeft full"><?php dynamic_sidebar( 'footer-column-one' ); ?></div>
                <div class="fwidget two floatLeft fifty"><?php dynamic_sidebar( 'footer-column-two' ); ?></div>
                <div class="fwidget three floatLeft fifty"><?php dynamic_sidebar( 'footer-column-three' ); ?></div>
                <div class="clearBoth"></div>
            </div>
        </footer>
        <div id="copyright">
            <div class="copyright textCenter">
                &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>.
                Website Built by <a href="https://www.brandcandy.co.za/" target="_blank">Brand Candy</a>
            </div>
        </div>
    </div><!-- Site Wrap-->
        <?php wp_footer(); ?>
    </body>
</html>