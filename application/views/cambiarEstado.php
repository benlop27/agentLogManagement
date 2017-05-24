      <?php  
  $this->load->database(); 
  $query = $this->db->get('tipo_estado');

      
 echo form_open('dashboard_Agente_Controller/guardarEstado', array('class' => 'form-inline', 'method'=>'POST'));
 echo "<h3>Cambiar Estado</h3><br>";
 echo"Hora Actual<br> <input type='text' name='horaActual' id='horaActual' readonly><br>";
 echo"Ultimo Estado<br> <input type='text' name='fecha_ultimo_estado' id='fecha_ultimo_estado' readonly><br>";
 echo "<label for='tiempoTranscurrido'>Tiempo Transcurrido del Ultimo Estado </label>
 <br>";

echo form_input(array('name' => 'tiempoTranscurrido', 'type' => 'text','readonly' =>
    'true', 'id' => 'date'));

echo "<br><br>";

echo "<label for='id_tipo_estado'>Seleccione el estado </label><br>";
 echo "<select name='id_tipo_estado'>";

foreach ($query->result() as $row)
{
  			echo "<option value='".$row->id_tipo_estado."'>".$row->nombre_tipo_estado."</option>";	 
}
	echo "</select>";
	echo "<br><br>";

	echo form_input(array('name' => 'submit', 'type' => 'submit','value'=>'Cambiar Estado', 'class'=>'btn btn-primary btn-l') );
  echo form_close();
      
       ?>