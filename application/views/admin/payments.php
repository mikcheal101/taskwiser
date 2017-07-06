<main ng-init="sales.init('<?=base_url();?>')">
	<!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
        	<h4 class="col-xs-12">
                Payments
            </h4>

            <table class="table table-stripped col-xs-12">
            	<tr>
            		<th width="40%">Date</th>
            		<th>Amount</th>
            	</tr>
                <tr ng-repeat="item in sales.data track by item._id">
                    <td><span ng-bind="item._ts | date:'fullDate'"></span></td>
                    <td><span ng-bind="item._amt | currency:'₦ ':2"></span></td>
                </tr>
            </table>
        </div>

		<div class="row">
            <div class="col-xs-12">
                <h5 class="m-b-0">Taskwiser Admin Interface.</h5>
                <small class="m-t-0">powered by bujamb Nigeria Limited &copy;<?=date('Y');?></small>
                <hr>
            </div>
        </div>

    </div>
    <!--/.Main layout-->
</main>
