<?php
require_once("aut.php");
require_once("header.php");
$err=true;
$postback=false;
$errmsg="";
if(isset($_POST['save'])){
    $postback=true;
    $text=htmlspecialchars($_POST['text']);
    $person=htmlspecialchars($_POST['person']);
    $post=htmlspecialchars($_POST['post']);
    $link=htmlspecialchars($_POST['link']);
    $act=isset($_POST['enable'])?1:0;
    $sql="INSERT INTO `testomonial`( `testomonial_text`, `testomonial_person`, `testomonial_post`, `testomonial_link`, `testmonial_active`) VALUES ('$text', '$person', '$post', '$link', '$act')";
    $r=$conn->query($sql);
    if($r){
        $err=false;
        $errmsg="Testimonial Details Saved Successfully";
    }else{
        $errmsg="Testimonial Details was not Saved Successfully";
    }

}
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
            <form id="validate" method="POST" >
                <div class="data-fluid">

                    <div class="row-form">
                        <div class="span2">Testimonial Text</div>
                        <div class="span10">
                            <input type="text" name="text" class="validate[required,minSize[10],maxSize[250]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Testimonial Person</div>
                        <div class="span10">
                            <input type="text" name="person" class="validate[required,minSize[3],maxSize[100]]"/>
                        </div>
                    </div>

                    <div class="row-form">
                        <div class="span2">Person Post</div>
                        <div class="span10">
                            <input type="text" name="post" class="validate[required,minSize[5],maxSize[50]]"/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Link to Profile</div>
                        <div class="span10">
                            <input type="text" name="link" class="validate[required,custom[url],maxSize[250]]"/>
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
                            <button class="btn" type="submit" name="save">Save Testimonial</button>
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
