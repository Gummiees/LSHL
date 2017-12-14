  	
  			</div>
			</div>
    		<div class="tab-pane fade" id="send" role="tabpanel" aria-labelledby="send-tab">
    		
    		</div>
  		</div>
		</div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})

MarkAsViewed = i => {
  var mid = document.getElementById(i).innerHTML;
  $.post("messages.php",{ message_id:mid, action:'viewed' }, () => {location.reload();});
}

DeleteMessage = i => {
  var mid = document.getElementById(i).innerHTML;
  $.post("messages.php",{ message_id:mid, action:'del' }, () => {location.reload();});
}
</script>