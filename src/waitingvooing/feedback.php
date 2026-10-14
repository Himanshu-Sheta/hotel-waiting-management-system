
<?php
require_once 'conect.php';
$_SESSION[page] = "feedback"
?>
<!DOCTYPE html>
<html>

    <?php
    require_once 'head.php';
    require_once 'header1.php';
    require_once 'header2.php';
    ?>




    <body>
        <div class="container-fluid">
            <div class="row mainn1">
                <div class="col-md-12">

                    <div>
                        <h1>feedback</h1>

                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page">Home</a>
                                    <span>/ </span>
                                </li>
                                <li class="cms_page">
                                    <strong class="animated swing infinite">feedback</strong>
                                </li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>

        </div>

         <div class="container">
            
            <div class="row frm1" >
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h1>Feedback</h1> 
                    <p> Please provide your feedback below: </p>
                    <form role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" />
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments</label>
                                <textarea class="input100" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name</label>
                                <input type="text" class="input100" id="name" name="name" placeholder="ENTER YOUR NAME"required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email</label>
                                <input type="email" class="input100" id="email" name="email" placeholder="ENTER YOUR EMAIL" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-warning btn-block bt1" >send feedback</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

<?php
require_once 'footer1.php';
require_once 'footer2.php';
require_once 'footer3.php';
?>

    </body>
</html>


<?php
require_once 'allscript.php';
?>