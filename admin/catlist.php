<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
	$cat = new product();
	if(isset ($_GET['delid'])){
		echo "<script> windown.location = 'catlist.php'</script>";

	  $id = $_GET['delid'];
	  $delcat = $cat->del_product($id);
	} 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">     
				<?php if (isset($delcat)){
                   echo $delcat;
                  }
                ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Product Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
					 $show_cate = $cat->show_product();
					  if($show_cate){
						  $i = 0;
						while($result = $show_cate->fetch_assoc()){
                           $i++;
					?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']?> </td>
							<td><a href="catedit.php?catid=<?php echo $result['catId']?>">Edit</a> || <a onclick = "return confirm('Are you sure to delete')" href="?delid=<?php echo $result['catId'] ?>">Delete</a></td>>
						</tr>
						<?php
						  }
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

