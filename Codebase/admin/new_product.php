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

    $target_file = $target_dir . "product_".time().".$imageFileType";
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
            $pname=htmlspecialchars($_POST['pname']);
            $cap=$_POST['caption'];
            $s_num=$_POST['price'];
            $cat=$_POST['cat'];
            $unit=$_POST['unit'];
            $act=isset($_POST['enable'])?1:0;
            $sql="INSERT INTO `items`( `item_name`, `item_fruit`, `item_desc`, `item_image`, `item_price`, `item_unit`, `item_active`) VALUES ('$pname', $cat, '$cap', '$fileName', $s_num, '$unit', $act)";
            $r=$conn->query($sql);
            if($r){
                $msg= "Product Saved Successfully<br>";
                $err=false;
            }
            else{
                $errmsg.= "Sorry, there was an error while saving Product.<br>";
            }
        } else {
            $errmsg.= "Sorry, there was an error uploading your file.<br>";
        }
    }


}
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-barcode-2"></span>
    </div>
    <h1>Products <small>Manage your Products</small></h1>
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
            <div class="head dblue">
                <div class="icon"><span class="ico-barcode-2"></span></div>
                <h2>New Product Details</h2>
            </div>
            <form id="validate" method="POST" enctype="multipart/form-data">
                <div class="data-fluid">

                    <div class="row-form">
                        <div class="span2">Product Name:</div>
                        <div class="span10">
                            <input type="text" name="pname" class="validate[required,minSize[1]]"/>
                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Description:</div>
                        <div class="span10">
                            <textarea name="caption" style="width:100%"></textarea>

                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Image:</div>
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
                        <div class="span2">Category</div>
                        <div class="span4">
                            <select name="cat" class="select" style="width: 100%;">
                                <?php
                                $sql="SELECT `fruit_id`, `fruit_name` FROM `fruits`";
                                $r=$conn->query($sql);
                                while($row=$r->fetch_assoc()){
                                    $id=$row["fruit_id"];
                                    $name=$row["fruit_name"];
                                    echo "<option value='$id'>$name</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="span2">Unit:</div>
                        <div class="span4">
                            <input type="text" name="unit" class="validate[required,minSize[1]]"/>
                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Price</div>
                        <div class="span2">
                            <input type="text" name="price" class="validate[required,custom[integer],minSize[1]]"/>
                        </div>
                        <div class="span4">
                            <input type="checkbox"  name="enable" value="1" checked/> Active
                        </div>
                    </div>
                    <div class="row-form">

                    </div>

                    <div class="toolbar bottom tar">
                        <div class="btn-group">
                            <button class="btn" type="submit" name="save">Save Product</button>
                        </div>
                    </div>

                </div>
            </form>

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
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>