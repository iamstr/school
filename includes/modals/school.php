
             <?php 

                if(isset($_GET['school'])):

                  $edit=$_GET['school'];
                  $_SESSION['girl']=  $edit;



?>
              
              <script>
                $(document).ready(function($){
$("#schoolModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>

               
                 
                     <div class="modal fade  " id="schoolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      School Module
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                                    <form action="php_action/<?php echo $edit?"editSchool.php":"createSchool.php"?>" id="schoolForm" method="post">
                  

                    <div class="modal-body">
                      <div class="selection-modal d-flex flex-wrap mb-3"></div>


                      <div class="medical d-flex justify-content-between my-5">
                        <label for=""> School Name</label>

                        <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" value="1" name="name" id="name" autocomplete="off" checked />
                            ARGON SCHOOL
                          </label>
                          <!--
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="cof" id="cof2" autocomplete="off" />
                          PENDING
                        </label>
-->
                        </div>
                      </div>


                      <div class="input-daterange datepicker">

                        <div class="medical d-flex justify-content-between my-5">

                          <label for="">School Start Date</label>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                              </div>
                              <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="start">
                            </div>
                          </div>
                        </div>

                        <div class="medical d-flex justify-content-between my-5">

                          <label for="">School End Date</label>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                              </div>
                              <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="end">
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="medical d-flex justify-content-between my-5">
                        <label for=""> School Certificate</label>

                        <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" value="pending" name="school" id="school" autocomplete="off" checked />
                            PENDING
                          </label>

                          <label class="btn btn-secondary">
                            <input type="radio" value="ready" name="school" id="school2" autocomplete="off" />
                            READY
                          </label>

                        </div>
                      </div>



                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" id="schoolSubmit" class="btn btn-primary">
                        Save changes
                      </button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
<script>

    $("#schoolSubmit").unbind('click').bind('click', function() {


      $("#schoolForm").unbind('submit').bind('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(this);
        console.log(formData)
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            console.log(response)
            if (response.success == true) {


              $("html, body, div.modal, .modal-content, div.modal-body").animate({
                scrollTop: '0'
              }, 100);
              $('.modal-body div').hide()
              // shows a successful message after operation
              $('.modal-body').append('<div class="alert alert-success">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="ni ni-like-2"></i></strong> ' + response.messages +
                '</div>');

              // remove the mesages
              $(".alert-success").delay(1000).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                  $('.modal-body div').show()
                });
              }); // /.alert


            } // /if response.success
            else {




              $("html, body, div.modal, .modal-content, div.modal-body").animate({
                scrollTop: '0'
              }, 100);
              $('.modal-body div').hide()
              // shows a successful message after operation
              $('.modal-body').append('<div class="alert alert-warning shaking-2">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="ni ni-like-2"></i></strong> ' + response.messages +
                '</div>');

              // remove the mesages
              $(".alert-warning").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                  $('.modal-body div').show()
                });
              }); // /.alert






            }

          } // /success function
        }); // /ajax function

        return false;

      })

    })

</script>