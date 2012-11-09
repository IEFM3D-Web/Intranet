<?php 
/**
 *Cette option va créer le formulaire avec les options indiquées
 * 
 * @param  array  $options  Tableau d'attributs
 */
function form_create($attr = null) {
	$html = '<form id="form"';
	foreach($attr as $key => $value){$html .=' '.$key.'="'.$value.'"';}
	$html .= '>';
	
	return $html;
}



/**
 *Cette option va fermer le formulaire
 * 
 * @param  boolean  $submit  Par défault à vrai, permet d'intégrer un bouton avant la fin du formulaire
 * @param  varchar  $value   Texte du bouton
 */
function form_close($submit = true, $value = 'Envoyer') {
	$html = '';
	if($submit){
		$html .='<button type="submit">'.$value.'</button><div class="clear"></div>';
	}
	$html .='</form>';
	
	return $html;
}



/**
 *Cette option va créer le contenu du formulaire
 * 
 *$options --> Index possibles :
 * - type : type de champs imput (optionnel par défault text)
 * - class : classe css à appliquer (optionnel)
 * - errors : tableau des erreurs éventuelles (optionnel)
 * - value : tableau contenant la liste des valeurs des champs du formulaire
 * - wysiwyg : booléen permettant d'indiquer si CKEditor doit être lancé
 *
 * @param 	varchar	  $Name     Nom du input
 * @param 	varchar	  $Name     Titre du label
 * @param 	array	  $options  Tableau d'options
 */

 
function form_input($name, $label, $options = array()) {
	
	//pr($options);
	
	//Mise en place des options par défault
	$defaultOptions = array(
		'type'=>'text',
		'wysiwyg'=>false,
		'datas'=>array(),
	);
	
	$options = array_merge($defaultOptions, $options);
	
	if($options['type'] != 'checkbox') {
		 if(isset($options['values'][$name])){ $value = $options['values'][$name]; } 
		 else{ $value = ''; }
	} else {$value = $options['values'];}
	
	//pr($value);
	
	$except = array('type', 'errors', 'values', 'wysiwyg'); //champs à échapper
		
	if($options['type'] != 'checkbox') {
		$html = '<div class="champs">';
		if(!isset($options['label'])){$html .= '<label>'.$label.'</label>';}
		$html .= '<div>';
	} else { $html = ''; }
	
	$attr = '';

	foreach($options as $k => $v){
		if(!in_array($k, $except)){
			$attr .= $k.'="'.$v.'"';
		}
	}
	$libelleId = _form_generate_id($name);
	
	switch($options['type']){
		
		case 'text':
			$html .= '<input type="text" name="'.$name.'" '.$attr.' id="'.$libelleId.'" value="'.$value.'"/>';
			
		break;
		
		case 'textarea':
			$html .= '<textarea '.$attr.' cols="'.$options['cols'].'" rows="'.$options['rows'].'" id="'.$libelleId.'" name="'.$name.'">'.$value.'</textarea>';
			
			if($options['wysiwyg']){
				$html .= "<script type='text/javascript'>
							var ck_".$libelleId."_editor = CKEDITOR.replace( '".$libelleId."');
							CKFinder.setupCKEditor( editor, '".BASE_URL."/js/ckfinder/' );
						  </script>";
			}
		break;
		
		case 'select':
			$html .= '<select name="'.$name.'" id="'.$libelleId.'">';
			
			foreach($options['datas'] as $k => $v) {

				if(isset($value) && $value == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
				
				$html .= '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
			}
			
			$html .= '</select>';
		break;
		
		case 'hidden':
			$html .= '<input type="hidden" value="'.$value.'" name="'.$name.'" id="'.$libelleId.'Hidden"/>';
		break;

		case 'checkbox':
		
			$html .= '<input type="hidden" value="0" name="'.$name.'" id="'.$libelleId.'Hidden"/>';
			$html .= '<input type="checkbox" value="1" name="'.$name.'" id="'.$libelleId.'" ';
		    $html .= isset($value) && $value ? 'checked="checked"' : '';
			$html .= '/>';
			
		break;
		
		
		case 'submit':
			return '<button type="'.$options['type'].'" class="'.$options['class'].'">'.$name.'</span></button>';
		break;
	
	}
	
	if(isset($options['errors'][$name])){
		$html .= '<div class="error_box">'.$options['errors'][$name].'</div>';
	}
	
	$html .= '</div>';
$html .= '</div>';
	
	return $html;
}


/**
 *Cette option permet de transformer le nom d'un champ input en id
 * 
 * @param 	varchar	  $Name     Nom du imput
 * @access  private
 */
function _form_generate_id($name){

	$explode = explode("_", $name);
	$id = 'Input';
	
	foreach($explode as $value){
		$id .= ucfirst($value);
	}
	
	return $id;
}
?>