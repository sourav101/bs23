<?php 
$treeviewData = $controller->categories_treeview_with_total_items();
?>
<div class="card">
	<div class="card-header">Task 2</div>
	<div class="card-body">
		<?php
		function showCategories($treeviewData)
		{
			echo "<ul>";
			foreach ($treeviewData as $item) {
				echo "<li>".$item['Name'];
					echo " (".count($item['sub_categoires']).")";
					if (count($item['sub_categoires']) > 0)
					{
						showCategories($item['sub_categoires']);
					}
				echo "</li>";
			} 
			echo "</ul>";
		}
		showCategories($treeviewData);
		?>
	</div>
</div>