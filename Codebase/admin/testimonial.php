<?php
require_once("aut.php");
require_once("header.php");
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
            <div class="head purple">
                <div class="icon"><span class="ico-pen"></span></div>
                <h2>Testimonial List</h2>
            </div>
            <div class="data-fluid">
                <table cellpadding="0" cellspacing="0" width="100%" class="table images lcnp">
                    <thead>
                    <tr>
                        <th width="30"><input type="checkbox" class="checkall"/></th>
                        <th >Testimonial</th>
                        <th>Person</th>
                        <th>Post</th>
                        <th width="30">Status</th>
                        <th width="80">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $num_rec_per_page=10;
                    $page=1;
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; }
                    $start_from = ($page-1) * $num_rec_per_page;

                    $slide_sql="SELECT * FROM `testomonial`  LIMIT $start_from, $num_rec_per_page";
                    $slides=$conn->query($slide_sql);
                    if($slides->num_rows>0){
                        while($row=$slides->fetch_assoc()){
                            $id=base64_encode($row["testmonial_id"]);
                            $person=$row["testomonial_person"];
                            $text=$row["testomonial_text"];
                            $post=$row["testomonial_post"];
                            $link=$row["testomonial_link"];
                            $active=intval($row["testmonial_active"])==1?"checked":"";
                            ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox"/></td>

                                <td class="info"><?php echo $text; ?></td>
                                <td class="info"><a href="<?php echo $link; ?>"><?php echo $person; ?></a> </td>
                                <td><?php echo $post; ?></td>
                                <td><input type="checkbox" <?php echo $active; ?>/></td>

                                <td>
                                    <a href="edit_testimonial.php?testimonial=<?php echo $id; ?>" class="button green">
                                        <div class="icon"><span class="ico-pencil"></span></div>
                                    </a>
                                    <a href="edit_testimonial.php?testimonial=<?php echo $id; ?>" class="button red">
                                        <div class="icon"><span class="ico-remove"></span></div>
                                    </a>
                                </td>
                            </tr>
                        <?php }}?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="pagination pagination-centered">
        <ul>
            <?php
            $a="SELECT * FROM `testomonial` ";
            $c= $conn->query($a);
            $total_records=$c->num_rows;
            $total_pages = ceil($total_records / $num_rec_per_page);
            echo "<li><a href='testimonial.php?page=1'>&laquo;</a></li>";
            for ($i=1; $i<=$total_pages; $i++) {
                if($i==$page)
                    echo "<li class='active'><a href='testimonial.php?page=$i'>$i</a></li>";
                else
                    echo "<li><a href='testimonial.php?page=$i'>$i</a></li>";

            }
            $i--;
            echo "<li><a href='testimonial.php?page=$i'>&raquo;</i></a></li>";

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
