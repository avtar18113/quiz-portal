 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>

 <div class="app-main__outer">
     <div class="app-main__inner">
         <div id="refreshData">
             <div class="col-md-12">
                 <div class="app-page-title">
                     <div class="page-title-wrapper">
                         <div class="page-title-heading">
                         <center><img style="width: 100%;" src="http://localhost/onlineExamination/assets/images/ESHRE 2022 Banner.jpg"></center>
                             <div>
                                 <?php echo $selExam['ex_title']; ?>
                                 <div class="page-title-subheading">
                                     <?php echo $selExam['ex_description']; ?>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row col-md-12">
                     <h1 class="text-primary">Congratulations your exam has been submitted successfully </h1>
                 </div>
                 <div class="row col-md-12">
                     <center><a type="button" href="query/logoutExe.php" class="btn btn-success">LOG OUT</a></center>
                 </div>
             </div>
         </div>
     </div>
 </div>