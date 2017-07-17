<?php
require_once("aut.php");
if(!isset($_POST['save']) && !isset($_GET['staff'])){
    header("Location:staff.php");

}
require_once("header.php");
$err=true;
$postback=false;
$errmsg="";
$target_dir = "../images/";
$uploadOk = 1;


if(isset($_POST['save'])){
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //error_reporting(E_ERROR | E_PARSE);
    $target_file = $target_dir . "slider_".time().".$imageFileType";
    $postback=true;
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $errmsg.= "File is not an image.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 5000000) {

        $errmsg.= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $errmsg.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $errmsg.= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $uploadOk=0;
        }
    }

    $fileName=$uploadOk==1?basename( $target_file):$_POST['oldImg'];
    $id=base64_decode($_POST['staff']);
    $name=htmlspecialchars($_POST['name']);
    $post=htmlspecialchars($_POST['post']);
    $fb=htmlspecialchars($_POST['fb']);
    $tw=htmlspecialchars($_POST['tw']);
    $linked=htmlspecialchars($_POST['linked']);
    $act=isset($_POST['enable'])?1:0;
    $sql="UPDATE  `staff` SET  `staff_name`='$name', `staff_post`='$post', `staff_pic`='$fileName', `staff_fb`='$fb', `staff_link`='$linked', `staff_twi`='$tw', `staff_active`= '$act' WHERE `staff_id`='$id'";
    $r=$conn->query($sql);
    if($r){
        $msg= "Staff Saved Successfully<br>";
        $err=false;
    }
}
$id=0;
if(isset($_GET['staff'])){
    $id=base64_decode($_GET['staff']);
    $sql="SELECT  `staff_name`, `staff_post`, `staff_pic`, `staff_fb`, `staff_link`, `staff_twi`,`staff_link`, `staff_active` FROM `staff` WHERE `staff_id`='$id'";
    $r=$conn->query($sql);
    if($r->num_rows==1){
        $row=$r->fetch_assoc();
        $img=$row['staff_pic'];;
        $name=htmlspecialchars($row['staff_name']);
        $post=htmlspecialchars($row['staff_post']);
        $fb=htmlspecialchars($row['staff_fb']);
        $tw=htmlspecialchars($row['staff_twi']);
        $linked=htmlspecialchars($row['staff_link']);
        $act=intval($row["staff_active"])==1?"checked":"";
    }
    else
        $id=0;
}
?>
<<div class="page-header">
    <div class="icon">
        <span class="ico-user"></span>
    </div>
    <h1>Staff Members <small>Manage your Company Staff Profile</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <?php
            if($err && $postback){
                ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> <?php echo $errmsg; ?>
                </div>
            <?php
            }
            if(!$err && $postback){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> <?php echo $msg; ?>
                </div>
            <?php
            }
            ?>
            <div class="head yellow">
                <div class="icon"><span class="ico-user"></span></div>
                <h2>Staff Member Details</h2>
            </div>
            <?php if($id!=0){?>
                <form id="validate" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="staff" value="<?php echo base64_encode($id); ?>"/>
                    <input type="hidden" name="oldImg" value="<?php echo $img; ?>"/>

                    <div class="row-form">
                        <div class="span2">Name:</div>
                        <div class="span6">
                            <input type="text" name="name" class="validate[required,maxSize[100]]" value="<?php echo $name; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Post:</div>
                        <div class="span6">
                            <input type="text" name="post" class="validate[required,maxSize[100]]" value="<?php echo $post; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Image</div>
                        <div class="span6"><div class="input-append file ">
                                <input type="file" name="fileToUpload" onchange="readURL(this);"/>
                                <input type="text"  />
                                <button class="btn">Browse</button>
                            </div>
                        </div>
                        <div class="span4">
                            <img src="../images/<?php echo $img; ?>" id="previewimg" class="img-responsive img-thumbnail"/>

                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Facebook:</div>
                        <div class="span6">
                            <input type="text" name="fb" class="validate[required,custom[url]]" value="<?php echo $fb; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Twitter:</div>
                        <div class="span6">
                            <input type="text" name="tw" class="validate[required,custom[url]]" value="<?php echo $tw; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">LinkedIn:</div>
                        <div class="span6">
                            <input type="text" name="linked" class="validate[required,custom[url]]" value="<?php echo $linked; ?>"/>

                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2"></div>

                        <div class="span4">
                            <input type="checkbox"  name="enable" value="1" <?php echo $act; ?>/> Active
                        </div>
                    </div>
                    <div class="row-form">

                    </div>

                    <div class="toolbar bottom tar">
                        <div class="btn-group">
                            <button class="btn" type="submit" name="save">Save Member</button>
                        </div>
                    </div>


        </div>
                </form>
            <?php }
            else{?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> <br>Slide not found<br>

                    <a href="slider.php" class="btn btn-warning">Goto Sliders</a>
                    <a href="dashboard.php" class="btn btn-warning ">Goto Home</a>

                </div>
                <div class="row-fluid">
                    <a href="slider.php" class="btn btn-default">Goto Sliders</a>
                    <a href="dashboard.php" class="btn btn-default">Goto Home</a>
                </div>
            <?php }?>
        </div>

    </div>
</div>

<?php
require_once("header.php");
?>
<script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
<script type='text/javascript' src='js/plugins/other/excanvas.js'></script>

<script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>

<script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

<script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>

<script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>

<script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
<script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
<script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
<script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
<script type='text/javascript' src='js/plugins/multiselect/jquery.multi-select.min.js'></script>

<script type='text/javascript' src='js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
<script type='text/javascript' src='js/plugins/validationEngine/jquery.validationEngine.js'></script>

<script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>

<script type='text/javascript' src='js/plugins.js'></script>
<script type='text/javascript' src='js/charts.js'></script>
<script type='text/javascript' src='js/actions.js'></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewimg')
                    .attr('src', e.target.result)

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
