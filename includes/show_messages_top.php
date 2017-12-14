<style>
.messages-title a:link,
.messages-title a:visited,
.messages-title a:hover,
.messages-title a:active,
.message-buttons a:link,
.message-buttons a:visited,
.message-buttons a:hover,
.message-buttons a:active {
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
    <a href="new_message.php" class="btn btn-primary btn-sm btn-block" role="button">New message&nbsp;&nbsp;&nbsp;<span class="fa fa-envelope-o" aria-hidden="true"></span></a>
	</div>
  <div class="col-sm-7">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Inbox</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="send-tab" data-toggle="tab" href="#send" role="tab" aria-controls="send" aria-selected="false">Send</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div id="accordion" role="tablist" aria-multiselectable="true">
      