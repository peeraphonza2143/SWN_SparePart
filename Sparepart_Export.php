<?php
include('condb.php');
if(isset($_GET['act'])){
	if($_GET['act']== 'excel'){
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=export.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
</head>
<?php 
  $query = "SELECT * FROM tbl_spare_part ORDER BY Sp_ID ASC" or die("Error:" . mysqli_error());
  $result = mysqli_query($con, $query);
  $row_am = mysqli_fetch_assoc($result);
?>
<body>
<table border="1" class="table table-hover">
						<thead>
							<tr class="info">
								<th>Item number</th>
								<th>Item name</th>
								<th>Warehouse</th>
								<th>Item group</th>
                                <th>Unit</th>
                                <th>Quality</th>
                                <th>Unit Cost</th>
                                <th>Amount</th>
                                <th>Minimum Stock</th>
                                <th>Maximum Stock</th>
							</tr>
						</thead>
						<tbody>
                        <?php do { ?>
							<tr>
								<td><?php echo $row_am['Sp_number']; ?></td>
                                <td><?php echo $row_am['Sp_Name']; ?></td>
                                <td><?php echo $row_am['Sp_warehouse']; ?></td>
								<td><?php echo $row_am['Sp_Itemgroup']; ?></td>
                                <td><?php echo $row_am['Sp_Unit']; ?></td>
                                <td><?php echo $row_am['Sp_Quantity']; ?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
							</tr>
                            <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
						</tbody>
					</table>
</body>
</html>