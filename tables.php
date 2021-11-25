<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php include("includes/header.php");?>

<body>
  <?php include("includes/sidebar.php");?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("includes/top-nav.php");?>
    <!-- Page content -->
    <div class="container-fluid mt-5">
      <div class="card p-4">
        <p class="mb-5 pb-2">
          <button class="btn btn-icon btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <span class="btn-inner--icon"><i class="ni ni-ui-04"></i></span>
            <span class="btn-inner--text">Filter</span>
          </button>
        </p>
        
        
        <div class="collapse show" id="collapseExample">
        
 
        
         <p class="mb-5 pb-2">
          <button class="btn btn-icon btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseView" aria-expanded="false" aria-controls="collapseView">
            <span class="btn-inner--icon"><i class="ni ni-ui-04"></i></span>
            <span class="btn-inner--text">Show Columns</span>
          </button>
        </p>
         
        <div class="collapse" id="collapseView">
          <div class="card-body str-view">
            <h3 class="str-view-header text-muted">Change View</h3>
          
            <?php //include("includes/modals/school.php");?>

            <div class="str-view-row d-flex flex-wrap">

              <?php require_once("php_action/fetchColumnNames.php");?>
              
            </div>
          </div>
        </div>
        
        
        
        
        
        
                <p class="mb-5 pb-2">
          <button class="btn btn-icon btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
            <span class="btn-inner--icon"><i class="ni ni-ui-04"></i></span>
            <span class="btn-inner--text">Show Search</span>
          </button>
        </p>
        
        <div class="collapse show" id="collapseSearch">
          <div class="card-body str-view">
            <h3 class="str-view-header text-muted">Search Girls</h3>
          
           
            <div class="str-view-row d-flex flex-column flex-wrap">

             <div class="form-group position-relative">
              <input type="search" class="form-control form-control-muted search-input" placeholder="Search by Name or ID or Passport Number">
              <img src="assets/img/icons/search.svg" alt="search icon" class="search-input position-absolute" style="width: 33px; top: 20%; right: 2%">
            </div>
              
              
<!--
              <ul class="list-group custom-list-group rounded-3">
              <li class="list-group-item flex-row justify-content-between custom-list-group-item tasks" style="cursor: pointer;">
                <span class="maid-name text-muted" style="height: 100%; width: 100%; display: block;">Start Typing...</span>
                <i class="fa fa-trash-alt text-danger tasks-delete pt-1"></i>
              </li>
            
            </ul>
-->
              
            </div>
          </div>
        </div>
        
        
        
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Girls table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="table-agent position-relative">
                    <!--
                    <th scope="col" class="sort" data-sort="name">Fullname</th>
                   
-->
                    <th scope="col" class="position-sticky">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                 
                 <?php require_once("php_action/fetchGirls.php");?>

                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4 d-none">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
        <?php include("includes/modals/girl.php");?>
      <!-- Footer -->
      <?php include("includes/footer.php");?>
      
      <script>
        $(document).ready(function(e) {
          const row = $(".table-agent");

          const selectColumnActive = $(".btn.btn-outline-str-secondary.active"),
            selectColumn = $(".btn.btn-outline-str-secondary");

          selectColumn.each(function() {
            let th = document.createElement("th"),
              text = $(this).text().trim();

            th.setAttribute("scope", "col");
            th.setAttribute("class", "sort ");
            th.setAttribute("data-sort", $(this).text().trim());
            th.setAttribute("data-toggle-table", $(this).text().trim());
            th.innerText = text.replace(/\s\s+/g, " ");

            // row.append(th);
            $(th).insertBefore("th:last-child");
          });
          selectColumn.click(function(e) {
            // console.log(
            //   $(`[data-toggle-table='${$(this).text().trim()}']`).index()
            // );
            const INDEX = $(
              `[data-toggle-table='${$(this).text().trim()}']`
            ).index();

            if ($(this).hasClass("active")) {
              $(`[data-toggle-table='${$(this).text().trim()}']`).hide();
              $(".table-agent-row").each(function() {
                // console.log();
                $(this).children().eq(INDEX).hide();
              });
            } else {
              $(`[data-toggle-table='${$(this).text().trim()}']`).show();
              $(".table-agent-row").each(function() {
                // console.log();
                $(this).children().eq(INDEX).show();
              });
            }
          });
          
          
          
          
    $(".form-control.form-control-muted.search-input").focus();
    $(".list-group.custom-list-group.rounded-3").removeClass("d-none");
    $(".list-group-item span").css({
      height: "100%",
      width: "100%",
      display: "block"
    });
   
    $(".list-group-item ").css({
      cursor: "pointer"
    });
    $(".list-group-item").removeClass("d-flex");

    //    onkeyup attach the response to span

    $(".form-control.form-control-muted.search-input").keyup(function() {




      $.get("php_action/searchGirlTable?term=" + $(this).val(), function(data, status) {

        if (status) {

          $(".list").html(data)
            selectColumn.each(function() {
            let th = document.createElement("th"),
              text = $(this).text().trim();

            th.setAttribute("scope", "col");
            th.setAttribute("class", "sort ");
            th.setAttribute("data-sort", $(this).text().trim());
            th.setAttribute("data-toggle-table", $(this).text().trim());
            th.innerText = text.replace(/\s\s+/g, " ");

            // row.append(th);
            $(th).insertBefore("th:last-child");
          });
        }
        
      });
    });
    $("body ").on("click", ".list-group-item span", function(e) {

      $(this).addClass("text-muted");

      //      this is the clicked item text
      const listText = $(this).text().trim();
      const ID = $(this).attr("id").trim();
      $(".selection-button.fade").addClass("show")
      //      checks if the selected text is part of the selected label 
      $(".search-input").val(ID)
      const returned = [...$(".selected  .str-toggle-button")].some(e =>

        {
          let buttonText = e.children[0].innerText.replace(/\s/g, "").replace(/([A-Z])/g, ' $1').trim();


          return buttonText === listText

        }

      );




      if (!returned) {
        //creates a clone from the first toggle button in the selected div
        //        const button = $(".selected  .str-toggle-button:first-child").clone()
        //        HTMLButtonElement>HTMLLabelElement>HTMLInputElement[radio]
        //        button.children()[0].children[0].checked
        //        button.children()[0].children[0].value = listText
        //        button.children()[0].innerText = listText
        //        button.clone().appendTo(".selected ")
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


        $(".selected ").append(button)
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


          
          
          
          
          
          
          
          
        });

      </script>
    </div>
  </div>
</body>
