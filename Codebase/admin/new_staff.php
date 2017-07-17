<?php
require_once("aut.php");
require_once("header.php");
$err=true;
$postback=false;
$errmsg="";
$target_dir = "../images/";
$uploadOk = 1;
if(isset($_POST['save'])){
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $target_file = $target_dir . "staff_".time().".$imageFileType";
    $postback=true;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
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
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $fileName=basename( $target_file);
            $name=htmlspecialchars($_POST['name']);
            $post=htmlspecialchars($_POST['post']);
            $fb=htmlspecialchars($_POST['fb']);
            $tw=htmlspecialchars($_POST['tw']);
            $linked=htmlspecialchars($row['linked']);
            $act=isset($_POST['enable'])?1:0;
            $sql="INSERT INTO `staff`( `staff_name`, `staff_post`, `staff_pic`, `staff_fb`, `staff_link`, `staff_twi`, `staff_active`) VALUES ('$name', '$post', '$fileName', '$fb', '$linked', '$tw', '$act')";
            $r=$conn->query($sql);
            if($r){
                $msg= "Staff member Saved Successfully<br>";
                $err=false;
            }
            else{
                $errmsg.= "Sorry, there was an error while saving.<br>";
            }
        } else {
            $errmsg.= "Sorry, there was an error uploading your file.<br>";
        }
    }


}
?>
<div class="page-header">
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
            <form id="validate" method="POST" enctype="multipart/form-data">
                <div class="data-fluid">

                    <div class="row-form">
                        <div class="span2">Name:</div>
                        <div class="span6">
                            <input type="text" name="name" class="validate[required,maxSize[100]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Post:</div>
                        <div class="span6">
                            <input type="text" name="post" class="validate[required,maxSize[100]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Image</div>
                        <div class="span6"><div class="input-append file ">
                                <input type="file" name="fileToUpload" onchange="readURL(this);" required/>
                                <input type="text"  />
                                <button class="btn">Browse</button>
                            </div>
                        </div>
                        <div class="span4">
                            <img src="../images/noimg.png" width="150" height="200" id="previewimg" class="img-responsive img-thumbnail"/>

                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Facebook:</div>
                        <div class="span6">
                                <input type="text" name="fb" class="validate[required,custom[url]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Twitter:</div>
                        <div class="span6">
                                <input type="text" name="tw" class="validate[required,custom[url]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">LinkedIn:</div>
                        <div class="span6">
                                <input type="text" name="linked" class="validate[required,custom[url]]"/>

                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2"></div>

                        <div class="span4">
                            <input type="checkbox"  name="enable" value="1" checked/> Active
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

        </div>

    </div>
</div>

<?php
require_once("footer.php");
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
