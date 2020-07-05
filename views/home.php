<html>
	<head>
	</head>
	<body>
		
		<form method="post" action="<?php echo Request::base_url( "home/success" );?>">
			<input type="text" name="Username" />
			<input type="hidden" name="token" value="<?php echo $this->token->getToken()?>" />
			<input type="submit" name="Submit" value ="Submit"/>
		</form>
		
	</body>
</html>