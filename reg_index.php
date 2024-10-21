<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="login-ui/image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="login-ui/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login-ui/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login-ui/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="login-ui/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="login-ui/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="login-ui/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="login-ui/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="login-ui/css/util.css">
    <link rel="stylesheet" type="text/css" href="login-ui/css/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(login-ui/images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>

                <form method="post" id="examineeLoginFrm" action="query/addExamineeExe.php"
                    class="login100-form validate-form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="" name="fullname" id="fullname" class="form-control"
                                placeholder="Input Fullname" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="0">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="" name="fullname" id="fullname" class="form-control"
                                placeholder="Input Fullname" autocomplete="off" required="">
                            <select class="form-control" name="course" id="course">
                                <option value="0">Select course</option>
                                <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $selCourseRow['cou_id']; ?>">
                                    <?php echo $selCourseRow['cou_name']; ?></option>
                                <?php }
               ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============= -->
    <!-- Modal For Add Examinee -->
    <div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="refreshFrm" id="addExamineeFrm" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Examinee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="" name="fullname" id="fullname" class="form-control"
                                    placeholder="Input Fullname" autocomplete="off" required="">
                            </div>
                            <!-- <div class="form-group">
            <label>Birhdate</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
          </div>  -->
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="0">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control" name="course" id="course">
                                    <option value="0">Select course</option>
                                    <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $selCourseRow['cou_id']; ?>">
                                        <?php echo $selCourseRow['cou_name']; ?></option>
                                    <?php }
               ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
            <label>Year Level</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Select year level</option>
              <option value="first year">First Year</option>
              <option value="second year">Second Year</option>
              <option value="third year">Third Year</option>
              <option value="fourth year">Fourth Year</option>
            </select>
          </div>  -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Input Email" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Input Password" autocomplete="off" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="login-ui/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="login-ui/vendor/animsition/js/animsition.min.js"></script>
    <script src="login-ui/vendor/bootstrap/js/popper.js"></script>
    <script src="login-ui/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="login-ui/vendor/select2/select2.min.js"></script>
    <script src="login-ui/vendor/daterangepicker/moment.min.js"></script>
    <script src="login-ui/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="login-ui/vendor/countdowntime/countdowntime.js"></script>
    <script src="login-ui/js/main.js"></script>

</body>

</html>