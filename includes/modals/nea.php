  
              <?php 

                if(isset($_GET['nea'])):

                  $edit=$_GET['nea'];
                   $_SESSION['girl']=  $edit;


?>
              
              <script>
                $(document).ready(function($){
$("#neaModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>
            
             
              
                <!-- Modal -->
            <div class="modal fade" id="neaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      NEA MODULE
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="php_action/<?php echo $edit?"editNea.php":"createNea.php"?>"  method="post" id="neaForm">
                    <div class="modal-body">

                      <div class="selection-modal d-flex flex-wrap mb-3"></div>

                      <div class="medical d-flex justify-content-between my-5">
                        <label for=""> NEA Status</label>

                        <div class="btn-group btn-group-toggle mr-4 pr-4" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" value="sent" name="status" id="status" autocomplete="off" checked />
                            SENT
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="pending" name="status" id="status" autocomplete="off" />
                            PENDING APPROVAL
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" value="approved" name="status" id="status" autocomplete="off" />
                            APPROVED
                          </label>
                        </div>
                      </div>






                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-primary" id="neaSubmit">
                        Save changes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
