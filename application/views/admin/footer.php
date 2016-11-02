	<footer>
	
	</footer>


	<script type="text/javascript" src="<?=base_url ('assets/admin/js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/tether.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/admin/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/admin/js/mdb.min.js');?>"></script>
	<script type="text/javascript">
		function openPassport () {
			$('#passport').click ();
		};

		$('#passport').change(function () {
			// file has changed
			var file = $(this).val();
			readURL(this);
		});
		
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#passport_placeholder').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
	</script>
</body>
</html>