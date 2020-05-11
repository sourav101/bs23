<?php 
$data = $controller->categories_with_total_items(); 
?>
<div class="card">
	<div class="card-header">Task 1</div>
	<div class="card-body">
		<table class="table table-bordered table-striped">
			<tbody>
				<?php 
				if (count($data) > 0) { 
				foreach ($data as $row) { 
				?>
				<tr>
					<td><?= $row->Name ?></td>
					<td><?= $row->Total_Items ?></td>
				</tr>
				<?php 
				} // end foreach
				} // end if
				?>
			</tbody>
		</table>
	</div>
</div>