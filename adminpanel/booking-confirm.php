<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
//Get current page.
$page = filter_input(INPUT_GET, 'page');
//Per page limit for pagination.
$pagelimit = 20;
if (!$page) {
    $page = 1;
}
// If filter types are not selected we show latest added data first
    $filter_col = "b_id";
    $order_by = "Desc";

// select the columns
$select = array('b_id', 'b_name', 'b_phno', 'b_mail', 'b_price', 'b_total','b_child','b_adults','b_status','b_pnr');

//Start building query according to input parameters.
// If search string
if ($search_string) 
{
    $db->where('b_name', '%' . $search_string . '%', 'like');
    $db->orwhere('b_mail', '%' . $search_string . '%', 'like');
	$db->orwhere('b_pnr', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}
$db->where('b_status', 'Booked');
//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$customers = $db->arraybuilder()->paginate("booking_details", $page, $select);
$total_pages = $db->totalPages;

// get columns for order filter
foreach ($customers as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
}
include_once 'includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Booking Detail</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <!--<a href="add_customer.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
	            </a>-->
            </div>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo $search_string; ?>">
            <label for ="input_order">Order By</label>
           
            <input type="submit" value="Go" class="btn btn-primary">

        </form>
    </div>
<!--   Filter section end-->

    <hr>


    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">#</th>
                <th>PNR No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Booking Price</th>
                <th>Booking Seat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customers as $row) { ?>
                <tr>
	                <td><?php echo $row['b_id'] ?></td>
                    <td><?php echo $row['b_pnr']; ?></td>
	                <td><?php echo $row['b_name']; ?></td>
	                <td><?php echo $row['b_phno'] ?></td>
	                <td><?php echo $row['b_mail'] ?> </td>
                    <td>Rs. <?php echo $row['b_price'] ?> </td>
                    <td><?php echo $row['b_total'] ?> </td>
	                <td><?php echo $row['b_status'] ?> </td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 
            <?php } ?>      
        </tbody>
    </table>


   
<!--    Pagination links-->
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if previously built by http_build_query function
            unset($_GET['page']);
            //to keep the query sting parameters intact while navigating to next/prev page,
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="customers.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

