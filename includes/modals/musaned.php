  <?php 

                if(isset($_GET['musaned'])):

                  $edit=$_GET['musaned'];
 $_SESSION['girl']=  $edit;


?>
              
              <script>
                $(document).ready(function($){
$("#musanedModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>
             

              
               
                 <div class="modal fade" id="musanedModal" tabindex="-1" role="dialog" aria-labelledby="musanedModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Modal title
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="php_action/<?php echo $edit?"editMusaned.php":"createMusaned.php"?>" method="post" id="musanedForm">
                    <!--                  <form action=""  id="#musanedForm">-->
                    <div class="modal-body">

                      <div class="selection-modal d-flex flex-wrap mb-3"></div>
                      <div class="medical d-flex justify-content-between my-5">
                        <label for="">Musaned Status </label>

                        <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" value="collected" name="status" id="status1" autocomplete="off" checked />
                            Available
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="pending" name="status" id="status2" autocomplete="off" />
                            Contracted
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="pending" name="status" id="status3" autocomplete="off" />
                            Employed
                          </label>
                        </div>
                      </div>
                      <div class="medical d-flex justify-content-between my-5">
                        <label for="">Saudi Agency </label>

                        <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" value="1" name="agency" id="agency1" autocomplete="off" checked />
                            Agency 1
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="2" name="agency" id="agency2" autocomplete="off" />
                            Agency 2
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="3" name="agency" id="agency3" autocomplete="off" />
                            Agency 3
                          </label>
                        </div>
                      </div>


                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Sponsor Name</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="name">

                      </div>

                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Sponsor Number</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="number">

                      </div>

                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Sponsor ID Number</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="ID">

                      </div>



                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Sponsor Address</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="address">

                      </div>



                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Contract Number</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="contract_number">

                      </div>
                      <div class="medical d-flex justify-content-between my-5 align-items-center">
                        <label for=""> Visa Number</label>




                        <input class="form-control w-50 " placeholder="E2145000" type="text" name="visa_number">

                      </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-primary" id="musanedSubmit">
                        Save changes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>






<script>
  
    $("#musanedSubmit").unbind('click').bind('click', function() {


      $("#musanedForm").unbind('submit').bind('submit', function(e) {
                          e.preventDefault();
        var form = $(this);
        var formData = new FormData(this);
        console.log(formData)
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: formData,
          dataType: 'json',
          //					cache: false,
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