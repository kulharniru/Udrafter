<?php
session_start();

include 'db_connect.php';
header('Content-type: application/json');
/*
if (isset ($_SESSION["email"])) {
    $email = $_SESSION["email"];

    
}else {

    $json['response']= "Please sign in as Employer to post Jobs";
     echo json_encode($json);
}

*/
    include 'db_connect.php';
    $query_get = "select * from Employer where  email=\"$email\"";

    $results = $connection->query ($query_get);

    $row = mysqli_fetch_array($results);
    $employerId = $row["employerId"];



if (isset ($_POST["title"])) {
$title = $_POST["title"];

}
if (isset ($_POST["description"])) {
$description = $_POST["description"];
} 
if (isset ($_POST["category"])) {
$category= $_POST["category"];
} 
if (isset ($_POST["wages"])) {
$wages= $_POST["wages"];

}
if (isset ($_POST["company"])) {
$company = $_POST["company"];
} 
if (isset ($_POST["location"])) {
$location = $_POST["location"];
} 
if (isset ($_POST["date"])) {
    $date = $_POST["date"];
}
    if (isset ($_FILES["jobPic"])) {
        $jobPic = $_FILES["jobPic"];
}
$job =  "/9j/4AAQSkZJRgABAgAAAQABAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0a\nHBwgJC4nICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIy\nMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAIAAgADASIA\nAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQA\nAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3\nODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWm\np6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEA\nAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSEx\nBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElK\nU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3\nuLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD5/ooo\noAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig\nAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC\niiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooqSC3m\nupRFbwySyHoqKWP5Cmk3ohNpasjorqdP8A6vd4a48u0jP/PQ5b8h/Uiuosfh9pNthrp5rpu4Y7F/\nIc/rXbSy7EVNeWy8/wCrnFVzHD09Oa78v6seXgFiAAST0ArTtPDes3uDDp0+D0Z12D82xXsFpplj\nYDFpaQw+6IAT+PWrVejTyVf8vJfcedUzp/8ALuP3nl9t8O9WlwZ5baAehYsf0GP1rVg+GsAx9o1K\nRvaOML/Mmu7orshleGj0v6s455piZbO3ojlYfh/okeN/2mX/AH5MfyAq7H4N0CPpp6n/AHpHP8zW\n7RW8cJQjtBfcYSxdeW8395lL4a0ROml234oD/OpBoGjj/mFWX/fhf8K0aK0VGmtor7jN1qj3k/vM\n46Bo5/5hVl/34X/Co28NaI/XS7b8EA/lWrRQ6NN7xX3Aq1RbSf3mFJ4N0CTrp6j/AHZHH8jVKb4f\n6JJnZ9pi/wByTP8AMGuqorOWEoS3gvuNI4uvHab+84Sf4awHP2fUpF9pIw38iKyrn4d6tFkwS204\n9AxU/qMfrXqFFYTyvDS6W9GbwzTEx639UeK3fhvWbLJm06fA6si7x+a5rMIKkgggjqDXvtVbvTLG\n/GLu0hm93QEj8etcdTJV/wAu5fedlPOn/wAvI/ceF0V6jffD7SbnLWrzWrdgp3r+R5/WuX1DwDq9\nplrfy7uMf88zhvyP9Ca86rl2Ip68t15f1c9GlmOHqac1n5/1Y5aipJ7ea1lMVxDJFIOqupU/kajr\niaa0Z2pp6oKKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi\niigAooooAKKKKACiiigAooooAKKKKACiitLSdB1HWpNtnASgOGlbhF+p/oKqEJTfLFXZM5xguaTs\njNrT0vQNS1hh9ktmaPPMrfKg/H/Cu/0fwHp9htlvf9MnHOGGIx+Hf8fyrq1VUUKqhVAwABgCvYw+\nUSetZ28kePiM3jHSir+bOL0v4d2kO2TUp2uH/wCecfyp+fU/pXW2lja2EXlWlvHCnoigZ+vrViiv\nao4alRXuRseLWxNWs/flcKKKK3MAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC\nvd2NrfxeVd28cyejqDj6elclqnw7tJt0mmztbv2jk+ZPz6j9a7WisK2GpVl78bm9HE1aL9yVjxTV\nNA1LR2/0u2ZY84Eq/Mh/H/GsyvfWVXUqyhlIwQRkGuU1jwHp9/ulsv8AQ5zzhRmM/h2/D8q8XEZR\nJa0XfyZ7WHzeL0rK3mjy2itLVtB1HRZNt5AQhOFlXlG+h/oaza8ecJQfLJWZ7EJxmuaLugoooqSg\nooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACp\nba2nvJ1gtonllY4CoMk1saB4WvddcOo8m0B+adhx9FHc16hpGh2Oi2/lWkQDEfPK3Lv9T/SvRwmX\nVK/vPSP9bHnYvMadD3VrL+tzltC+H8cW241dhI/UW6H5R/vHv9B+tdvFFHBEsUUaxxqMKqjAA+lP\nor6OhhqdCNqaPnK+JqV5XmwooorcwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKK\nACiiigAooooAKKKKACiiigBksUc8TRSxrJGwwysMgj6VxGu/D+OXdcaQwjfqbdz8p/3T2+h/Su6o\nrCvhqdeNpo3oYmpQleDPBrm2ns52guYnilU4KuMEVFXtur6HY61b+VdxAsB8kq8On0P9K8v1/wAL\nXuhOXYedaE/LOo4+jDsa+cxeXVKHvLWP9bn0eEzGnX916S/rYwqKKK849EKKKKACiiigAooooAKK\nKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoop8UUk0qxRIzyOcKqjJJoAZ1Ndz4Z8DNOE\nvNXQpH1S36FvdvQe3Wtbwt4Nj00Je6gqyXnVU6rF/if5frXX17+Byy1qlZfL/P8AyPAx2Z3vTov5\n/wCX+Y2ONIo1jjRURRhVUYAFOoor2zxAooopiCiiigAooooAKKKKACiiigAooooAKKKKACiiigAo\noooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmyRpLG0ciK6MMMrDIIp1FIZ514m8DNAHvN\nIQvH1e36lfdfUe3WuG6Gvfq5DxT4Nj1IPe6eqx3nVk6LL/gf5/rXiY7LL3qUV8v8v8j28DmdrU6z\n+f8An/meYUU+WKSGVopUZJEOGVhgg0yvAPfCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo\noAKKKKACiinRRPNKkUSF5HIVVUZJJ7UAOggluZ0ggjaSVztVVGSTXqvhbwpFokQuLgLJfsOW6iMe\ng/xo8KeFo9EtxcXAV7+QfMeojH90f1NdLX0mX5eqSVSove/L/gnzeYZg6rdOm/d/P/gBRRRXrnkB\nRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFF\n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\n8eaff7Yr3/Q5zxljmM/j2/H866tWV1DKwZSMgg5BrwKtPS9f1LR2H2S5YR55ib5kP4f4V7GHzeS0\nrK/mjx8RlEXrRdvJntdFcVpfxEtJtsepQNbv3kj+ZPy6j9a620vrW/i820uI5k9UYHH19K9qjiaV\nZe5K54tbDVaL9+NixRRRW5gFFFFABRRRQAUUUUAFFFFABWdf220mZBwfvD+taNIQCCCMg1MoqSsV\nGTi7mBRVi6tzBJx9w9DVeuNpp2Z2ppq6CiiikAUUUUAFFFFABRUNxdW9pH5lxMkS+rtjNc7f+M7e\nLKWURmb++/yr+XU/pWVWvTpfGzanQqVfgR07MFUsxAA5JPasDUvFlnaZjtf9Jl9VPyD8e/4Vx9/q\n99qR/wBInYp2jXhR+FUa8ytmUnpTVvM9KjlyWtR38i9qGrXmpvm5lJUHIjXhR+FUaKK82UnJ3k7s\n9KMVFWirIKKKKkoKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoo\nooAKKKKACiiigAooooAKKKKACiiigAqSC4mtZRLbzSRSDoyMVP5io6KabWqE0nozqtP8favaYW48\nu7Qf89BhvzH9Qa6ex+IOk3OFukmtX7lhvX8xz+leXUV20sxxFPTmuvP+rnFVy7D1NeWz8v6se6Wm\np2N+M2l3DN7I4JH4datV4ECVIIJBHQitS08SazZYEOoz4HRXbePybNejTzpf8vI/cedUyV/8u5fe\ne00V5fbfETVosCeK2nHqVKn9Dj9K1YPiVAcfaNNkX1Mcgb+YFdkM0w0utvVHHPK8THpf0Z3dFcrD\n8QNEkxv+0xf78ef5E1dj8ZaBJ01BR/vRuP5it44uhLaa+8wlhK8d4P7jdorKXxLoj9NUtvxkA/nU\ng1/Rz/zFbL/v+v8AjWirU3tJfeZujUW8X9xo0VnHX9HH/MVsv+/6/wCNRt4l0ROuqW34SA/yodam\nt5L7wVGo9ov7jSliWaMo3Q/pWLLG0UhRuo/WiTxloEfXUFP+7G5/kKy9Q8b6HIn7s3EjjoVjx/Mi\nuetiKFr86v6nRRw9e9uR29DRork5fG8Q/wBTZO3u7gfyBrPn8ZahJxFHBEPUKSf1P9K4ZY+hHrc7\no4CvLpY7yq9xfWtoM3FxFF7MwB/KvOLjW9Tus+bey4PUKdo/IVQJJOScmuaeZr7EfvOmGWP7cvuO\n9u/GOnw5ECyXDew2r+Z5/SsG88XajcZWHZbof7gy35msCiuOpja0+tvQ7KeCow6X9R8s0s8hkmke\nRz1Z2yaZRRXI3c60rBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUA\nFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU\nUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR\nRQAUUUUAFFFFAH//2Q==";
$jobPic = base64_decode($job);
$im = imagecreatefromstring($jobPic);

if ($im !==false){
    header('Content-Type: image/png');
    imagepng($im);
        imagedestroy($im);
    echo $im;
}
else{
    echo 'An error occoured';
}



   /*  function imageCreateFromAny($jobPic) {
        $type = exif_imagetype($jobPic); //
      $allowedTypes = array(
                       1, // [] gif
                       2, // [] jpeg
                       3, // [] png
                         4,// [] bmp
      );
     if (!in_array($type, $allowedTypes)) {
        return false;
}
  switch($type){
      case 1:
            $im = imageCreateFromGif($jobPic);
      break;
      case 2 :
         $im = imageCreateFromJpeg($jobPic);
      break;
         case 3 :
         $im = imageCreateFromPng($jobPic);
      break;
      case 4 :
            $im = imageCreateFromBmp($jobPic);
     break;
    }
return $im;
     }

*/




$query = "insert into job (employerId, title, description,category, wages, company, location, date, jobPic )
 values($employerId, \"$title\",\"$description\",\"$category\",\"$wages\",\"$company\",\"$location\",\"$date\",\"$jobPic\")";
$ret = $connection->query ($query); 
if (!$ret) {

    $json['failed']= "Failed to post Job:" . mysqli_error($connection);

    echo json_encode($json);

} else{
    $json['success']= "Your Have succesfully posted this job";

    echo json_encode($json);
}



