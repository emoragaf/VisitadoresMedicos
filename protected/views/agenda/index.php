<?php
/* @var $this AgendaController */
/* @var $dataProvider CActiveDataProvider */
setlocale(LC_TIME, 'es_ES');
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Agenda.create'),'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','model.Agenda')
;?></h1>
<table class="table table-bordered table-striped">
	<tr>
		<th>Bloque</th>
		<?php foreach ($semana as $key => $value) {?>
			<th><?php echo ucfirst(strftime('%A',strtotime($key))) ?></th>
		<?php } ?>
	</tr>
	<?php for($i = 0;$i<7;$i++){ ?>
	<tr>
		<td><?php echo $i ?></td>
		<?php foreach ($semana as $key => $value) {?>
			<td>
				<?php 
					if(!empty($value)){
						foreach ($value as $item) {
							if($item->bloque == $i)
								echo $item->texto;
						}
					}
				?>
			</td>

		<?php } ?>
	</tr>
	<?php } ?>
	
</table>
