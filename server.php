<?php	
	// receiving the value (fetching the value)
	$data = $_REQUEST;
	$last_displayed_chat_id = $data['last_displayed_chat_id'];

	// connect to MYSQL server
	$con = mysqli_connect( "localhost", "root", "", "group_chat" );

	$select = $"SELECT *
				FROM chats
				WHERE chat_id > '".$select_displayed_chat_id."'
			";
	$result = mysqli_query( $con , $select );

	$arr = array();
	$row_count = mysqli_num_rows( $result );

	if( $rows_count > 0 ) {

		while ($row = mysqli_fetch_array( $result ) ) {
			array_push( $arr, $row );
		}
	}

	//close the MYSQL connection
	mysqli_close ( $con );

	//Return the response as JSON
	echo json_encode( $arr );
?>