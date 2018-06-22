<?php
    if (isset($_SESSION["login"])) {
        echo $_SESSION["login"];
?>
		<form action="logout.php" method="POST">
			<p>				
				<input type="submit" value="Sair">
			</p>
		</form>
<?php
    } else {
        echo "<script> alert('Você não está logado')</script>";
        echo "<script> location.href = ('index.php')</script>";
    }
?>
