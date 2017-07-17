<?php
require_once("aut.php");
$err=true;
$postback=false;
$errmsg="";
if(isset($_POST['save'])){
    $postback=true;
    $text=htmlspecialchars($_POST['text']);
    if(isset($_POST['id'])){
        $i=base64_decode($_POST['id']);
        $sql="UPDATE `fruits` SET `fruit_name`='$text' WHERE `fruit_id`='$i'";
    }
    else {
        $sql = "INSERT INTO `fruits`( `fruit_name`) VALUES ('$text')";
    }
        $r=$conn->query($sql);
    if($r){
        $err=false;
        $errmsg="Details Saved Successfully";
    }else{
        $errmsg="Details was not Saved Successfully";
    }

}
require_once("header.php");
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-archive"></span>
    </div>
    <h1>Categories <small>Items Categories</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <div class="head green">
                <div class="icon"><span class="ico-archive"></span></div>
                <h2>Categories</h2>
            </div>
            <div class="data-fluid">
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
                <table cellpadding="0" cellspacing="0" width="100%" class="table images lcnp">
                    <thead>
                    <tr>
                        <th width="30"><input type="checkbox" class="checkall"/></th>
                        <th>Name</th>
                        <th width="80">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $num_rec_per_page=12;
                    $page=1;
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; }
                    $start_from = ($page-1) * $num_rec_per_page;

                    $slide_sql="SELECT `fruit_id`, `fruit_name`FROM `fruits`   LIMIT $start_from, $num_rec_per_page";
                    $slides=$conn->query($slide_sql);
                    if($slides->num_rows>0){
                        while($row=$slides->fetch_assoc()){
                            $id=base64_encode($row["fruit_id"]);
                            $name=htmlspecialchars($row["fruit_name"]);

                            ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox"/></td>
                                <td class="info"><a href="categories.php?category=<?php echo $id; ?>"><?php echo $name; ?></a> </td>
                                <td>
                                    <a href="categories.php?category=<?php echo $id; ?>" class="button green">
                                        <div class="icon"><span class="ico-pencil"></span></div>
                                    </a>
                                    <a href="categories.php?category=<?php echo $id; ?>" class="button red">
                                        <div class="icon"><span class="ico-remove"></span></div>
                                    </a>
                                </td>
                            </tr>
                        <?php }}?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row-fluid"></div>
        <div class="block">
            <div class="head green">
                <div class="icon"><span class="ico-archive"></span></div>
                <h2>Category</h2>
            </div>
            <div class="data-fluid">
                <form method="post">
                    <div class="row-form">
                        <div class="span2">Category</div>
                        <div class="span6">
                            <?php
                            $txt="";
                            if(isset($_GET['category'])){
                                $cat=base64_decode($_GET['category']);
                            $slide_sql="SELECT `fruit_id`, `fruit_name`FROM `fruits` WHERE `fruit_id`=$cat";
                            $slides=$conn->query($slide_sql);
                            if($slides->num_rows==1){
                                $row=$slides->fetch_assoc();
                                    $id=base64_encode($row["fruit_id"]);
                                    $txt=htmlspecialchars($row["fruit_name"]);
                            ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <?php
                            }}
                            ?>
                            <input type="text" name="text" class="validate[required,minSize[2],maxSize[250]]" value="<?php echo $txt; ?>"/>
                        </div>
                        <div class="span4">
                            <button class="btn" type="submit" name="save">Save Category</button>
                            <a class="btn btn-info" href="categories.php" >New Category</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="pagination pagination-centered">
        <ul>
            <?php
            $a="SELECT `fruit_id`, `fruit_name`FROM `fruits` ";
            $c= $conn->query($a);
            $total_records=$c->num_rows;
            $total_pages = ceil($total_records / $num_rec_per_page);
            echo "<li><a href='categories.php?page=1'>&laquo;</a></li>";
            for ($i=1; $i<=$total_pages; $i++) {
                if($i==$page)
                    echo "<li class='active'><a href='categories.php?page=$i'>$i</a></li>";
                else
                    echo "<li><a href='categories.php?page=$i'>$i</a></li>";

            }
            $i--;
            echo "<li><a href='categories.php?page=$i'>&raquo;</i></a></li>";

            ?>
        </ul>
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

<script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>

<script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>

<script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>

<script type='text/javascript' src='js/plugins.js'></script>
<script type='text/javascript' src='js/charts.js'></script>
<script type='text/javascript' src='js/actions.js'></script>
