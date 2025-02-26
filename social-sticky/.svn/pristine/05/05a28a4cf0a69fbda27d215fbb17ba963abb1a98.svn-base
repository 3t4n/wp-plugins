<?php
/**
 * Function that will check if value is a valid HEX color.
 */
function check_color( $value ) {      
    if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { 
		// if user insert a HEX color with #     
        return true;
    }     
    return false;
}

/**
 * Get options value after user press "Save Settings" button
 */
if ( $_POST) {
	if ( isset( $_POST[ 'EnableLeftEffect' ] ) ) {
		$options[ 'EnableLeftEffect' ] = $_POST[ 'EnableLeftEffect' ];
	}
	
	if ( isset( $_POST[ 'EnableRightEffect' ] ) ) {
		$options[ 'EnableRightEffect' ] = $_POST[ 'EnableRightEffect' ];
	}
	
	if ( isset( $_POST[ 'FacebookPage' ] ) ) {
		$options[ 'FacebookPage' ] = $_POST[ 'FacebookPage' ];
	}
	
	if ( isset( $_POST[ 'GoogleID' ] ) ) {
		$options[ 'GoogleID' ] = $_POST[ 'GoogleID' ];
	}
	
	if ( isset( $_POST[ 'TwitterID' ] ) ) {
		$options[ 'TwitterID' ] = $_POST[ 'TwitterID' ];
	}

	if ( isset( $_POST[ 'Width' ]) && intval( $_POST[ 'Width' ] ) ) {
		$options[ 'Width' ] = $_POST[ 'Width' ];
	}
	
	if ( isset( $_POST[ 'Height' ]) && intval( $_POST[ 'Height' ] ) ) {
		$options[ 'Height' ] = $_POST[ 'Height' ];
	}
	
	if ( isset( $_POST[ 'ShowFaces' ] ) ) {
		$options[ 'ShowFaces' ] = $_POST[ 'ShowFaces' ];
	}
	
	if ( isset( $_POST[ 'ShowStream' ] ) ) {
		$options[ 'ShowStream' ] = $_POST[ 'ShowStream' ];
	}
	
	if ( isset( $_POST[ 'ShowHeader' ] ) ) {
		$options[ 'ShowHeader' ] = $_POST[ 'ShowHeader' ];
	}
	
	if ( isset( $_POST[ 'RightEffect' ] ) ) {
		$options[ 'RightEffect' ] = $_POST[ 'RightEffect' ];
	}
	
	if ( isset( $_POST[ 'LeftEffect' ] ) ) {
		$options[ 'LeftEffect' ] = $_POST[ 'LeftEffect' ];
	}
	
	if ( isset( $_POST[ 'RightSocial' ] ) ) {
		$options[ 'RightSocial' ] = $_POST[ 'RightSocial' ];
	}
	
	if ( isset( $_POST[ 'LeftSocial' ] ) ) {
		$options[ 'LeftSocial' ] = $_POST[ 'LeftSocial' ];
	}
	
	if ( isset( $_POST[ 'RightEffectSize' ] ) ) {
		$options[ 'RightEffectSize' ] = $_POST[ 'RightEffectSize' ];
	}
	
	if ( isset( $_POST[ 'LeftEffectSize' ] ) ) {
		$options[ 'LeftEffectSize' ] = $_POST[ 'LeftEffectSize' ];
	}
	
	if ( isset( $_POST[ 'RightBorderColor' ] ) ) {
		if ( TRUE === check_color( $_POST[ 'RightBorderColor' ] ) ) {			
			$options[ 'RightBorderColor' ] = $_POST[ 'RightBorderColor' ];		 
		}
	}
	
	if ( isset( $_POST[ 'RightCenterColor' ] ) ) {
		if ( TRUE === check_color( $_POST[ 'RightCenterColor' ] ) )  {			
			$options[ 'RightCenterColor' ] = $_POST[ 'RightCenterColor' ];		 
		}
	}
	
	if ( isset( $_POST[ 'LeftBorderColor' ] ) ) {
		if ( TRUE === check_color( $_POST[ 'LeftBorderColor' ] ) )  {			
			$options[ 'LeftBorderColor' ] = $_POST[ 'LeftBorderColor' ];		 
		}
	}
	
	if ( isset( $_POST[ 'LeftCenterColor' ] ) ) {
		if ( TRUE === check_color( $_POST[ 'LeftCenterColor' ] ) )  {			
			$options[ 'LeftCenterColor' ] = $_POST[ 'LeftCenterColor' ];		 
		}
	}
	
	if ( isset( $_POST[ 'ShadowColor' ] ) ) {
		if ( TRUE === check_color( $_POST[ 'ShadowColor' ] ) ) {			
			$options[ 'ShadowColor' ] = $_POST[ 'ShadowColor' ];		 
		}
	}
	
	if ( $_POST[ 'submit' ]) {
		update_option( 'SS_Options', $options );
		
		echo '
			<div id="setting-error-settings_updated" class="updated settings-error">
				<p><strong>Settings Saved</strong></p>
			</div>
		' ;
	}
}

/**
 * Set default value for options
 */
$options = ss_get_options();

if ( ! isset( $options[ 'FacebookPage' ] ) ) {
	$options[ 'FacebookPage' ] = 'wptpnet' ;
}

if ( ! isset( $options[ 'GoogleID' ] ) ) {
	$options[ 'GoogleID' ] = '107127807962312041063' ;
}

if ( ! isset( $options[ 'TwitterID' ] ) ) {
	$options[ 'TwitterID' ] = '548839222342213632' ;
}

if ( ! isset( $options[ 'RightEffect' ] ) ) {
	$options[ 'RightEffect' ] = 'ArcOut' ;
}

if ( ! isset( $options[ 'LeftEffect' ]) ) {
	$options[ 'LeftEffect' ] = 'ArcOut' ;
}

if ( ! isset( $options[ 'RightSocial' ] ) ) {
	$options[ 'RightSocial' ] = 'FaceBook' ;
}

if ( ! isset( $options[ 'LeftSocial' ] ) ) {
	$options[ 'LeftSocial' ] = 'FaceBook' ;
}

if ( ! isset( $options[ 'Width' ] ) ) {
	$options[ 'Width' ] = 250;
}

if ( ! isset( $options[ 'Height' ] ) ) {
	$options[ 'Height' ] = 300;
}

if ( ! isset( $options[ 'RightEffectSize' ] ) ) {
	$options[ 'RightEffectSize' ] = 80;
}

if ( ! isset( $options[ 'LeftEffectSize' ] ) ) {
	$options[ 'LeftEffectSize' ] = 80;
}

if ( ! isset( $options[ 'RightBorderColor' ] ) ) {
	$options[ 'RightBorderColor' ] = '#7078DA' ;
}

if ( ! isset( $options[ 'LeftBorderColor' ] ) ) {
	$options[ 'LeftBorderColor' ] = '#7078DA' ;
}

if ( ! isset( $options[ 'RightCenterColor' ] ) ) {
	$options[ 'RightCenterColor' ] = '#000064' ;
}

if ( ! isset( $options[ 'LeftCenterColor' ] ) ) {
	$options[ 'LeftCenterColor' ] = '#000064' ;
}

if ( ! isset( $options[ 'ShadowColor' ] ) ) {
	$options[ 'ShadowColor' ] = '#22d8d2' ;
}
?>

<!-- Show Setting Option Page for this plugin -->
<div class="wrap">
	<h2>Social Sticky</h2>
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<h3>Social</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="FacebookPage">Facebook Page URL</label></th>
					<td>
						<input name="FacebookPage" type="text" id="FacebookPage" value="<?= $options[ 'FacebookPage' ] ?>" class="regular-text" />
						<input name="ShowFaces" <?= ( $options[ 'ShowFaces' ] ? 'checked' : '' ) ?> type="checkbox" id="ShowFaces" value="1" /> Show Faces
						<input name="ShowStream" <?= ( $options[ 'ShowStream' ] ? 'checked' : '' ) ?> type="checkbox" id="ShowStream" value="1" /> Show Stream
						<input name="ShowHeader" <?= ( $options[ 'ShowHeader' ] ? 'checked' : '' ) ?> type="checkbox" id="ShowHeader" value="1" /> Show Header
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="GoogleID">Google+ ID:</label></th>
					<td><input name="GoogleID" type="text" id="GoogleID" value="<?= $options[ 'GoogleID' ] ?>" class="regular-text" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="TwitterID">Twitter ID:</label></th>
					<td><input name="TwitterID" type="text" id="TwitterID" value="<?= $options[ 'TwitterID' ] ?>" class="regular-text" /></td>
				</tr>
			</tbody>
		</table>
		
		<h3>Follow Box</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="Width">Width</label></th>
					<td>
						<input name="Width" type="text" id="Width" value="<?= $options[ 'Width' ] ?>" class="small-text" /> px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="Height">Height</label></th>
					<td>
						<input name="Height" type="text" id="Height" value="<?= $options[ 'Height' ] ?>" class="small-text" /> px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Shadow Color</th>
					<td> 
						<input type="text" name="ShadowColor" value="<?= $options[ 'ShadowColor' ] ?>" class="color-field" >
					</td>
				</tr>
			</tbody>
		</table>
		
		<h3>Left Effect</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Enable Left Effect</th>
					<td> 
						<input name="EnableLeftEffect" <?= ( $options[ 'EnableLeftEffect' ] ? 'checked' : '' ) ?> type="checkbox" id="EnableLeftEffect" value="1" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Effect type</th>
					<td> 
						<fieldset>
							<label for="LeftEffect">
								<input name="LeftEffect" <?= ( $options[ 'LeftEffect' ] == 'ArcOut' ? 'checked' : '' ) ?> type="radio" id="LeftEffect" value="ArcOut" />
								Arc Out
							</label>
							<label for="LeftEffect">
								<input name="LeftEffect" <?= ( $options[ 'LeftEffect' ] == 'ArcIn' ? 'checked' : '' ) ?> type="radio" id="LeftEffect" value="ArcIn" />
								Arc In
							</label>
							<label for="LeftEffect">
								<input name="LeftEffect" <?= ( $options[ 'LeftEffect' ] == 'TriangleCorner' ? 'checked' : '' ) ?> type="radio" id="LeftEffect" value="TriangleCorner" />
								Triangle Corner
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Social</th>
					<td> 
						<fieldset>
							<label for="LeftSocial">
								<input name="LeftSocial" <?= ( $options[ 'LeftSocial' ] == 'FaceBook' ? 'checked' : '' ) ?> type="radio" id="LeftSocial" value="FaceBook" />
								FaceBook
							</label>
							<label for="LeftSocial">
								<input name="LeftSocial" <?= ( $options[ 'LeftSocial' ] == 'Google+' ? 'checked' : '' ) ?> type="radio" id="LeftSocial" value="Google+" />
								Google+
							</label>
							<label for="LeftSocial">
								<input name="LeftSocial" <?= ( $options[ 'LeftSocial' ] == 'Twitter' ? 'checked' : '' ) ?> type="radio" id="LeftSocial" value="Twitter" />
								Twitter
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Effect Size</th>
					<td> 
						<input name="LeftEffectSize" type="text" id="LeftEffectSize" value="<?= $options[ 'LeftEffectSize' ] ?>" class="small-text" /> px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Center Color</th>
					<td> 
						<input type="text" name="LeftCenterColor" value="<?= $options[ 'LeftCenterColor' ] ?>" class="color-field" >
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Border Color</th>
					<td> 
						<input type="text" name="LeftBorderColor" value="<?= $options[ 'LeftBorderColor' ] ?>" class="color-field" >
					</td>
				</tr>
			</tbody>
		</table>
		
		<h3>Right Effect</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Enable Right Effect</th>
					<td> 
						<input name="EnableRightEffect" <?= ( $options[ 'EnableRightEffect' ] ? 'checked' : '' ) ?> type="checkbox" id="EnableRightEffect" value="1" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Effect type</th>
					<td> 
						<fieldset>
							<label for="RightEffect">
								<input name="RightEffect" <?= ( $options[ 'RightEffect' ] == 'ArcOut' ? 'checked' : '' ) ?> type="radio" id="RightEffect" value="ArcOut" />
								Arc Out
							</label>
							<label for="RightEffect">
								<input name="RightEffect" <?= ( $options[ 'RightEffect' ] == 'ArcIn' ? 'checked' : '' ) ?> type="radio" id="RightEffect" value="ArcIn" />
								Arc In
							</label>
							<label for="RightEffect">
								<input name="RightEffect" <?= ( $options[ 'RightEffect' ] == 'TriangleCorner' ? 'checked' : '' ) ?> type="radio" id="RightEffect" value="TriangleCorner" />
								Triangle Corner
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Social</th>
					<td> 
						<fieldset>
							<label for="RightSocial">
								<input name="RightSocial" <?= ( $options[ 'RightSocial' ] == 'FaceBook' ? 'checked' : '' ) ?> type="radio" id="RightSocial" value="FaceBook" />
								FaceBook
							</label>
							<label for="RightSocial">
								<input name="RightSocial" <?= ( $options[ 'RightSocial' ] == 'Google+' ? 'checked' : '' ) ?> type="radio" id="RightSocial" value="Google+" />
								Google+
							</label>
							<label for="RightSocial">
								<input name="RightSocial" <?= ( $options[ 'RightSocial' ] == 'Twitter' ? 'checked' : '' ) ?> type="radio" id="RightSocial" value="Twitter" />
								Twitter
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Effect Size</th>
					<td> 
						<input name="RightEffectSize" type="text" id="RightEffectSize" value="<?= $options[ 'RightEffectSize' ] ?>" class="small-text" /> px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Center Color</th>
					<td> 
						<input type="text" name="RightCenterColor" value="<?= $options[ 'RightCenterColor' ] ?>" class="color-field" >
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Border Color</th>
					<td> 
						<input type="text" name="RightBorderColor" value="<?= $options[ 'RightBorderColor' ] ?>" class="color-field" >
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p class="submit">
							<input type="submit" name="submit" id="submit" class="button-primary" value="Save settings" >
						</p>
					</td>
				</tr>
			</tbody>
		</table>	
	</form>
</div>