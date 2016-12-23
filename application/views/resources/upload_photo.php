<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <h2 class="box-title"><b>Resource List</b></h2>
               </div>
               <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
               <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
               <th style="background: #5262bc; color:#ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               <th style="background: #5262bc; color: #ffffff;">Summary <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
             
               <th style="background: #5262bc; color: #ffffff;">Image Upload<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               <th style="background: #5262bc; color: #ffffff;">Save Image  <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               </tr>
               </thead>
		        	 <tbody>
               
                  <?php 
                       $i=1; 
                       foreach ($resourcesArray as $res) {
                       $resource=$this->register->getResourceInfo($res);      
                    ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="width:300px"><?php echo $resource[0]['title']; ?></td>
                    <td style="width:300px"><?php echo substr($resource[0]['summary'],0,170); ?></td>	

                      <td><body ng-app="main-App" ng-controller="AdminController">
                      <form ng-submit="submit()" name="form" role="form">

                      <input type="text"  name="resid"  ng-value="<?php echo $resource[0]['id']; ?>"> 
                      <input ng-model="form.image" type="file" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:300px;height: 0%;"></td>

                       <td style="text-align: center;" ><input type="submit" id="submit" value="Submit" /></td>
                      
                        </form>
                </tr>
                <?php  }?>
                </tbody>
                <tfoot>
                 <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title</th>
                  <th style="background: #5262bc; color: #ffffff;">Summary</th>
                  <th style="background: #5262bc; color: #ffffff;">Image Upload</th>
                  <th style="background: #5262bc; color: #ffffff;">Save Image </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  <div class="control-sidebar-bg"></div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

 <script type="text/javascript">

      var app =  angular.module('main-App',[]);
      app.controller('AdminController', function($scope, $http) {
      $scope.form = [];
      $scope.files = [];
      $scope.submit = function() {
      $scope.form.image = $scope.files[0];
      $http({
        method  : 'POST',
        url     : '<?php echo site_url('forms/uploadimg');?>',
        processData: false,
        transformRequest: function (data) {
            var formData = new FormData();
            formData.append("image", $scope.form.image);  
            formData.append("resid", $scope.resid);
              

            

            return formData;  
        },  
      
        data : $scope.form,
        headers: {
               'Content-Type': undefined
        }
       }).success(function(data){
            alert(data);
       });
        };
        $scope.uploadedFile = function(element) {
        $scope.currentFile = element.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
          $scope.image_source = event.target.result
          $scope.$apply(function($scope) {
            $scope.files = element.files;
          });
        }
          reader.readAsDataURL(element.files[0]);
      }
      });
  </script>








