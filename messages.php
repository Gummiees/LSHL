<?php
require ('mysqli_connect.php');
include ('includes/header.php');
include('includes/print_messages.php');

?>
<style>
.messages-title a:link,
.messages-title a:visited,
.messages-title a:hover,
.messages-title a:active {
	color: #8E44AD;
	text-decoration: none;
}

.messages-title .title-name {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
<div class="row">
	<div class="col-sm-1"></div>
  <div class="col-sm-2">
    <a href="#" class="btn btn-primary btn-sm btn-block" role="button">New message&nbsp;&nbsp;&nbsp;<span class="fa fa-envelope-o" aria-hidden="true"></span></a>
	</div>
  <div class="col-sm-7">
  	<div id="accordion" role="tablist" aria-multiselectable="true">
  		

  		<div class="card">
		    <div class="card-header" role="tab" id="headingOne">
		      <h5 class="mb-0">
		      	<div class="row">
			      	<div class="col-sm-10 messages-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				        	<div class="row">
								    <div class="col-sm-3"><span>likefurnis</span></div>
								    <div class="col-sm-7 title-name"><span><b>This is a title</b></span></div>
								    <div class="col-sm-2"><span class="badge">12:10 AM</span></div>
							  	</div>
				        </a>
				      </div>
				      <div class="col-sm-2" style="text-align: right;">
						    <a href="#" data-toggle="tooltip" title="Mark as viewed"><span class="material-icons">mail</span></a>
				        <a href="#" data-toggle="tooltip" title="Reply"><span class="material-icons">reply</span></a>
				        <a href="#" data-toggle="tooltip" title="Delete"><span class="material-icons">delete_forever</span></a>
				      </div>
				   	</div>
		      </h5>
		    </div>
		    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="card-block" style="margin: 20px; text-align: justify;">
		      	<h5>This is a title</h5>
	        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		      </div>
		    </div>
		  </div>

  		<div class="card">
		    <div class="card-header" role="tab" id="headingTwo">
		      <h5 class="mb-0">
		      	<div class="row">
			      	<div class="col-sm-10 messages-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							    <div class="row">
								    <div class="col-sm-3"><span>likefurnis</span></div>
								    <div class="col-sm-7 title-name"><span><b>abcdefghijklmnopqrstvwxyzabcdefghijklmnopqrstvwxyz</b></span></div>
								    <div class="col-sm-2"><span class="badge">12:10 AM</span></div>
							  	</div>
				        </a>
				      </div>
				      <div class="col-sm-2" style="text-align: right;">
						    <a href="#" data-toggle="tooltip" title="Mark as viewed"><span class="material-icons">mail</span></a>
				        <a href="#" data-toggle="tooltip" title="Reply"><span class="material-icons">reply</span></a>
				        <a href="#" data-toggle="tooltip" title="Delete"><span class="material-icons">delete_forever</span></a>
				      </div>
				   	</div>
		      </h5>
		    </div>
		    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="card-block" style="margin: 20px; text-align: justify;">
		      	<h5>abcdefghijklmnopqrstvwxyzabcdefghijklmnopqrstvwxyz</h5>
	        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		      </div>
		    </div>
		  </div>

  		<div class="card">
		    <div class="card-header" role="tab" id="headingThree">
		      <h5 class="mb-0">
		      	<div class="row">
			      	<div class="col-sm-10 messages-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							    <div class="row">
								    <div class="col-sm-3"><span>likefurnis</span></div>
								    <div class="col-sm-7 title-name"><span>This is a title</span></div>
								    <div class="col-sm-2"><span class="badge">12:10 AM</span></div>
							  	</div>
				        </a>
				      </div>
				      <div class="col-sm-2" style="text-align: right;">
						    <a href="#" data-toggle="tooltip" title="Mark as viewed"><span class="material-icons">drafts</span></a>
				        <a href="#" data-toggle="tooltip" title="Reply"><span class="material-icons">reply</span></a>
				        <a href="#" data-toggle="tooltip" title="Delete"><span class="material-icons">delete_forever</span></a>
				      </div>
				   	</div>
		      </h5>
		    </div>
		    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="card-block" style="margin: 20px; text-align: justify;">
		      	<h5>This is a title</h5>
	        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		      </div>
		    </div>
		  </div>

    </div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php

include ('includes/footer.html');
mysqli_close($dbc);
?>