	<footer>
	
	</footer>


	<script type="text/javascript" src="<?=base_url ('assets/admin/js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/tether.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/admin/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/admin/js/mdb.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/angular.min.js');?>"></script>
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

		$(document).ready(function(){
			$('select').material_select();
			checkState($('#is_state'));
		});

		function checkState (param) {
			var _this 	= param;
			var _city 	= $('.city');
			var _six	= $('.sixer');

			if(_this.is(':checked')){
				console.log('checked');
				_six.removeClass('col-md-4')
					.delay(1)
					.addClass('col-md-6');

				_city.hide()
					.delay(1)
					.fadeOut(1);;
			} else {
				_six.removeClass('col-md-6')
					.delay(0)
					.addClass('col-md-4');

				_city.hide()
					.delay(1000)
					.fadeIn(1);
			}
		};

		$('#is_state').change(function(evt){
			checkState($(this));
		});

		function changeSwitch(){
			console.log(this);
		}
	</script>
</body>
</html>