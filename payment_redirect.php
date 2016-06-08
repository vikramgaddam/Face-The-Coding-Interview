<?php 
session_start();
?>
<html>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
<body>
	<form method="post" name="customerData" id="customerDat" action="ccavRequestHandler.php">

			<input type="hidden" name="tid" id="tid" readonly  />

			<input type="hidden" value= "<?php echo $_SESSION['cienciaid']; ?>" name="order_id" type="hidden">
			
			<input type="hidden" name="redirect_url" value="http://ciencia.in/c16/ftci/ccavResponseHandler.php" type="hidden"/>

			<input type="hidden" name="cancel_url" value="http://ciencia.in/c16/ftci/reg_unsucces.html" type="hidden"/>

			<input type="hidden" name="language" value="EN" type="hidden"/>

			<input type="hidden" name="merchant_id" value="92555" type="hidden"/>

			<input type="hidden" name="amount" value="100.00" type="hidden"/>

			<input type="hidden" name="currency" value="INR" type="hidden"/>

			<input type="hidden" name="billing_email" value="<?php echo $_SESSION['email']; ?>" type="hidden"/>

			<input type="hidden" name="billing_name" value="<?php $_SESSION['username']; ?>" type="hidden"/>
	</form>
<script language='javascript'>document.getElementById("customerDat").submit();</script>
</body>
</html>