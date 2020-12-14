<div>
  <div>
    <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="sort" data-sort="name">Product Id</th>
                <th scope="col" class="sort" data-sort="budget">Product Parent Id</th>
                <th scope="col" class="sort" data-sort="status">Product Name</th>
                <th scope="col" class="sort" data-sort="completion">Link</th>
                <th scope="col" class="sort" data-sort="completion">Product Status</th>
                <th scope="col" class="sort" data-sort="completion">Product Launch Date</th>
            </tr>
        </thead>
        <?php 
            foreach($store as $key=> $value) { ?>
        <tbody class="list">
            
            <tr>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="name mb-0 text-sm"><?php echo $value['id'] ?></span>
                        </div>
                    </div>
                </th>
                <td class="budget">
                <?php echo $value['prod_parent_id'] ?>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['link'] ?></span>
                    </span>
                </td>
               
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['prod_available'] ?></span>
                    </span>
                </td>

                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status"><?php echo $value['Prod_launch_date'] ?></span>
                    </span>
                </td>
               
            </tr>            
        </tbody><?php
         }?>
    </table>
</div>

</div>