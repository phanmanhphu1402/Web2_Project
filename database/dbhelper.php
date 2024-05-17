<?php
require_once('config.php');
/**
Insert, delete, update - > function
*/
function execute($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	
	//query
	mysqli_query($conn, $sql);
	
	//dong connect
	
	mysqli_close($conn);
}

function executeResult($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	
	//query
	$resultset = mysqli_query($conn,$sql);
	$list =[];
	while($row = mysqli_fetch_array($resultset, 1)){
		$list[] = $row;
		
	}
	mysqli_close($conn);
	
	return $list;
}

function execute2($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row['Status'];
}
function execute3($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row['ProductStatus'];
}
function checkUserRole($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row['Role'];
}
function checkUserName($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row['Username'];
}
function checkUserStatus($sql){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row['Status'];
}
function execute4($sql,$str){
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
	//query
	$p = mysqli_query($conn, $sql);
	$row = $p -> fetch_array(MYSQLI_ASSOC);
	//dong connect
	mysqli_close($conn);
	return $row[$str];
}
function executeSingleResult($sql) {
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
    return $row;
}