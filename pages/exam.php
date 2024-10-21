<script type="text/javascript">
function preventBack() {
    window.history.forward();
}
setTimeout("preventBack()", 0);
window.onunload = function() {
    null;
};

document.addEventListener('DOMContentLoaded', function() {
    let currentQuestion = 0;
    const questions = document.querySelectorAll('.question');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitAnswerFrmBtn');

    function showQuestion(index) {
        questions.forEach((question, i) => {
            question.style.display = (i === index) ? 'block' : 'none';
        });
        prevBtn.style.display = (index === 0) ? 'none' : 'inline-block';
        nextBtn.style.display = (index === questions.length - 1) ? 'none' : 'inline-block';
        submitBtn.style.display = (index === questions.length - 1) ? 'inline-block' : 'none';
    }

    prevBtn.addEventListener('click', () => {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    });

    showQuestion(currentQuestion);
});

</script>
<?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
    $selExamTimeLimit = $selExam['ex_time_limit'];
    $exDisplayLimit = $selExam['ex_questlimit_display'];
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-md-12">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <?php echo $selExam['ex_title']; ?>
                            <div class="page-title-subheading">
                                <?php echo $selExam['ex_description']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                            <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                            <label>Remaining Time : </label>
                            <input style="border:none;background-color: transparent;color:blue;font-size: 25px;"
                                name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-0 mb-4">
            <form method="post" id="submitAnswerFrm">
                <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
                <input type="hidden" name="examAction" id="examAction">
                
                <div id="questions-container">
                    <?php 
                    $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ORDER BY rand() LIMIT $exDisplayLimit ");
                    if($selQuest->rowCount() > 0)
                    {
                        $i = 0;
                        while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                        <?php $questId = $selQuestRow['eqt_id']; ?>
                        <div class="question" id="question-<?php echo $i; ?>" style="display: <?php echo $i === 0 ? 'block' : 'none'; ?>;">
                            <p><b><?php echo $i+1 ; ?> .) <?php echo $selQuestRow['exam_question']; ?></b></p>
                            <div class="col-md-4 float-left">
                                <div class="form-group pl-4">
                                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch1']; ?>" class="form-check-input" type="radio" id="invalidCheck1-<?php echo $i; ?>">
                                    <label class="form-check-label" for="invalidCheck1-<?php echo $i; ?>"><?php echo $selQuestRow['exam_ch1']; ?></label>
                                </div>
                                <div class="form-group pl-4">
                                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch2']; ?>" class="form-check-input" type="radio" id="invalidCheck2-<?php echo $i; ?>">
                                    <label class="form-check-label" for="invalidCheck2-<?php echo $i; ?>"><?php echo $selQuestRow['exam_ch2']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-4 float-left">
                                <div class="form-group pl-4">
                                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch3']; ?>" class="form-check-input" type="radio" id="invalidCheck3-<?php echo $i; ?>">
                                    <label class="form-check-label" for="invalidCheck3-<?php echo $i; ?>"><?php echo $selQuestRow['exam_ch3']; ?></label>
                                </div>
                                <div class="form-group pl-4">
                                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch4']; ?>" class="form-check-input" type="radio" id="invalidCheck4-<?php echo $i; ?>">
                                    <label class="form-check-label" for="invalidCheck4-<?php echo $i; ?>"><?php echo $selQuestRow['exam_ch4']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-4 float-left">
                                <div class="form-group pl-4">
                                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch5']; ?>" class="form-check-input" type="radio" id="invalidCheck5-<?php echo $i; ?>">
                                    <label class="form-check-label" for="invalidCheck5-<?php echo $i; ?>"><?php echo $selQuestRow['exam_ch5']; ?></label>
                                </div>
                            </div>
                        </div>
                    <?php $i++; }
                    ?>
                    <div class="navigation-buttons col-md-4" style="padding: 20px;">
                        <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                        <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn" style="display:none;">
                    </div>
                    <?php
                    }
                    else
                    { ?>
                    <b>No question at this moment</b>
                    <?php }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
