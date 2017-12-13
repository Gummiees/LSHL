  	</div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

function MarkAsViewed(i) {
  var mid = document.getElementById(i).innerHTML;
  $.post("messages.php",{ message_id:mid, action:'viewed' }, function(data) {location.reload();});
}

function DeleteMessage(i) {
  var mid = document.getElementById(i).innerHTML;
  $.post("messages.php",{ message_id:mid, action:'del' }, function(data) {location.reload();});
}
</script>