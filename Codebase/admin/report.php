<?php
require_once("aut.php");
require_once("header.php");
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-address-book-2"></span>
    </div>
    <h1>Reports <small>All about reports</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form method="post" target="_blank" action="reportviewer.php">
            <div class="data-fluid">
                <div class="row-form">
                    <div class="span4"><h5>Today Report</h5></div>
                    <div class="span8">
                        <button class="btn" type="submit" name="save">Today's Report</button>
                    </div>
                </div>

            </div>
        </form>
        <form method="post" target="_blank" action="reportviewer.php">
            <div class="data-fluid">
                <div class="row-form">
                    <div class="span12"><h5>Report by Date</h5></div>
                </div>
                <div class="row-form">
                    <div class="span3">Starting Date</div>
                    <div class="span3"><input type="date" name="date1" required/> </div>
                    <div class="span3">Ending Date</div>
                    <div class="span3"><input type="date" name="date2" required/> </div>
                </div>
                <div class="row-form">
                    <div class="span12">
                        <button class="btn" type="submit" name="save">View Report</button>
                    </div>
                </div>

            </div>
        </form>
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
