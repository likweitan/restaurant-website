<section id="book-a-table" class="book-a-table">
  <div class="container">

    <div class="section-title">
      <h2>Booking<span>Form</span></h2>
      <p></p>
    </div>
    <?php require_once 'config.php'; ?>
    <form action="config.php" method="POST" role="form" class="php-email-form">
      <div class="row">
        <div class="col-sm-4 col-md-6 form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>
        </div>
       
        <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0">
          <input type="text" class="form-control" name="contact" id="phone" placeholder="Your Contact Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>
        </div>

      <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='date' class="form-control" name="date_input" id="date_input" placeholder="Date">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>

                <input type='time' min="10:00:00" max="22:00:00"class="form-control" name="time_input" id="time_input" placeholder="Time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    
        
          <!-- - <script type="text/javascript">
           $(function () {
             $('#datetimepicker1').datetimepicker({
                  minDate:new Date()
              });
           });
         </script> -->
     </div>
     
        <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0 ">   
         <div class="form-group" "select-dropdown">			
            <select type='people ' class="form-control" name="num_people" id="num_people" placeholder="Amount of People">
                 <option disabled="disabled" selected="selected">Amount of People</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
             </select>
            </div>
        </div>
     
      <div class="mb-3">
        <div class="loading">Loading</div>
        <div class="error-message">There is an error</div>
        <div class="sent-message">Your booking request was sent.Please check the status page to confirm your reservation. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit" name="savecont">Send Message</button></div>
    </form>
  </div>
</section><!-- End Book A Table Section -->