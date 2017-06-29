<style type="text/css">
    td{
        vertical-align: middle !important;
    }    
</style>

<main ng-init="loadWorkers('<?=base_url();?>');">
    <div class="container">
        <!--
        <a class="btn-floating btn-large waves-effect waves-light red">
            <i class="glyphicon glyphicon-plus"></i>
        </a>
        -->
        <h4>Staff Listing</h4>
        <hr>

        <div ng-class="{'col-xs-12': selected_staff.id, 'col-md-8': selected_staff.id, 'col-md-12': !selected_staff.id}">
            <!-- First review -->
            <div class="media mb-1" ng-repeat="staff in workers">
                <div class="media-left" style="text-align: center !important;">
                    <a class="waves-light">
                        <img class="img-circle" style="width: 6em!important" ng-src="<?=base_url();?>{{staff.profile_image}}" ng-alt="{{staff.first_name}} {{staff.middle_name}} {{staff.last_name}}">
                    </a>
                    <div class="btn-group">
                        <span class="btn btn-xs btn-danger" ng-click="dropWorker(staff);"><i class="glyphicon glyphicon-trash"></i></span>
                        <span class="btn btn-xs" ng-click="setWorker(staff);"><i class="glyphicon glyphicon-pencil"></i></span>
                    </div>
                </div>

                <div class="media-body">
                    <h4 class="media-heading" >
                        <span ng-bind="staff.last_name"></span> <span ng-bind="staff.middle_name"></span> <span ng-bind="staff.first_name"></span>
                    </h4>
                    <ul class="rating inline-ul" style="display: flex;">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <table class="table table-stripped">
                        <tr>
                            <td width="40%">Email:</td>
                            <td> <code ng-bind="staff.email" class=""></code></td>
                        </tr>
                        <tr>
                            <td width="40%">Staff Name</td>
                            <td> 
                                <code ng-bind="staff.last_name" class=""></code> <code ng-bind="staff.middle_name" class=""></code> <code ng-bind="staff.first_name" class=""></code>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">Tel:</td>
                            <td> <code ng-bind="staff._tel" class=""></code></td>
                        </tr>
                        <tr>
                            <td width="40%">Address:</td>
                            <td> <code ng-bind="staff.address" class=""></code></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <div ng-class="{'col-xs-12': selected_staff.id, 'col-md-4': selected_staff.id}" ng-show="selected_staff.id">
            <div class="testimonial-card z-depth-1">
                <div class="card-up default-color-dark">
                </div>
                <div class="avatar">
                    <img ng-src="<?=base_url();?>{{selected_staff.profile_image}}" ng-alt="{{selected_staff.first_name}} {{selected_staff.middle_name}} {{selected_staff.last_name}}" class="img-circle img-responsive">
                </div>
                <div class="card-content">
                    <h5>{{selected_staff.first_name}} {{selected_staff.middle_name}} {{selected_staff.last_name}}</h5>
                    <div class="row">
                        <form class="col-md-12">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <input placeholder="First Name" ng-model="selected_staff.first_name" id="first_name" type="text" class="validate">
                                    <label class="active" for="first_name">First Name</label>
                                </div>
                                <div class="input-field col-md-12">
                                    <input placeholder="Middle Name" ng-model="selected_staff.middle_name" id="middle_name" type="text" class="validate">
                                    <label class="active" for="middle_name">Middle Name</label>
                                </div>
                                <div class="input-field col-md-12">
                                    <input placeholder="Last Name" ng-model="selected_staff.last_name" id="last_name" type="text" class="validate">
                                    <label class="active" for="last_name">Last Name</label>
                                </div>

                                <hr>
                                <div class="input-field col-md-12">
                                    <input placeholder="Email Address" ng-model="selected_staff.email" id="email" type="email" class="validate">
                                    <label class="active" for="email">Email Address</label>
                                </div>
                                <div class="input-field col-md-12">
                                    <input placeholder="Mobile Number" ng-model="selected_staff._tel" id="_tel" type="tel" class="validate">
                                    <label class="active" for="_tel">Mobile Number</label>
                                </div>
                                <div class="input-field col-md-12">
                                    <textarea ng-model="selected_staff.address" idid="address" class="materialize-textarea"></textarea>
                                    <label class="active" for="first_name">Address</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Buttons-->
                <div class="card-btn text-center">
                    <a ng-click="updateWorker('<?=base_url();?>');" class="btn btn-default btn-md waves-effect waves-light">Update</a>
                </div>
                <!--/.Buttons-->
            </div>

        </div>
    </div>
</main>
