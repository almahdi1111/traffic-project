<?php
use LDAP\Result;
require("header.php");

?>
    <header>
        <h1 class="text-center">المخالفات&nbsp;</h1>
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
                        placeholder="اكتب رقم اللوحة للبحث" style="color: rgb(255,255,255);" onkeyup="showCustomer(this.value)"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive" style="background: var(--bs-white);">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                <th>م</th>
                                <th>رقم اللوحة</th>
                                    <th>
                                        <select class="border rounded-pill form-select-sm">
                                            <option value="" selected="" disabled>نوع المخالفة</option>
                                            <?php
                                            $results=DatabaseOpreation::select("typeviolation");
                                            foreach($results as $result)
                                                {
                                                    echo "<option value=".$result["Id"].">".$result["Type"]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </th>
                                    <th class="text-center"><select class="border rounded-pill form-select-sm">
                                            <option value="" selected="" disabled>نوع اللوحة</option>
                                            <?php
                                            $results=DatabaseOpreation::select("plate");
                                            foreach($results as $result)
                                                {
                                                    echo "<option value=".$result["Id"].">".$result["TypePlate"]."</option>";
                                                }
                                            ?>

                                        </select></th>
                                    <th><select class="border rounded-pill form-select-sm">
                                            <option value="" selected="" disabled>موقع المخالفة</option>
                                            <?php
                                            $results=DatabaseOpreation::select("location");
                                            foreach($results as $result)
                                                {
                                                    echo "<option value=".$result["Id"].">".$result["Address"]."</option>";
                                                }
                                            ?>
                                        </select></th>
                                    <th><select class="border rounded-pill form-select-sm">
                                            <option value="" selected="" disabled>المحافظة حسب اللوحة</option>
                                            <?php
                                            $results=DatabaseOpreation::select("provinces");
                                            foreach($results as $result)
                                                {
                                                    echo "<option value=".$result["Id"].">".$result["Name"]."</option>";
                                                }
                                            ?>
                                        </select></th>
                                    <th>زمن الرصد</th>
                                    <th>عرض</th>
                                </tr>
                            </thead>
                            <tbody id="DataTable">

                           <?php 
                          // displayfromTable::displayviolation(); 
                         // echo count(DatabaseOpreation::select("monitoring"));

                           ?>
                            </tbody>
                            
                        </table>
                    
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
require("footer.php");
 ?>
   