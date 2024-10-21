<?php 
  include("conn.php");
  include("query/selectData.php");
 ?>
<div class="app-main__outer">
    <div id="refreshData">
        <div class="">
            <center><img style="width: 100%;"
                    src="https://quiz.concepttc.com/OnlineExamination/assets/images/aocr-header-image.webp"></center>
        </div><br><br>
        <div>
            <?php        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>


            <center><a class="btn btn-primary" href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>">
                    Start Exam 
                </a></center>

            <?php }
                        }
                        else
                        { ?>
            <a href="#">
                <i class="metismenu-icon"></i>No Exam's @ the moment
            </a>
            <?php }
                     ?>
        </div>
    </div>
</div>