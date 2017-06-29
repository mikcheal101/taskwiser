<main ng-init="loadPrices('<?=base_url();?>');">
    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
        	<h4 class="col-xs-12">
                Prices
                <small>click the amount to edit</small>
            </h4>

            <form class="col-xs-12" novalidate="novalidate" ng-show="selected_item.aRes">
                <div class="row">
                    <div class="input-field col-xs-12">
                        <input placeholder="enter amount" id="amount" name="amount" ng-model="selected_item.aRes" ng-change="priceChange();" type="text">
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-xs-12 ">
                        <button ng-click="updatescPrice(); selected_item = {};" class="pull-right btn btn-sm btn-default waves-effect waves-light">save / update</button>
                    </div>
                </div>
            </form>
            
            <table class="table table-stripped col-xs-12">
                <thead>
                    <th width="30%">Category</th>
                    <th>Sub Details</th>
                </thead>
                <tbody>
                    <tr ng-repeat="price in prices">
                        <td><span ng-bind="price._category"></span></td>
                        <td>
                            <table width="100%" class="table table-stripped">
                                <tr ng-repeat="(key, item) in price._items_prices">
                                    
                                    <td ng-if="key === 'prices' && key !== 'durations'" width="40%" ng-bind="key"></td>
                                    
                                    <td ng-if="key != 'prices' && key != 'durations'" width="64%" ng-bind="key"></td>
                                    <td ng-if="key != 'prices' && key != 'durations'" style="text-align: right;">
                                        <a ng-click="setSelected(price, key, item, null);" ng-bind="item | currency: '₦ ' : 2"></a>
                                    </td>

                                    <td ng-if="key === 'prices' && key !== 'durations'" >
                                        <table width="100%" ng-if="key === 'prices' || key === 'durations'">
                                            <tr ng-repeat="(k, v) in item">
                                                <td width="40%" ng-bind="k"></td>
                                                <td style="text-align: right;">
                                                    <a ng-click="setSelected(price, key, k, v);" ng-bind="v | currency: '₦ ' : 2"></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!--/.First row-->

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

