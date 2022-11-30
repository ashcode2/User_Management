 

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "pdf_reciept/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			// print "The file name already exists!!";
			?>
			<script>alert("The file name already exists!!");</script>
			<?php
 		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				// print "Pdf reciept uploaded successfully!";
			?>
						<script>alert("Pdf reciept uploaded successfully!");</script>

		<?php
		}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading reciept : ".$_FILES['pdfFile']['name']."<br/>";
			// print "Invalid  file extension, should be pdf !!"."<br/>";
			// print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>
