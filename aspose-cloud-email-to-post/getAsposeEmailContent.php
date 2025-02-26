<?php

/*
 * Including the sdk of php
 */



use Aspose\Cloud\Common\AsposeApp;
use Aspose\Cloud\Common\Product;
use Aspose\Cloud\Storage\Folder;
use Aspose\Cloud\Email\Document;



function my_autoloader($class) {
    $allowed_namespace = array('AsposeApp','Product','Folder','Converter','Utils','Document');
    $arr = explode('\\', $class);
    if( in_array( $arr['3'] , $allowed_namespace)){
        include 'Aspose_Cloud_SDK_For_PHP-master/src/'. $arr[0] . '/' . $arr[1] . '/' .$arr[2] . '/' . $arr[3] . '.php';
    }

}

spl_autoload_register('my_autoloader');


/*
 *  Assign appSID and appKey of your Aspose App
 */
AsposeApp::$appSID = $_REQUEST['appSID']; // '8EB6E644-4A40-4B50-8012-135D1F8F7513';
AsposeApp::$appKey = $_REQUEST['appKey']; // '8356c76c7412f32bb85ae7472e842da4';


/*
 * Assign Base Product URL
 */
Product::$baseProductUri = 'http://api.aspose.com/v1.1';
$filename = $_REQUEST['filename'];




$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($ext == 'eml' || $ext == 'mht' || $ext == 'msg') {
    $uploadpath = $_REQUEST['uploadpath'];
    $uploadURI = $_REQUEST['uploadURI'];
    $uploadpath = str_replace('/','\\',$uploadpath);
    $uploadpath = $uploadpath . '\\';

    AsposeApp::$outPutLocation = $uploadpath; // 'F:\\xampp\htdocs\\wordpress\\uploads\\';

    if(!isset($_REQUEST['aspose'])) {

        $folder = new Folder();
		$uploadpath = str_replace("\\","/",$uploadpath);
        $uploadFile = $uploadpath .  $filename; // 'F:\\xampp\htdocs\\wordpress\\uploads\\License.pdf';
        $folder->uploadFile($uploadFile, '');
    }


    $email_doc_obj = new Document($filename);
    $propertyName = 'Subject';
    $post_title = $email_doc_obj->getProperty($propertyName);

    $propertyName = 'Body';
    $post_content = $email_doc_obj->getProperty($propertyName);

    $propertyName = 'Attachments';
    $attachments = $email_doc_obj->getProperty($propertyName);


    $uploaded_files_array = array();

    if(is_array($attachments) && count($attachments) > 1) {
        foreach($attachments as $key=>$attachment){
            if($key == 0){
                continue;
            }

            $uploaded_files_array[$attachment->Name] = $email_doc_obj->getAttachment($attachment->Name);
        }
    }

    if(is_array($uploaded_files_array) && count($uploaded_files_array) > 0 ) {

        foreach($uploaded_files_array as $file_label=>$file_path){

            $file_path = $uploadURI . '/' . $file_path;
            $post_content .= '<br/>';
            $post_content .= '<a href="'.$file_path.'" >'.$file_label.'</a>';

        }

    }

    $result_arr['post_title'] = $post_title;
    $result_arr['post_content'] = $post_content;

    echo json_encode($result_arr);


} else {
    echo "Wrong File was selected!";
}



