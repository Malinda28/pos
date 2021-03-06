<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */

$this->breadcrumbs=array(
	'Restaurant Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Restaurant_items', 'url'=>array('index')),
	array('label'=>'Create Restaurant_items', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restaurant-items-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Manage Restaurant Items<?//=$action ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->


<div class="search-form" style="display:none">
<!--?php $this->renderPartial('_search',array(
	'searchmodel'=>$searchmodel,
)); ?-->
</div><!-- search-form -->

<!--?php/*  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kitchen-ingrediants-grid',
	'dataProvider'=>$searchmodel->search(),
	'filter'=>$searchmodel,
	'columns'=>array(
		'ingrediant_id',
		'ingrediant_name',
		'ingrediant_qty',
		'unit',
		array(
			'class'=>'CButtonColumn',
		),
	),
));  */?-->
<table id="table-data" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
								<th>Item ID </th>
                                <th>Name </th>
								<th>Regular Price </th>
                                <th>Large Price</th>
								<th>Description</th>
								<th>Tools</th>
                               
                                
								
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM res_items";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['res_item_id'] ?>', '<?php echo $row1['item_name'] ?>', '<?php echo $row1['regular_price'] ?>' ,'<?php echo $row1['large_price'] ?> ,'<?php echo $row1['item_description'] ?>' ?>')">
                                    <td><?php echo $row1['res_item_id']; ?></td>
                                    <td><?php echo $row1['item_name']; ?></td>
									 <td><?php echo 'Rs ',$row1['regular_price']; ?></td>
                                    <td><?php echo  'Rs ',$row1['large_price']; ?></td>
									<td><?php echo  $row1['item_description']; ?></td>
                                    
									
                                    
									<td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=RestaurantItems/update&id=<?php echo $row1['res_item_id'];?>"><i class="fa fa-pencil"></i></a>
				   </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>	 				
</div>
</div></div>
</div>
</div>