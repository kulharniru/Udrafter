<?
session_start();
//jobs
include 'db_connect.php';

header('Content-type: application/json');
$query_get = "select * from Job";


$results = $connection->query ($query_get);

$num_results = mysqli_num_rows($results);

/*
for ($i = 0; $i < $num_results; $i++) {
    $row = mysqli_fetch_array($results);

        $jobId = $row["jobId"];
        $employerId = $row["employerId"];
        $title = $row["title"];
        $description = $row["description"];
        $category = $row["category"];
        $wages = $row["wages"];
        $company = $row["company"];
        $location = $row["location"];
        $date = $row["date"];

    
*/
    $encode = array();

    while($row = mysqli_fetch_assoc($results)) {
        array_push ($encode, $row);
    }

    echo json_encode($encode);


$connection->close();
?>