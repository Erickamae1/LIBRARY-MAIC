<?php

require "connection.php";
include_once "admin_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="search-bar admin-search">
        <form action="" method='post'>
            <input type="search" name='search' placeholder='Search by Student ID' required>
            <button type='submit' name='submit'><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="request-table">
        <div class="request-container">
            <h2 class="request-title student-info-title">List of Students</h2>
            <table class="rtable">
                <thead>
                    <tr style='background-color: #1F48AC;'>
                        <th scope="col">
                            <center>#
                        </th>
                        <th scope="col">
                            <center>Student I.D
                        </th>
                        <th scope="col">
                            <center>Photo
                        </th>
                        <th scope="col">
                            <center>Name
                        </th>
                        <th scope="col">
                            <center>Email
                        </th>
                        <th scope="col">
                            <center>Status</center>
                        </th>
                        <th scope="col">
                            <center>Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
if (isset($_POST['submit'])) {
    $query = "SELECT * FROM  student where ID ='$_POST[search]'";
    $query_run = mysqli_query($db, $query);
    if (mysqli_num_rows($query_run) == 0) {
        echo "Sorry! No student found. Try searching again";
    } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td>
                            <center><?php echo $i++; ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['ID']; ?></center>
                        </td>
                        <td>
                            <center>
                                <img src="images/<?php echo $row['studentpic']; ?>">

                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $row['student_username']; ?> ,
                                <?php echo $row['FullName']; ?>
                                <?php echo $row['Middle']; ?>.</center>
                        </td>
                        <td>
                            <center><?php echo $row['Email'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['status'] ?></center>
                        </td>
                        <td>
                            <center> <button>Approve</button>
                                <button>Disapprove</button>
                            </center>
                        </td>
                    </tr>
                    <?php
}
    }
} else {
    $i = 1;
    $query = "SELECT * FROM student";
    $query_run = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
                    <tr>
                        <td>
                            <center><?php echo $i++; ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['ID']; ?></center>
                        </td>
                        <td>
                            <center>

                                <img src="images/<?php echo $row['studentpic']; ?>">
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $row['student_username']; ?> ,
                                <?php echo $row['FullName']; ?>
                                <?php echo $row['Middle']; ?>.
                            </center>
                        </td>
                        <td>
                            <center><?php echo $row['Email'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['status'] ?></center>
                        </td>
                        <td>
                            <center>
                                <form method="POST" action="admin_approval.php">
                                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                                    <button style="font-weight:bold; border-radius: 30px; display: inline-block; background-color: #1F48AC; color: #fff; padding: 8px 30px; border-radius: 30px; transition: background-color 0.4s; outline: none;"  type="submit" name="approve">Approve</button>
                                    <button style="font-weight:bold; border-radius: 30px; display: inline-block; background-color: #1F48AC; color: #fff; padding: 8px 30px; border-radius: 30px; transition: background-color 0.4s; outline: none;"  type="submit" name="disapprove">Disapprove</button>
                                </form>

                            </center>
                        </td>
                    </tr>

                    <?php
}
}
?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>