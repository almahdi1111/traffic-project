<?php
require("header.php");
?>
<header>
        <h2 class="text-center">الرصد</h2>
    </header>
    <div class="container-fluid" style="margin-bottom: 50px;">
        <div class="card" id="TableSorterCard" style="border-style: none;border-radius: 6.5px;text-align: center;">
            <div class="card-header py-3" style="border-width: 0px;background: rgb(23,25,33);">
                <p class="d-inline" style="color: rgb(255,255,255);">&nbsp; &nbsp; &nbsp;من:&nbsp;</p><input
                    type="date">
                <p class="d-inline" style="color: rgb(255,255,255);">&nbsp; &nbsp; &nbsp;الى:</p><input type="date">
                <div class="float-start float-md-end mt-5 mt-md-0 search-area"><i
                        class="fas fa-search float-start search-icon"></i><input
                        class="float-start float-sm-end custom-search-input" type="search"
                        placeholder="اكتب رقم اللوحة للبحث" style="color: rgb(255,255,255);"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive" style="border-top-style: none;">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark"
                                style="background: rgb(33,37,48);border-width: 0px;border-color: rgb(0,0,0);border-bottom-color: #21252F;">
                                <tr style="border-style: none;border-color: rgba(255,255,255,0);background: #21252f;">
                                    <th >رقم اللوحة</th>
                                    <th >المخالفة</th>
                                    <th >نوع اللوحة</th>
                                    <th>موقع الرصد</th>
                                    <th>المحافظة حسب اللوحة</th>
                                    <th>زمن الرصد</th>
                                    <th>عرض</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="border-top-width: 0px;">
                            <?php 
                            
                            displayfromTable::displaymonitoring(); 

                           ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once("footer.php");
?>