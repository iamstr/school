<?php include("includes/header.php");?>

<body>
  <?php include("includes/sidebar.php");?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("includes/top-nav.php");?>
    <!-- Page content -->
    <div class="container-fluid">
      <button type="button" class="btn btn-block btn-transparent d-none mb-3 text-white notified" data-toggle="modal" data-target="#modal-notification">Notification</button>


      <div class="modal fade shaking-2" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-secondary">

            <div class="modal-header bg-danger ">
              <h6 class="modal-title text-white" id="modal-title-notification">Your attention is required</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">×</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x text-danger shaking"></i>
                <h4 class="heading mt-4">You should read this!</h4>
                <p>The file extension you used is not supported <span class="modal-total font-weight-bolder"></span> </p>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger text-white retry" data-dismiss="modal">Retry Again</button>
              <button type="button" class="btn btn-link text-danger ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    </div>



    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Recieved Money</h3>
            </div>
            <div class="card-body">
              <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Create New Invoice </a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Recieved Amount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-message mx-auto w-75"></div>
                    <form id="recieveForm" action="php_action/createRecieve.php" method="post">
                     
                      <div class="modal-body">

                        <h6 class="heading-small text-muted mb-4">Payment Recieved</h6>
                        <div class="pl-lg-1">

                          <!--                         <div class="row">-->


                          <div class="form-group position-relative">
                            <input type="search" class="form-control form-control-muted search-input" placeholder="Search by Name or ID or Passport Number" id="search" name="girl" />
                            <img src="assets/img/icons/search.svg" alt="search icon" class="search-input position-absolute" style="width: 33px; top: 20%; right: 2%" />
                          </div>

                          <ul class="list-group custom-list-group rounded-3 d-none">

                            <li class="list-group-item d-flex flex-row justify-content-between custom-list-group-item tasks">
                              <span class="maid-name text-muted">Starting typing....</span>
                              <!--<i class="fa fa-trash-alt text-danger tasks-delete pt-1"></i>-->
                            </li>
                          </ul>

                          <!--                         </div>-->

                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group position-relative">
                                <p class="h3 my-4">Amount To Be Paid</p>
                                <input type="number" class="form-control form-control-muted" name="paid" min="1000">
                              </div>


                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1"> Select Payment Type</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="payment">
                                  <option>Cash</option>
                                  <option>Credit</option>
                                  <option>mpesa</option>

                                </select>
                              </div>


                            </div>
                          </div>



                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" id="recieveSubmit">I have Recieved</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="container-fluid mt-6">
      <div class="row">

        <form action="php_action/newUploads" method="post" enctype="multipart/form-data" class="col" id="uploadForm">

          <div class="card steps-form">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Check Reciepts </h3>
                </div>

              </div>
            </div>
            <div class="card-body">
              <p class="h3 my-4">Select Girl Whose Payments you wanna recieve</p>

              <div class="form-group position-relative">
                <input type="search" class="form-control form-control-muted search-input" placeholder="Search by Name or ID or Passport Number" id="search" name="search" />
                <img src="assets/img/icons/search.svg" alt="search icon" class="search-input position-absolute" style="width: 33px; top: 20%; right: 2%" />
              </div>

              <ul class="list-group custom-list-group rounded-3 d-none">

                <li class="list-group-item d-flex flex-row justify-content-between custom-list-group-item tasks">
                  <span class="maid-name text-muted">Starting typing....</span>
                  <!--<i class="fa fa-trash-alt text-danger tasks-delete pt-1"></i>-->
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <div class="">
                <button class="btn btn-primary btn-block w-50 mx-auto btn-lg steps-form-button-next" type="button">
                  <span class="btn-inner--text">Next</span>
                  <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                </button>
              </div>

            </div>
          </div>


          <div class="card steps-form">
            <div class="card-header">


              <h3 class="mb-0 font-weight-normal"><span class="girl-name font-weight-bolder">Girl's</span> Payment Slips </h3>



            </div>



            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="table-agent position-relative">



                    <th scope="col" class="sort " data-sort="GIRL IDNUMBER" data-toggle-table="GIRL NAME">GIRL NAME</th>
                    <th scope="col" class="sort " data-sort="GIRL IDNUMBER" data-toggle-table="GIRL IDNUMBER">GIRL IDNUMBER</th>
                    <th scope="col" class="sort " data-sort="GIRL NAME" data-toggle-table="GIRL NAME">AGENCY</th>
                    <th scope="col" class="sort " data-sort="GIRL PHONE" data-toggle-table="GIRL PHONE"> AMOUNT TO BE PAID</th>
                    <th scope="col" class="sort " data-sort="PASSPORT" data-toggle-table="PASSPORT">BALANCE DUE</th>
                    <th scope="col" class="sort " data-sort="COUNTY" data-toggle-table="COUNTY">PAID AMOUNT</th>
                    <th scope="col" class="sort " data-sort="AGE" data-toggle-table="AGE">PAYMENT TYPE</th>
                    <th scope="col" class="sort " data-sort="KIN NAME" data-toggle-table="KIN NAME">PAYMENT DATE</th>
                    <th scope="col" class="sort " data-sort="KIN PHONE" data-toggle-table="KIN PHONE">RECIEVED BY</th>

                  </tr>
                </thead>
                <tbody class="list">










                </tbody>
              </table>
            </div>

            <div class="card-footer">
              <div class="d-flex justify-content-end">
                <button class="btn btn-icon btn-outline-secondary w-25 btn-lg steps-form-button-back" type="button">
                  <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Back</span>
                </button>
                <button class="btn btn-icon btn-primary w-25 btn-lg  steps-form-button-next" type="button">
                  <span class="btn-inner--text">Next</span>
                  <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                </button>
              </div>
            </div>
          </div>




        </form>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php");?>

  <script>
    $(document).ready(function() {


      let inputElement, notAllowed = false;

      $(".form-control.form-control-muted.search-input").focus();
      $(".list-group.custom-list-group.rounded-3").removeClass("d-none");
      $(".list-group-item span").css({
        height: "100%",
        width: "100%",
        display: "block"
      });
      $("th[scope='col']:nth-child(-n+2)").css({
        cursor: "pointer",
        position: "sticky",
        left: 0,
        top: 0
      });
      $("th .dropdown-menu").css({
        "min-width": "20rem",
        padding: "1rem"
      });
      $(".list-group-item ").css({
        cursor: "pointer"
      });
      $(".list-group-item").removeClass("d-flex");

      //    onkeyup attach the response to span

      $(".form-control.form-control-muted.search-input").keyup(function() {




        $.get("php_action/searchGirl?term=" + $(this).val(), function(data, status) {

          if (status) {

            $(".custom-list-group").html(data)
          }

        });
      });
      $("body ").on("click", ".list-group-item span", function(e) {

        $(this).addClass("text-muted");

        //      this is the clicked item text
        const listText = $(this).text().trim();
        const ID = $(this).attr("id").trim();

        //      checks if the selected text is part of the selected label 
        const returned = [...$(".selected  .str-toggle-button")].some(e =>

          {
            let buttonText = e.children[0].innerText.replace(/\s/g, "").replace(/([A-Z])/g, ' $1').trim();


            return buttonText === listText

          }

        );




        if (!returned) {

          const button = document.createElement("div"),
            radio = document.createElement("input"),
            label = document.createElement("label")


          $(button).addClass("btn-group-toggle m-1 str-toggle-button")
          $(label).addClass("btn btn-outline-secondary active")
          $(button).attr("data-toggle", "buttons")
          $(radio).attr("checked", "buttons")
          $(radio).attr("autocomplete", "off")
          $(radio).attr("type", "checkbox")
          $(radio).attr("value", ID)
          $(radio).attr("name", "girls[]")
          $(label).attr("data-ID", ID)
          label.innerText = listText
          label.appendChild(radio)
          button.appendChild(label)
          $("#search").val(ID)

          $(".selected ").append(button)
          $(".girl-name ").text(listText)



          $.get("php_action/fetchReport.php?girl=" + $("#search").val(), function(data) {


            $("tbody.list").html(data)
          })

        }

        //disabled after onclick

        $(this).parent().css({
          cursor: "no-drop",
          "pointer-events": "none"
        });
        $(this).css({
          cursor: "no-drop",
          "pointer-events": "none"
        });
        $(".list-group.custom-list-group.rounded-3").addClass("d-none");
      });

      //    onfocus show the HTMLUListElement
      $(".form-control.form-control-muted.search-input").focus(function() {
        $(".list-group.custom-list-group.rounded-3").removeClass("d-none");
      });






      const stepForm = $(".steps-form")





      for (step of $(".steps-form")) {

        step.style.display = "none";
      }

      $(".steps-form")[0].style.display = "flex";




      const stepNext = $(".steps-form-button-next"),
        stepBack = $(".steps-form-button-back")


      stepNext.click(function(e) {

        if (e.currentTarget.classList.contains("btn")) {



          const buttonParent = e.currentTarget.parentNode,
            footer = buttonParent.parentNode,
            parent = footer.parentNode,
            container = parent.children[1],
            index = $(".steps-form").index(parent)

          //   parent.toggleClass("animate");
          console.log(stepForm.length, index, container)
          if ((index + 1) < stepForm.length && index >= 0) {
            stepForm[index + 1].children[1].classList.add("slideLeft")
            parent.children[1].classList.remove("slideLeft")
            stepForm[index + 1].style.display = "flex"

            parent.style.display = "none";



          } else {

            console.log(parent, footer, buttonParent)
          }
        }


      })
      stepBack.click(function(e) {
        if (e.currentTarget.classList.contains("btn")) {
          const buttonParent = e.currentTarget.parentNode,
            footer = buttonParent.parentNode,
            container = footer.nextSibling,
            parent = footer.parentNode,
            //                      container=parent.children[1],      
            index = $(".steps-form").index(parent)
          console.log(stepForm.length, index, parent)

          if ((index - 1) > -1) {

            stepForm[index - 1].style.display = "flex"
            parent.style.display = "none";
            stepForm[index - 1].children[1].classList.add("slideRight")
            parent.children[1].classList.remove("slideLeft")
            //                        parent.classList.add("slideLeft")
            //                        stepForm[index+1].classList.add("slideRight")
            //                        parent.classList.remove("slideLeft","slideRight")

          }

        }

      })



      //      ajax call




      $("#recieveSubmit").unbind('click').bind('click', function(e) {
        //        e.preventDefault()
        console.log("pressed")
        //
        $("#recieveForm").unbind('submit').bind('submit', function(e) {
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
                $('#modalButton').click()
                // shows a successful message after operation
                $('.modal-message').append('<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="ni ni-like-2"></i></strong> ' + response.messages +
                  '</div>');

                // remove the mesages
                $(".alert-success").delay(1000).show(10, function() {
                  $(this).delay(3000).hide(10, function() {
                    $(this).remove();
                    $('[data-dismiss="modal"]').click()
                  });
                }); // /.alert


              } // /if response.success
              else {




                $("html, body, div.modal, .modal-content, div.modal-body").animate({
                  scrollTop: '0'
                }, 100);
                $('#modalButton').click()
                // shows a successful message after operation
                $('.modal-message').append('<div class="alert alert-warning shaking-2">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="ni ni-like-2"></i></strong> ' + response.messages +
                  '</div>');

                // remove the mesages
                $(".alert-warning").delay(500).show(10, function() {
                  $(this).delay(5000).hide(10, function() {
                    $(this).remove();
                    $('[data-dismiss="modal"]').click()
                  });
                }); // /.alert






              }

            } // /success function
          }); // /ajax function

          return false;

        })

      })



    })

  </script>
</body>
