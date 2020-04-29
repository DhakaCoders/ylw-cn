<footer class="footer-wrp">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="ftr-col-main clearfix">
          <div class="ftr-col ftr-col-1">
            <div class="ftr-logo">
              <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png" alt=""></a>
            </div>
          </div>
          <div class="ftr-col ftr-col-2"> 
            <h6><span>About Us</span></h6>
            <ul class="ulc">
              <li><a href="#">Who are we?</a></li>
              <li><a href="#">Lookbook</a></li>
              <li><a href="#">Terms and Conditions</a></li>
              <li><a href="#">Our Stores</a></li>
              <li><a href="#">Press Room</a></li>
              <li><a href="#">Showrooms</a></li>
            </ul>
          </div>
          <div class="ftr-col ftr-col-3">
            <h6><span>Services</span></h6>
            <ul class="ulc reset-list">
              <li><a href="#">Customer Help</a></li>
              <li><a href="#">Size Guide</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Shipping & Handling</a></li>
              <li><a href="#">Online Returns</a></li>
              <li><a href="#">My Account</a></li>
            </ul>              
          </div>
          <div class="ftr-col ftr-col-4">
            <h6><span>May We Help?</span></h6>
            <ul class="ulc reset-list">
              <li><a href="mailto:customerservice@yell-oh.com">customerservice@yell-oh.com</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="tel:+30 210 89 47 420">+30 210 89 47 420</a></li>
            </ul> 
            <div class="ftr-socail-icon">
              <h6>FOLLOW</h6>
              <ul class="ulc clearfix">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
              </ul>
            </div>             
          </div>
          <div class="ftr-col ftr-col-5">
            <h6 class="ftr-title"><span>Newsletter</span></h6>
            <span>Sign up to get the latest on new <br> releases and more.</span>  
            <a id="quickViewOpener" href="#" data-toggle="modal" data-target="#quickViewModal">Get Emailed Insider Exclusives</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade ylw-modal-con-wrap" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-content">
          <div class="modal-login-form">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span><img src="<?php echo THEME_URI; ?>/assets/images/modal-close-icon.png"></span>
            </button>
            <h3 class="modal-login-form-title">Sign Up to our newsletter</h3>
            <span>& get our latest special offers</span>
            <div class="login-form">
              <form>
                <div class="ylw-input-field-row">
                  <input type="text" name="" placeholder="Your Name">
                </div>
                <div class="ylw-input-field-row">
                  <input type="email" name="" placeholder="Your Email">
                </div>
                <div class="ylw-submit-btn">
                  <input type="submit" value="SUBSCRIBE">
                </div>
                <div class="ylw-modal-logo">
                  <a href="#">
                    <img src="<?php echo THEME_URI; ?>/assets/images/ylw-modal-logo.png">
                  </a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<?php wp_footer(); ?>
</body>
</html>