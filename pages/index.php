<?
loadModal('modalTest');
if (!$auth->id) {
echo includeError('notLoggedIn');
}
?>     	
     	<div class="jumbotron">
        	<h1>Gaben is our god.</h1>
        	<p class="lead">It's a revolution, and you know we can't be denied.<br /> Sign in to Steam and check special offers!<br />420 do it fggt.<br />For real.</p>
        	<a class="btn btn-large btn-success" role="button" data-toggle="modal" href="#modalTest">No, really, i'm deadly serious.</a>
        </div>
		<div class="row-fluid">
	        <div class="span4" style="margin:0 auto; float:none; text-align: center;">
	        	<h2><?  print_r($_SESSION);?></h2>
	        	<p style="text-align: center;"><? echo $auth->id; ?></p>
	        	<p><a href="#" class="btn">erridei</a></p>
			</div>
		</div>
      <div class="row-fluid">
	        <div class="span4">
	        	<h2>Heading</h2>
	        	<p style="text-align: justify;">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	        	<p><a href="#" class="btn">View details »</a></p>
	        </div>
	        <div class="span4">
	        	<h2>Heading</h2>
	        	<p style="text-align: justify;">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	        	<p><a href="#" class="btn">View details »</a></p>
	       	</div>
	        <div class="span4">
	        	<h2>Heading</h2>
	        	<p style="text-align: justify;">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
	        	<p><a href="#" class="btn">View details »</a></p>
	        </div>
      </div>

<script>  
$(document).ready(function () { 
	$("#test").popover({
		title: 'Test title <sup><span class="label label-important">1</span></sup>',
		content: 'Test content',
		trigger:'hover', placement:'left',
		delay: { show: 100, hide: 1000 }, html:true });

	$("#swagoverload").popover({
		title: 'Test title 2',
		content: '<p style="text-align: justify;">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>',
		trigger:'hover', placement:'top',
		delay: { show: 100, hide: 1000 }, html:true });

});



/*$(document).ready(function(){
$("#errorReport").modal({show:true}); 
});*/


</script>

    <script>
    $(function () {
    $('#myTab a:last').tab('show');
    })
    </script>