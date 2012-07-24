<!--<div class="center"><img src="<?= base_url() ?>images/Large_OIRLogo.png" width="150" height="164" border="0" alt="<?= $page_title ?> Documentation" /></div>-->
<div class="doc_create_form">
	<h1>Welcome to Afterburner!</h1>
    <p>An Afterburner is used to add thrust to an already existing engine.  As documentation is normally done after the fact (come on now, don't kid yourself), this tool is used to speed up the generation of Codeigniter-style documentation.  You'll find AB surprisingly simple, but if you have ever used the CI User Guide as a template for documentation you'll also find that it fills a space that was heretofore unoccupied.  Do what you said you would do months or even years ago:  document your work for your users and developers.</p>
</div>
<div class="doc_create_form">&nbsp;</div>
<div class="doc_create_form">
<h1>Create your config file!</h1>
<table>
	<?= form_open_multipart('index.php/ab/setup_afterburner')?>
	<?php $data = array(
              'name'        => 'localhost',
              'id'          => 'localhost',
              'value'       => 'localhost',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
           ?>
<tr>
	<td>
		<?= form_label('Hostname ', 'localhost');?>
	</td>
	<td>
		<?= form_input($data);?>
	</td>
</tr>
	<?php $data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
?>
<tr>
	<td>
		<?= form_label('Username ', 'username');?>
	</td>
	<td>
		<?= form_input($data);?>
	</td>
</tr>
	<?php $data = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
?>
<tr>
	<td>
		<?= form_label('Password ', 'password');?>
	</td>
	<td>
		<?= form_password($data);?>
	</td>
</tr>
	<?php $data = array(
              'name'        => 'database',
              'id'          => 'database',
              'value'       => 'afterburner',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
?>
<tr>
	<td>
		<?= form_label('Database ', 'database');?>
	</td>
	<td>
		<?= form_input($data);?>
	</td>
</tr>
	<?php $data = array(
              'name'        => 'driver',
              'id'          => 'driver',
              'value'       => 'mysql',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
?>
<tr>
	<td>
		<?= form_label('Driver ', 'driver');?>
	</td>
	<td>
		<?= form_input($data);?>
	</td>
</tr>
	<?php $data = array(
              'name'        => 'logo',
              'id'          => 'logo',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
?>
<tr>
	<td>
		<?= form_upload('logo ', 'logo');?>
	</td>
</tr>
<tr>
	<td style="float:right;">
		<?=  form_submit('mysubmit', 'Create Configuration');?>
	</td>
</tr>
	<?= form_close()?>
</table>
</div>