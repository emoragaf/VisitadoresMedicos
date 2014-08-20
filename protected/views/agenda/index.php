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
		<th class="span1">Bloque</th>
		<?php foreach ($semana as $key => $value) {?>
			<th class="span2"><?php echo ucfirst(strftime('%A',strtotime($key))) ?></th>
		<?php } ?>
	</tr>
	<?php for($i = 0;$i<6;$i++){ ?>
	<tr>
		<td style="text-align: center; vertical-align:middle;"><?php echo $i+1 ?></td>
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
	<?php if ($i == 1 || $i == 3): ?>
		<tr><td colspan="8"></td></tr>
	<?php endif ?>
	<?php } ?>
	
</table>
