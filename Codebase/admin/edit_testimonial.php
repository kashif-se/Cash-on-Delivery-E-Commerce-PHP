<?php
require_once("aut.php");
if(!isset($_POST['save']) && !isset($_GET['testimonial'])){
    header("Location:testimonial.php");

}
require_once("header.php");
$err=true;
$postback=false;
$errmsg="";
$uploadOk = 1;
if(isset($_POST['save'])){
    $postback=true;
    $id=base64_decode($_POST['testimonial']);
    $text=htmlspecialchars($_POST['text']);
    $person=htmlspecialchars($_POST['person']);
    $post=htmlspecialchars($_POST['post']);
    $link=htmlspecialchars($_POST['link']);
    $act=isset($_POST['enable'])?1:0;
    $sql="UPDATE `testomonial` SET `testomonial_text`='$text', `testomonial_person`='$person', `testomonial_post`='$post', `testomonial_link`='$link', `testmonial_active`='$act' WHERE `testmonial_id`='$id'";
    $r=$conn->query($sql);
    if($r){
        $err=false;
        $errmsg="Testimonial Details Saved Successfully";
    }else{
        $errmsg="Testimonial Details was not Saved Successfully";
    }

}
$id=0;
if(isset($_GET['testimonial'])){
    $id=base64_decode($_GET['testimonial']);
    $sql="SELECT `testomonial_text`, `testomonial_person`, `testomonial_post`, `testomonial_link`,  `testmonial_active` FROM `testomonial` WHERE `testmonial_id`='$id'";
    $r=$conn->query($sql);
    if($r->num_rows==1){
        $row=$r->fetch_assoc();
        $text=htmlspecialchars($row['testomonial_text']);
        $person=htmlspecialchars($row['testomonial_person']);
        $post=htmlspecialchars($row['testomonial_post']);
        $link=htmlspecialchars($row['testomonial_link']);
        $act=intval($row["testmonial_active"])==1?"checked":"";
    }
    else
        $id=0;
}
?>
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-pen"></span>
    </div>
    <h1>Testimonial <small>Handle testimonial on website</small></h1>
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
                    <strong>Success!</strong> <?php echo $errmsg; ?>
                </div>
            <?php
            }
            ?>
            <div class="head purple">
                <div class="icon"><span class="ico-pen"></span></div>
                <h2>Testimonial Details</h2>
            </div>
            <?php if($id!=0){?>
            <form id="validate" method="POST" >
                <div class="data-fluid">
                    <input type="hidden" name="testimonial" value="<?php echo base64_encode($id); ?>"/>
                    <div class="row-form">
                        <div class="span2">Testimonial Text</div>
                        <div class="span10">
                            <input type="text" name="text" class="validate[required,minSize[10],maxSize[350]]" value="<?php echo $text; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Testimonial Person</div>
                        <div class="span10">
                            <input type="text" name="person" class="validate[required,minSize[3],maxSize[100]]" value="<?php echo $person; ?>"/>
                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Person Post</div>
                        <div class="span10">
                            <input type="text" name="post" class="validate[required,minSize[5],maxSize[50]]" value="<?php echo $post; ?>"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Link to Profile</div>
                        <div class="span10">
                            <input type="text" name="link" class="validate[required,custom[url],maxSize[250]]" value="<?php echo $link; ?>"/>
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
                            <button class="btn" type="submit" name="save">Save Testimonial</button>
                        </div>
                    </div>

                </div>
            </form>
            <?php }
            else{?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> <br>Testimonial not found<br>

                    <a href="testimonial.php" class="btn btn-warning">Goto Testimonial</a>
                    <a href="dashboard.php" class="btn btn-warning ">Goto Home</a>

                </div>
                <div class="row-fluid">
                    <a href="testimonial.php" class="btn btn-default">Goto Testimonial</a>
                    <a href="dashboard.php" class="btn btn-default">Goto Home</a>
                </div>
            <?php }?>
        </div>

    </div>
</div>

<?php
require_once "libs.php";
require_once("footer.php");
?>
