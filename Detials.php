<?php

require("header.php");

?>
    <header >
        <h1 class="text-center">المخالفات&nbsp;</h1>
    </header>
    <div class="container-fluid" style="margin-bottom: 50px;">
               <div class="card" id="TableSorterCard" style="border-style: none;border-radius: 6.5px;text-align: center;">
            <div class="card-header py-3" style="border-width: 0px;background: rgb(23,25,33);">
                <p class="d-inline" style="color: rgb(255,255,255);">&nbsp; &nbsp; &nbsp;من:&nbsp;</p><input id="StartDate"  type="date" onchange="setdate('Detials.php')">
                <p class="d-inline" style="color: rgb(255,255,255);">&nbsp; &nbsp; &nbsp;الى:</p><input id="EndDate" type="date" onchange="paging(0,'Detials.php')">
                <div class="float-start float-md-end mt-5 mt-md-0 search-area"><i
                        class="fas fa-search float-start search-icon"></i>
                        <input id="PlateNumber"
                        class="float-start float-sm-end custom-search-input" type="search"
                        placeholder="اكتب رقم اللوحة للبحث" style="color: rgb(255,255,255);" onkeyup="paging(0,'Detials.php')"></div>
            </div>
            <div class="row">
                <div id="tableDisplay" class="col-12">
                    
                </div>
            </div>
        </div>
    </div>
    
<?php
require("footer.php");
 ?>
   