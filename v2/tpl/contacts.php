<form action="/sendmail"
      method="POST"
	  id="mailForm">
    <table>
		<tr>
			<td>
				<?php echo T('name');?>:
			</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				<?php echo T('email');?>:
			</td>
			<td>
				<input type="email" name="_replyto">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo T('Message');?>:<br>
				<textarea name="message" cols=80 rows=10></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="button" id="btn_sendMail" value="Senden">				
				<div class="done" id="saveMsg"><?php echo T('mail sent');?></div>
			</td>
		</tr>
	</table>
</form>

<script language="javascript">
$(function() {
    $('#btn_sendMail').click(function( event ) {
		event.preventDefault();
		$.post( $('#mailForm').attr( "action" ), $('#mailForm').serialize(), function(data) {
			$('#saveMsg').show(500);
			setTimeout(function() {	$('#saveMsg').hide() }, 5000);
		}, "json");
	});	
});
</script>

			