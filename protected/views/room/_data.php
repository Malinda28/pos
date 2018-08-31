<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'Room'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kitchen-ingrediants-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Manage Rooms<?//=$action ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->


<div class="search-form" style="display:none">

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
                            <tr><th>Room No</th>
                                <th>Type</th>
								<th>Content</th>
								<th>Availability</th>
								<th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * 
							FROM room r, room_type t
							WHERE t.type_id=r.type";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                               <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['room_no'] ?>', '<?php echo $row1['facility'] ?>'?>' ?>')">
                                    <td><?php echo $row1['room_no']; ?></td>
                                    <td><?php echo $row1['facility']; ?></td>
									 <td><?php echo $row1['content']; ?></td>
									 <td >
									<?php 
									if($row1['availability']=="Y")
										
									{
										echo CHtml::link("<span class = 'label-success label'> Available</span>",array('room/Room_d',
                                         'id'=>$row1['room_no'] ));
										 
                                     
										} 
									else {echo CHtml::link("<span class ='label-danger label'> Not Available</span>",array('room/Room_a',
                                         'id'=>$row1['room_no'] ));
									
									}?></td>
									<td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=room/update&id=<?php echo $row1['room_no'];?>"><i class="fa fa-pencil"></i></a>
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
