<?php session_start();

include 'includes/static/header.php'; ?>

<div class="container">
	
	<div class="row">
		
		<div class="col bpm-col-4">

			<h2>Operation Generator</h2>
			
			<form action="generate/operations.php" class="operations" method="post">

				<label for="initial-digits">Amount of digits in initial number</label>
				<input type="number" name="initial-digits" value="1" min="1">
				
				<label for="initial">Operator</label>
				<div class="select-style">
					<select name="operator" class="operations__select-operator">
						<option value="default" selected disabled>Select an operator</option>
						<option value="addition">Addition</option>
						<option value="subtraction">Subtraction</option>
						<option value="multiplication">Mulitplication</option>
						<option value="division">Division</option>
					</select>
				</div>

				<label for="actor-digits">Amount of digits in acting number</label>
				<input type="number" name="actor-digits" value="1" min="1">

				<label for="questions-amount">Amount of questions</label>
				<input type="number" name="questions-amount" value="10" min="0">
				<br>
				<input type="submit" class="btn-primary" value="Generate!">
				
			</form>

		</div>

		<div class="col bpm-col-6 right">

			<div class="btn-primary btn-copy">Copy Result</div>

			<span class="copy-target">

				<?php

				if (isset($_SESSION['result'])) {
					echo $_SESSION['result'];
				} else if (isset($_SESSION['error'])) {
					echo $_SESSION['error'];
				}

				session_unset();

				?>

			</span>

		</div>

	</div>

</div>



<?php include 'includes/static/footer.php'; ?>