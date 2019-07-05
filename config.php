
<?php 
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
	$db = mysqli_connect("localhost","root",'',"using_ajax");
			$record_per_page = 10;
			$content= "";
			$query = "SELECT * FROM user_details";
			$result = mysqli_query($db,$query);
			$total_records  = mysqli_num_rows($result);//total record in table
			
			$number_of_pages = ceil($total_records/$record_per_page);//number of pages for pagination
			//determe the users active page 
			if(!isset($_GET['page'])){
				$page = 1;
			}
			else{
				$page = $_GET['page'];
			}			
			$starting_page = ($page-1)* $record_per_page;// get the active page 
			 $sql = "SELECT * FROM user_details LIMIT $starting_page, $record_per_page";
			 $rslt = mysqli_query($db,$sql);
			 $content .= "<div class='row'><table class='table table-striped'>
								<thead class='thead-dark'>
									<tr>
										<th>S.No.</th>
										<th>User Name</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Gender</th>
									</tr>
								</thead><tbody class=''>";
			 while($row = mysqli_fetch_array($rslt)){
					$content .= "<tr>
									<td>$row[user_id]</td>
									<td>$row[username]</td>
									<td>$row[first_name]</td>
									<td>$row[last_name]</td>
									<td>$row[gender]</td>
								</tr>";
			 }
					$content .= "</tbody></table></div>";
			for($page=1;$page<=$number_of_pages;$page++){
				$content .= '<span class="btn btn-outline-warning ml-2 pagination_link" id="' .$page. '">'. $page .'</span>';
			}
			echo $content;
}
else{
	header('location:/using_ajax');
}
?>
