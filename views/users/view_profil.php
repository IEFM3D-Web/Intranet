<?php 
$profil = $aControllerDatas['profil'];
$roleList = $aControllerDatas['usersTypesList'];?>


<h2>Profil de <?php echo  ucfirst($profil['nom'])." ".ucfirst($profil['prenom']); ?></h2>
<div id="profil">
	<div class="photo">
		<!-- <tr>
			<td> </td>
		</tr> -->
	</div>
	
	<table class="info">
		<tr>
			<td class="label">Sexe</td>
			<td><?php if($profil['sexe'] == 1){echo '<img src="'.BASE_URL.'/img/intranet/site/femme.png" alt="Femme" title="Femme"/>';}else{echo '<img src="'.BASE_URL.'/img/intranet/site/homme.png" alt="Homme" title="Homme"/>';} ?></td>
			<td>
		</tr>
		<tr>
			<td class="label">Nom</td>
			<td><?php echo ucfirst($profil['nom']);?></td>
		</tr>
		<tr>
			<td class="label">Prénom</td>
			<td><?php echo ucfirst($profil['prenom']);?></td>
		</tr>
		<tr>
			<td class="label">Adresse</td>
			<td><?php echo ucfirst($profil['adresse']);?></td>
		</tr>
		<tr>
			<td class="label">Téléphone</td>
			<td><?php echo $profil['tel'];?></td>
		</tr>
		<tr>
			<td class="label">Mail</td>
			<td><?php echo $profil['mail'];?></td>
		</tr>  
		<tr>
			<td class="label">Statut</td>
			<td><?php echo ucfirst($roleList[$profil['role']]);?></td>
		</tr> 
	</table>
	<div class="clear"></div>

	
</div>
<?php
if(Session::read('role') <= 3){
?>
	<h2>Gestion des fichiers</h2>
	<div id="gestion-fichiers">
	<div id="ckfinder"></div>
		<script type="text/javascript">
	//<![CDATA[
	(function()
	{
			var config = {};
			var get = CKFinder.tools.getUrlParam;
			var getBool = function( v )
			{
				var t = get( v );

				if ( t === null )
					return null;

				return t == '0' ? false : true;
			};

			var tmp;
			if ( tmp = get( 'configId' ) )
			{
				var win = window.opener || window;
				try
				{
					while ( ( !win.CKFinder || !win.CKFinder._.instanceConfig[ tmp ] ) && win != window.top )
						win = win.parent;

					if ( win.CKFinder._.instanceConfig[ tmp ] )
						config = CKFINDER.tools.extend( {}, win.CKFinder._.instanceConfig[ tmp ] );
				}
				catch(e) {}
			}

			if ( tmp = get( 'basePath' ) )
				CKFINDER.basePath = tmp;

			if ( tmp = get( 'startupPath' ) || get( 'start' ) )
				config.startupPath = decodeURIComponent( tmp );

			config.id = get( 'id' ) || '';

			if ( ( tmp = getBool( 'rlf' ) ) !== null )
				config.rememberLastFolder = tmp;

			if ( ( tmp = getBool( 'dts' ) ) !== null )
				config.disableThumbnailSelection = tmp;

			if ( tmp = get( 'data' ) )
				config.selectActionData = tmp;

			if ( tmp = get( 'tdata' ) )
				config.selectThumbnailActionData = tmp;

			if ( tmp = get( 'type' ) )
				config.resourceType = tmp;

			if ( tmp = get( 'skin' ) )
				config.skin = tmp;

			if ( tmp = get( 'langCode' ) )
				config.language = tmp;

			if ( typeof( config.selectActionFunction ) == 'undefined' )
			{
				// Try to get desired "File Select" action from the URL.
				var action;
				if ( tmp = get( 'CKEditor' ) )
				{
					if ( tmp.length )
						action = 'ckeditor';
				}
				if ( !action )
					action = get( 'action' );

				var parentWindow = ( window.parent == window ) ? window.opener : window.parent;
				switch ( action )
				{
					case 'js':
						var actionFunction = get( 'func' );
						if ( actionFunction && actionFunction.length > 0 )
							config.selectActionFunction = parentWindow[ actionFunction ];

						actionFunction = get( 'thumbFunc' );
						if ( actionFunction && actionFunction.length > 0 )
							config.selectThumbnailActionFunction = parentWindow[ actionFunction ];
						break ;

					case 'ckeditor':
						var funcNum = get( 'CKEditorFuncNum' );
						if ( parentWindow['CKEDITOR'] )
						{
							config.selectActionFunction = function( fileUrl, data )
							{
								parentWindow['CKEDITOR'].tools.callFunction( funcNum, fileUrl, data );
							};

							config.selectThumbnailActionFunction = config.selectActionFunction;
						}
						break;

					default:
						if ( parentWindow && parentWindow['FCK'] && parentWindow['SetUrl'] )
						{
							action = 'fckeditor' ;
							config.selectActionFunction = parentWindow['SetUrl'];

							if ( !config.disableThumbnailSelection )
								config.selectThumbnailActionFunction = parentWindow['SetUrl'];
						}
						else
							action = null ;
				}
				config.action = action;
			}

			// Always use 100% width and height when nested using this middle page.
			config.width = config.height = '100%';

			var ckfinder = new CKFinder( config );
			ckfinder.replace( 'ckfinder', config );
	})();
	//]]>
		</script>
	</div>
<?php
}
?>	