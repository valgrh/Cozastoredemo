<?php  
// Limite de post a mostrar, si no se indica se muestran 4 por default
$limit= 8;

function getImages( $limit = 4 ){

    $user_id       = '3962381526';
    $access_token  = 'IGQVJWeW8wRFBOallxekNWRVMzS0FiLXNnU3JzQUVfR213VGNBWkZAXOUNjeHFVM3FSWFpOTFcyY1EwdklRcW94NWJibG9SUi1VNWxJSG9ZAand4OUUtRVM2T2VzcjJnTG5mbmZAJbDhLN1RMeW4wZAFNRWQZDZD';
    $item_resource = 'userid';
    $hashtag       = '';
    $limit         = $limit;

    if (!$user_id || !$access_token) {
        echo '<p class="alert alert-warning">NO HAY INFORMACIÓN COMPLETA</p>';
        return;
    }

    if( $item_resource == 'hashtag' && $hashtag) {
        $api = "https://api.instagram.com/v1/tags/". $hashtag  ."/media/recent/?access_token=" . $access_token . "&count=". $limit;
    } else {
        $api = "https://api.instagram.com/v1/users/". $user_id  ."/media/recent/?access_token=" . $access_token . "&count=". $limit;
    }

    if( ini_get('allow_url_fopen') ) {
        $images = @file_get_contents($api);
        @file_put_contents($cache_file, $images, LOCK_EX);
    } else {
        $images = curl($api);
    }

    $json = json_decode($images);
    if(isset($json->data)) {
        return $json->data;
    }
    
    return array();

}
	
function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}​
?>