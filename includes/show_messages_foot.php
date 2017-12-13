  	</div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

function MarkAsViewed(i) {
   var mid = document.getElementById(i).innerHTML;
   $.post("messages.php",{ message_id:mid } ,function(data) {
       //more codes
   });
}
</script>