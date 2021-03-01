<?php
session_start();
$uid = $_SESSION['uid'];
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}


?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="../index.php">Back</a>
            </div><!-- /.col -->
            <div class="col-sm-4 text-center">
                <h3><strong>WELCOME
                        <?php
                        if ($uid == 3) {
                            echo "STUDENT";
                        } else if ($uid == 2) {
                            echo "TEACHER";
                        } else { //if($uid == 3])
                            echo "ADMIN";
                        }
                        ?>
                    </strong></h3>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
            <hr>
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

                    <a href="student.php">

                        <div class="info-box-content text-dark">
                            <span class="info-box-text">Total Students</span>
                            <span class="info-box-number">2000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                    <a href="teacher.php">
                        <div class="info-box-content text-dark">
                            <span class="info-box-text">Total Teachers</span>
                            <span class="info-box-number">50</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
                    
            <?php if($uid == 1){ ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-search"></i></span>

                    <a href="<?= $site_url ?>admin/inquires.php">
                        <div class="info-box-content text-dark">
                            <span class="info-box-text">New Inquires</span>
                            <span class="info-box-number">210</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                    <a href="<?= $site_url ?>admin/user_form.php">
                        <div class="info-box-content text-dark">
                            <span class="info-box-text">Apporve Requests</span>
                            <span class="info-box-number">210</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <?php } ?>
        </div>
        <!-- /.row -->

    </div>
    <!--/. container-fluid -->
</section>

<!-- calendar -->
<section class="mx-lg-5 mx-md-5 mx-sm-2 my-5">

    <div id="calendar"></div>


    <script>
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                // theme: 'Midnight Blue',
                // theme: 'Default',
                theme: 'Royal Navy',
                // theme: 'Orange Coral',

                calendarEvents: [{
                        id: 'bHay68s', // Event's ID (required)
                        name: "New Year", // Event name (required)
                        date: "January/1/2020", // Event date (required)
                        description: "happy new year",
                        type: "holiday", // Event type (required)
                        everyYear: true // Same event every year (optional)
                    },
                    {
                        name: "Vacation Leave",
                        badge: "02/13 - 02/15", // Event badge (optional)
                        date: ["February/13/2020", "February/15/2020"], // Date range
                        description: "Vacation leave for 3 days.", // Event description (optional)
                        type: "event",
                        color: "#63d867" // Event custom color (optional)
                    }
                ]


            })
        })
    </script>
</section>

<section id="notice" class=" my-5 pb-5">
    <div class="container-fluid bg-info text-light py-1">
        <h2 class="text-center">Notices</h2>
    </div>
    <div class="container">
<?php
    include('../includes/dbcon.php');
    $query = "SELECT * FROM notice where to_whom = 'all'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
<div class="card my-5 shadow">
    <div class="card-body">
        <h2 class="card-title my-2"><?php echo $row['subject'] ?></h2>
        <p class="card-text"><?php echo $row['message'] ?></p>
    </div>
</div>
            <?
        }
    }
    ?>
    </div>
</section>

<?php include('footer.php') ?>