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
                        placeholder="اكتب رقم اللوحة للبحث" style="color: rgb(255,255,255);" onkeyup="GetViolationData(this.value)"></div>
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
                         </tbody>
                            
                        </table>
                    
                        <ul class="pagination" >
                        <?php 
                        $pageName=substr($_SERVER["SCRIPT_NAME"],9);

                        $pageCount=pagination::RowsCount("violation")/pagination::$RowsCountPerPage;
                        for($i=0;$i<$pageCount;$i++)
                        {
                            echo"<li class='page-item' onclick=\"paging($i,'$pageName')\"><a class='page-link'>".($i+1)."</a></li>";
                        }

                        ?>
                       </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
require("footer.php");
 ?>
   