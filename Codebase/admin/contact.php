<?php
require_once("aut.php");
require_once("header.php");
$err=true;
$postback=false;
$errmsg="";
$q="SELECT `ptcl`, `mobile1`, `mobile2`, `email`, `facebook`, `twitter`, `rss`, `mapx`, `mapy` FROM `contact`";
$rre=$conn->query($q);
$row=$rre->fetch_assoc();
$ptcl=$row['ptcl'];
$mob1=$row['mobile1'];
$mob2=$row['mobile2'];
$email=$row['email'];
$fb=$row['facebook'];
$tw=$row['twitter'];
$rss=$row['rss'];
$mapx=$row['mapx'];
$mapy=$row['mapy'];
if(isset($_POST['save'])){
$postback=true;
    $ptcl=htmlspecialchars($_POST['ptcl']);
    $mob1=htmlspecialchars($_POST['mob1']);
    $mob2=htmlspecialchars($_POST['mob2']);
    $email=htmlspecialchars($_POST['email']);
    $fb=htmlspecialchars($_POST['fb']);
    $tw=htmlspecialchars($_POST['tw']);
    $rss=htmlspecialchars($_POST['rss']);
    $mapx=$_POST['mapx'];
    $mapy=$_POST['mapy'];
    $sql="UPDATE `contact` SET `ptcl`='$ptcl',`mobile1`='$mob1',`mobile2`='$mob2',`email`='$email',`facebook`='$fb',`twitter`='$tw',`rss`='$rss',`mapx`='$mapx',`mapy`='$mapy'";
    $r=$conn->query($sql);
    if($r){
        $msg= "Contact details Saved Successfully<br>";
        $err=false;
    }
    else{
        $errmsg.= "Sorry, there was an error while saving contact details.<br>";
    }
}
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-envelope"></span>
    </div>
    <h1>Contact Details <small>Update your company details</small></h1>
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
                <div class="icon"><span class="ico-envelope"></span></div>
                <h2>Company Contact Details</h2>
            </div>
            <form id="validate" method="POST">
                <div class="data-fluid">

                    <div class="row-form">
                        <div class="span3">Email:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope icon-white"></i></span>
                                <input type="email" name="email" class="validate[required,custom[email]]" value="<?php echo $email; ?>"/>
                            </div>
                            <span class="bottom">Company email for contact</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">PTCL:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-home icon-white"></i></span>
                                <input type="tel" name="ptcl" value="<?php echo $ptcl; ?>"/>
                            </div>
                            <span class="bottom">Company PTCL Number for contact</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Mobile:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-bell icon-white"></i></span>
                                <input type="tel" name="mob1" value="<?php echo $mob1; ?>"/>
                            </div>
                            <span class="bottom">Company Mobile Number for contact</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Mobile (Alternate):</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-bell icon-white"></i></span>
                                <input type="tel" name="mob2" value="<?php echo $mob2; ?>"/>
                            </div>
                            <span class="bottom">Company Mobile Number for contact</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Facebook:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-arrow-next icon-white"></i></span>
                                <input type="text" name="fb" class="validate[required,custom[url]]"value="<?php echo $fb; ?>"/>
                            </div>
                            <span class="bottom">Company Facebook Page Address</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Twitter:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-arrow-next icon-white"></i></span>
                                <input type="text" name="tw" class="validate[required,custom[url]]" value="<?php echo $tw; ?>"/>
                            </div>
                            <span class="bottom">Company Twitter Account</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">RSS Feed:</div>
                        <div class="span9">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-arrow-next icon-white"></i></span>
                                <input type="text" name="rss" class="validate[required,custom[url]]" value="<?php echo $rss; ?>"/>
                            </div>
                            <span class="bottom">Company RSS Feed Link</span>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Google Map (longitude):</div>
                        <div class="span3">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-arrow-next icon-white"></i></span>
                                <input type="text" name="mapx"   value="<?php echo $mapx; ?>"/>
                            </div>
                            <span class="bottom">Company Google Map X coordinate</span>
                        </div>
                        <div class="span3">Google Map (latitude):</div>
                        <div class="span3">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-arrow-next icon-white"></i></span>
                                <input type="text" name="mapy" value="<?php echo $mapy; ?>"/>
                            </div>
                            <span class="bottom">Company Google Map Y coordinate</span>
                        </div>
                    </div>
                    <div class="row-form">

                    </div>

                    <div class="toolbar bottom tar">
                        <div class="btn-group">
                            <button class="btn" type="submit" name="save">Update Details</button>
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
