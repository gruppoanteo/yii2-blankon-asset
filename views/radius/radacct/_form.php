<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'radacct-form',
	'layout' => 'vertical',
	'enableAjaxValidation' => false,
	'focus'=>array($model,'acctsessionid'),
)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctsessionid',array('class'=>'input-xlarge','maxlength'=>64)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctuniqueid',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'username',array('class'=>'input-xlarge','maxlength'=>64)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'groupname',array('class'=>'input-xlarge','maxlength'=>64)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'realm',array('class'=>'input-xlarge','maxlength'=>64)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'nasipaddress',array('class'=>'input-xlarge','maxlength'=>15)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'nasportid',array('class'=>'input-xlarge','maxlength'=>15)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'nasporttype',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctstarttime',array('class'=>'input-xlarge')); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctstoptime',array('class'=>'input-xlarge')); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctsessiontime',array('class'=>'input-xlarge')); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctauthentic',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'connectinfo_start',array('class'=>'input-xlarge','maxlength'=>50)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'connectinfo_stop',array('class'=>'input-xlarge','maxlength'=>50)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctinputoctets',array('class'=>'input-xlarge','maxlength'=>20)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctoutputoctets',array('class'=>'input-xlarge','maxlength'=>20)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'calledstationid',array('class'=>'input-xlarge','maxlength'=>50)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'callingstationid',array('class'=>'input-xlarge','maxlength'=>50)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctterminatecause',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'servicetype',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'framedprotocol',array('class'=>'input-xlarge','maxlength'=>32)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'framedipaddress',array('class'=>'input-xlarge','maxlength'=>15)); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctstartdelay',array('class'=>'input-xlarge')); ?>
		
	<?php echo $form->textFieldControlGroup($model,'acctstopdelay',array('class'=>'input-xlarge')); ?>
		
	<?php echo $form->textFieldControlGroup($model,'xascendsessionsvrkey',array('class'=>'input-xlarge','maxlength'=>10)); ?>
	
	<div class="form-actions">
		<?php echo TbHtml::submitButton('Update',array('color'=>'primary')); ?>
		<?php echo TbHtml::linkButton('Annulla',array('url'=>array('index'))); ?>
	</div>
<?php $this->endWidget(); ?>