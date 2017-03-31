<?php include 'itemTable.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Tables</title>
<?php
    include('packages.html');
?>

</head>

<body class="container">
    <div class="container">
        
        <div>
            <input type="text" name="name" class="form-control" />
            <input type="mail" name="mail"  class="form-control"/>
            <input type="text" name="phone"  class="form-control"/>
        </div>
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Name</td>
            <td>Gmail</td>
            <td>Phone</td>
        </tr>
    </thead>
        
        
        
    <tbody>
        <tr>
            <td class="col-sm-4">
               
            </td>
            <td class="col-sm-4">
                
            </td>
            <td class="col-sm-3">
                
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>
</body>
    
<script>
    $(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

//        cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
//        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
//        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
    </script>
    
    
    
    <form role="form" method="post">

									<div class="form-group">
											<label>Bill No</label>
											<input type="number" value=<?php
												   include("connection.php");
												   $query = "SELECT bill_id FROM billing ORDER BY bill_id DESC LIMIT 1;";
												   $result = mysqli_query($db,$query);
												   $row = mysqli_fetch_array($result);
												   if($row){
													   $BillingId=$row['bill_id']+1;
													   echo $BillingId;
												   }else{
													   $BillingId=0;
													   echo $BillingId;
												   }

												   ?> name='billNo' class="form-control" readonly>
										</div>

										<div class="form-group">
											<label>Select Item :</label>
                                            <select class='selectpicker show-tick show-menu-arrow ' name='itemName' data-live-search='true' title='Choose one of the following...' required id='type'>
												<?php
												include("connection.php");
												$sql = "SELECT name FROM item";
												$result = $db->query($sql);

												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo "<option>".$row['name']."</option>";
													}
												} else {
													echo "No results";
												}
												$db->close();
												
												?>
                                            </select>

												</div>


											<div class="form-group">
												<label>Quantity</label>
												<input type="number" name="quantity" class="form-control">
											</div>


											<div class="form-group">
												<label>Remark</label>
												<textarea class="form-control" name="remark" rows="2"></textarea>
											</div>

											<div class="col-md-6">

												<input type="submit" name="addItem" value="Add Item" class="btn btn-success" />
												<button type="reset" class="btn btn-default">Reset Button</button>
											</div>

											</form>
<?php

										include("connection.php");

										if((isset($_POST['submit'])) AND $_POST['submit']=="addItem" ){

											$query = "INSERT INTO billing(`bill_id`,`item_name`,`price`,`quantity`,`remark`) VALUES('".$_POST['billNo']."','".$_POST['itemName']."','".$_POST['price']."','".$_POST['quantity']."','".$_POST['remark']."')";
											if(mysqli_query($db,$query)){
												echo "Item Added";
											}else{
												echo "Item Not Added";
											}
										}

										?>