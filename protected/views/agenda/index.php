
<?php
/* @var $this AgendaController */
/* @var $dataProvider CActiveDataProvider */
setlocale(LC_TIME, 'es_ES.UTF-8');
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Agenda.create'),'url'=>array('create','fecha'=>$fechaMin)),
);
?>
<?php //print_r($semana) ?>
<h1><?php echo Yii::t('app','model.Agenda')
;?></h1>
<div class="row">
<?php echo CHtml::link('< Anterior ',array('Agenda/semana','fecha'=>date('d-m-Y',strtotime('-1 week',strtotime($fechaMin)))),array('class'=>'btn')); ?><?php echo CHtml::link('Siguiente >',array('Agenda/semana','fecha'=>date('d-m-Y',strtotime('+1 week',strtotime($fechaMin)))),array('class'=>'btn')); ?>	
</div>
<table class="table table-bordered table-striped">
	<tr>
		<th class="span1">Bloque</th>
		<?php foreach ($semana as $key => $value) {?>
			<?php if (date('N',strtotime($key)) != 7 && date('N',strtotime($key)) != 6): ?>
				<th class="span2"><?php echo strftime('%A %d de %B',strtotime($key)) ?></th>
			<?php endif ?>
		<?php } ?>
	</tr>
	<?php for($i = 0;$i<6;$i++){ ?>
	<tr>
		<td style="text-align: center; vertical-align:middle;"><?php echo $i+1 ?></td>
		<?php foreach ($semana as $key => $value) {?>
			<?php if (date('N',strtotime($key)) != 7 && date('N',strtotime($key)) != 6): ?>
				<td>
					<?php 
						if(!empty($value)){
							echo '<ul>';
							foreach ($value as $item) {
								if($item->bloque == $i)
									echo '<li>'.$item->texto.'</li>';
							}
							echo '</ul>';
						}
					?>
				</td>
			<?php endif ?>
		<?php } ?>
	</tr>
	<?php if ($i == 1 || $i == 3): ?>
		<tr><td colspan="8"></td></tr>
	<?php endif ?>
	<?php } ?>
	
</table>
