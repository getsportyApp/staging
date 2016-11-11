
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
         <section class="content"> 
      <div class="row">
      
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Resource List</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Summary</th>
                  <th>Description</th>
                  <th>Link</th>
                  <th>Sport</th>
                  <th>Location</th>
                  <th style="width: 40px">View</th>
                  <th style="width: 40px">Edit</th>
                  <th style="width: 40px">Delete</th>
                </tr>
                <?php $i =1;
                $resources = $this->register->getResourceInfo();
                if(!empty($resources)){
                        foreach($resources as $resource){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $resource['title']; ?></td>
                    <td><?php echo substr($resource['summary'],0,170); ?></td>
                    <td><?php echo substr($resource['description'],0,170); ?></td>
                    <td><?php echo $resource['url']; ?></td>
                    <td><?php echo $resource['sport']; ?></td>
                    <td><?php echo $resource['location']; ?></td>
                    <td><a href = "<?php echo site_url('forms/viewresources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="View" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/editResources/'.$resource['id']); ?>" class="btn btn-xs btn-default bs-tooltip"  title="Edit" ><i class="glyphicon glyphicon-edit"></i></a></td>
                    <td><a href = "<?php echo site_url('forms/deleteResources/'.$resource['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-default bs-tooltip" title="delete" ><i class="glyphicon glyphicon-remove"></i></a></td>

                   


                </tr>
                <?php } } ?>
              </tbody></table>
            </div>
           
          </div>
      
</div>
</section>
</div>


