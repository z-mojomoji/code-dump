<?php
    $pagename = 'contact';
    $bgimg = 'contactbg.jpg';
    include 'head.php';
    include 'title.php';
?>
<section id="contact-info">
        <div class="container">
          <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
              <div class="text-center col-sm-8 col-sm-offset-2">
                <h2>Contact Information</h2>
              </div>
            </div> 
          </div>

          <div class="content wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
              
                <div class="col-md-6 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="450ms">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.594971193084!2d144.99201331575873!3d-37.82295497975071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642ed558f113f%3A0xad86de137e02cfda!2s20%2F16-20+Carroll+St%2C+Richmond+VIC+3121%2C+Australia!5e0!3m2!1sen!2sth!4v1463114771462" frameborder="0" style="border:0" allowfullscreen class="col-xs-12" height="380"></iframe>
                </div>
                
                <div class="col-md-6 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1050ms">
                    <div class="row clearfix">
                        <div class="col-md-6 col-xs-12">
                            <h3 class="subtitle2">Address</h3>
                            <p>
                                <strong>Mozzo</strong>
                                20/16-20 Carroll Street <br>
                                Richmond VIC 3121<br>
                                Australia
                            </p>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <h3 class="subtitle2">Telephone</h3>
                            <p>
                                <strong>
                                    xxx-xxxx
                                </strong>
                                
                            </p>
                        </div>
                    </div>
                    
                    <div class="row clearfix col-xs-12">
                            <h3 class="subtitle2">E-mail</h3>
                            
                           <div class="col-md-6 col-xs-12" id="email">
                                <p>
                                    <strong>General Inquiries</strong>
                                    <a href="#">
                                        info@mozzo.com.au
                                    </a>
                                </p>

                                <p>
                                    <strong>Sales & Partnership Inquiries</strong>
                                    <a href="#">
                                        sales@mozzo.com.au
                                    </a>
                                </p>
                            </div>
                            
                            <div class="col-md-6 col-xs-12" id="support">
                                <p>
                                    <strong>Support</strong>
                                    <a href="#">
                                        support@mozzo.com.au
                                    </a>
                                </p>
                            </div>
                        </div>
                        
                </div>
            </div> 
          </div>

        </div>
    
</section>

<section id="contact-form">
    <div class="container">
          <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
            <div class="row">
              <div class="text-center col-sm-8 col-sm-offset-2">
                <h2>Contact Information</h2>
              </div>
            </div> 
          </div>

          <div class="content wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
           <form class="clearfix" id="contactForm">
                <fieldset class="form-group clearfix">
                   <div class="input">
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="input">
                        <input type="text" class="form-control " id="lastName" placeholder="Last Name">
                    </div>
                  </fieldset>
                  
                  <fieldset class="form-group clearfix">
                   <div class="input">
                        <input type="email" class="form-control" id="email" placeholder="E-Mail">
                    </div>
                    <div class="input">
                        <input type="text" class="form-control " id="phone" placeholder="Phone Number">
                    </div>
                  </fieldset>
                  <fieldset class="form-group clearfix textarea">
                  <textarea class="form-control " id="message" name="message" rows="5" placeholder="Your Message"></textarea>
               </fieldset>
               <button type="submit" class="btn btn-submit">Submit</button>
            </form>
            </div>
    </div>
    
</section>

<?php
    include 'foot.php';
?>