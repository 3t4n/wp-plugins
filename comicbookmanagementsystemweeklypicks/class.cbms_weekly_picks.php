<?php
	class cbms_weekly_picks
	{
		public $id = null;
		public $title = null;
		public $img = null;	
		
		public function __construct( $data=array() ) 
		{
		  if( isset($data['id']) )
			{
			  $this->id = (int) $data['id'];
			}	

		  if( isset( $data['title'] ) )
			{
			  $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
			}	
			
		  if( isset( $data['img'] ) )
			{
			  $this->img = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['img'] );
			}	
		}	

		
		/**Store Values Passed By Admin.*/
		public function storeFormValues( $params ) {
			$this->__construct( $params );		  
		}


		/**Insert New Weekly Pick.*/
		public function insert() {
			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';
			$wpdb->insert($table_name, 
				array(
				  'id'	 	  => $this->id,	
				  'title'  	  => $this->title,
				  'img'  	  => $this->img
				)
			  ); 
			  
			$this->id = $wpdb->insert_id; 
		}		

		
		/**Update Weekly Pick.*/
		public function update() {
			if( is_null($this->id) )
              {
				trigger_error("This Weekly Pick Could Not Be Found", E_USER_ERROR );
			  }

			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';			  
			$wpdb->update( $table_name, 
				array( 
				  'id'	 	 => $this->id,	
				  'title'	 => $this->title,	
				  'img'  	 => $this->img
				), 
				array( 'id' => $this->id ), 
				array( 
					'%s',
					'%s',
					'%s'	
				), 
				array( '%s' ) 
			);	
		}
		
		
		/**Delete Weekly Pick.*/
		public function delete() {
			if( is_null($this->id) )
              {
				trigger_error("Weekly Pick Could Not Be Found", E_USER_ERROR );
			  }

			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';			  
			$wpdb->delete( $table_name, array( 'id' => $this->id ) );
		}

		
		/**Get Weekly Picks List.*/
		public static function getList( $numRows=1000000 ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';	

			$weeklypicks = $wpdb->get_results( 
				"SELECT * 
				FROM " . $table_name ." ORDER BY id ASC"
			);
			
			if( count( $weeklypicks ) > 0 )
			  {
				 foreach( $weeklypicks as $picks )
				 {
					$array = array(							
							'id' => $picks->id,
							'title' => $picks->title,	
							'img' => $picks->img
					);				   
				   $weeklypick = new cbms_weekly_picks( $array );
				   $list[] = $weeklypick;
				 }
				return( $list ); 
			  }						
			return( null );
		}

		
		/**Check if Weekly Pick is Already Stored.*/
		 public static function isStored( $id ) {		
			$picksStored = false;
			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';		
		 
			$weeklypicks = $wpdb->get_results( 
				"SELECT * 
				FROM " . $table_name .
				" WHERE id = " . $id ." LIMIT 1"
			);		
			
			if( count( $weeklypicks ) > 0 )
			  {
			    $picksStored = true;	 
			  }			
			
			return $picksStored;	
		}
		


		/**Get By ID.*/
		public static function getByID( $id ) {		
			$picksStored = false;
			global $wpdb;
			$table_name = $wpdb->prefix . 'cbms_weekly_picks';		
			$array = array();
			
			$weeklypicks = $wpdb->get_results( 
				"SELECT * 
				FROM " . $table_name .
				" WHERE id = " . $id ." LIMIT 1"
			);		
			
			if( count($weeklypicks)> 0 )
			  {
			    foreach ( $weeklypicks as $pick ) 
			    {
					$array = array(
					  'id'		 => $pick->id,
					  'title'	 => $pick->title, 
					  'img'      => $pick->img
					);
			    }
			  }	
			  
		  return $array;	  
		}		

			
		/**Store the Image That Was Uploaded.*/
		public function storeUploadedImage( $image ) {
 
			if( $image['error'] == UPLOAD_ERR_OK )
			 {  
				if( is_null( $this->id ) ) 
				  {
				    trigger_error( "There Was Error Uploading the Image.", E_USER_ERROR );
				  }
				  
				$this->deleteImages();
				$this->img = strtolower( strrchr($image['name'], '.' ) );

				$tempFilename = trim( $image['tmp_name'] ); 
		 
				if(is_uploaded_file($tempFilename)) 
				  {
					if( !( move_uploaded_file( $tempFilename, $this->getImagePath() ) ) )
					  {
						trigger_error("Image::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR);
					  }
					
					if( !( chmod( $this->getImagePath(), 0666 ) ) ) 
					  {
						trigger_error("Image::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR);
					  }
					
				  }

				$attrs = getimagesize( $this->getImagePath() );
				$imageWidth = $attrs[0];
				$imageHeight = $attrs[1];
				$imageType = $attrs[2];
 
 
				switch( $imageType ){
					case IMAGETYPE_GIF:
					  $imageResource = imagecreatefromgif( $this->getImagePath() );
					  break;
					case IMAGETYPE_JPEG:
					  $imageResource = imagecreatefromjpeg( $this->getImagePath() );
					  break;
					case IMAGETYPE_PNG:
					  $imageResource = imagecreatefrompng( $this->getImagePath() );
					  break;
					default:
					  trigger_error( "Image::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
				}
				

				if( $imageWidth > $imageHeight )
				  {
					$ratioValue = ( $imageHeight / 379 );
					$ratioWidth = ( $imageWidth / $ratioValue );
					$ratioHeight = 379;
					$scaledImage = imagecreatetruecolor ( 250, 379 );
					imagecopyresampled( $scaledImage, $imageResource, 0, 0, ( ( $ratioWidth - 250 ) / 2 ), 0, $ratioWidth, $ratioHeight, $imageWidth, $imageHeight );					
				  }
				else
				  {
					$ratioValue = ($imageWidth / 250);
					$ratioHeight = ($imageHeight / $ratioValue);
					$ratioWidth = 250;
					$scaledImage = imagecreatetruecolor ( 250, 379 );
					imagecopyresampled( $scaledImage, $imageResource, 0, 0, 0, ( ( $ratioHeight - 379 ) /2 ), $ratioWidth, $ratioHeight, $imageWidth, $imageHeight );
				  }
			
				switch ( $imageType ) {
					case IMAGETYPE_GIF:
					  imagegif ( $scaledImage, $this->getImagePath( ) );
					  break;
					case IMAGETYPE_JPEG:
					  imagejpeg ( $scaledImage, $this->getImagePath( ), JPEG_QUALITY );
					  break;
					case IMAGETYPE_PNG:
					  imagepng ( $scaledImage, $this->getImagePath( ) );
					  break;
					default:
					  trigger_error ( "Error Rescalling Image", E_USER_ERROR );
				}				

			    $this->update();
		      }
		}

		
		/**Delete Weekly Picks Image.*/
		public function deleteImages() {
			foreach( glob( trailingslashit( WP_CONTENT_DIR ) . 'cbms_weekly_picks_cover/'  . $this->id . $this->img) as $filename )
			{
			   if( !unlink( $filename ) ) 
				 {
				   trigger_error( "Image::deleteImages(): Couldn't delete image file.", E_USER_ERROR );
				 }
			}

			$this->img = "";
		}
 
 
		/**Set The Path For The Image.*/
		public function getImagePath() {
			return( $this->id && $this->img ) ? (trailingslashit( WP_CONTENT_DIR ) . 'cbms_weekly_picks_cover/'  . $this->id . $this->img ) : false;
		}
	
	}
	
?>