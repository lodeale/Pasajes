<section id="main" class="column">
		
		<h4 class="alert_info">Panel de administración de Clientes.</h4>

		<article class="module width_full">
			<header><h3>Agregar</h3></header>
				<div class="module_content">
					<?php echo form_open("panel/addCliente"); ?>
					<h2>Persona</h2>
					<fieldset>
						<label for="">Nombre</label>
						<input type="text" name="nombre"><br>
						<label for="">Apellido</label>
						<input type="text" name="apellido"><br>
						<label for="">Cel</label>
						<input type="text" name="cel"><br>
						<label for="">DNI</label>
						<input type="text" name="dni"><br>
						<label for="">Dirección</label>
						<input type="text" name="dire"><br>
						<label for="">Provincia</label>
						<select name="provincia" id="provincia">
						<?php foreach($provincia as $row1): ?>
							<option value="<?php echo $row1->id_provincia ?>"><?php echo $row1->provincia ?></option>
						<?php endforeach; ?>
						</select>
						<label for="">Pais</label>
						<select name="pais" id="pais">
						<?php foreach($pais as $row2): ?>
							<option value="<?php echo $row2->id_pais ?>"><?php echo $row2->pais ?></option>
						<?php endforeach; ?>
						</select>
						<label for="">Detalle</label>
						<textarea name="detalle" id="detalle" cols="30" rows="10"></textarea>
					</fieldset>
					<input type="submit">
					<?php echo form_close(); ?>
				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Lista Clientes</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Básico</a></li>
    		<li><a href="#tab2">Completo</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Nombre y Apellido</th> 
    				<th>Cel</th> 
    				<th>DNI</th> 
    				<th>Opciones</th> 
				</tr> 
			</thead> 
			<tbody> 
				<?php foreach($clientes as $row): ?>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td><?php echo $row->apellido." ".$row->nombre; ?></td> 
    				<td><?php echo $row->cel ?></td> 
    				<td><?php echo $row->dni ?></td> 
    				<td>
    					<input type="hidden" name="id_c" id="id_c" values="<?php echo $row->id; ?>">
    					<input id="<?php echo $row->id; ?>" type="image" src="<?php echo base_url(); ?>assets/images/icn_edit.png" title="Edit">
    					<input id="<?php echo $row->id; ?>" type="image" src="<?php echo base_url(); ?>assets/images/icn_trash.png" title="Trash">
    				</td> 
				</tr> 
				<?php endforeach; ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Comment</th> 
    				<th>Posted by</th> 
    				<th>Posted On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				<?php foreach($clientes as $row): ?>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td><?php echo $row->apellido." ".$row->nombre; ?></td> 
    				<td><?php echo $row->direccion; ?></td> 
    				<td><?php echo $row->provincia." ".$row->pais; ?></td> 
    				<td><input id="editC" type="image" src="<?php echo base_url(); ?>assets/images/icn_edit.png" title="Edit"><input id="delC" type="image" src="<?php echo base_url(); ?>assets/images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<?php endforeach; ?>
			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
			<header><h3>Messages</h3></header>
			<div class="message_list">
				<div class="module_content">
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
				</div>
			</div>
			<footer>
				<form class="post_message">
					<input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input type="submit" class="btn_post_message" value=""/>
				</form>
			</footer>
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		
		<div class="spacer"></div>
	</section>