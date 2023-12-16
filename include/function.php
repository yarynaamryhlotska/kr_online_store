<?php
    function strip_zeros_from_date($marked_string="") {
        //first remove the marked zeros
        $no_zeros = str_replace('*0','',$marked_string);
        $cleaned_string = str_replace('*0','',$no_zeros);
        return $cleaned_string;
    }
    
    function redirect_to($location = NULL) {
        if($location != NULL){
            header("Location: {$location}");
            exit;
        }
    }
    
    function redirect($location = NULL){
        if($location != NULL){
            echo "<script>
                    window.location='{$location}'
                </script>";    
        } else {
            echo 'error location';
        }   
    }
    
    function output_message($message="") {
        if(!empty($message)){
            return "<p class=\"message\">{$message}</p>";
        } else {
            return "";
        }
    }
    
    function date_toText($datetime=""){
        $nicetime = strtotime($datetime);
        return strftime("%B %d, %Y at %I:%M %p", $nicetime);   
    }
    
    function my_autoloader($class_name) {
        $class_name = strtolower($class_name);
        $path = LIB_PATH . DS . "{$class_name}.php";
        if (file_exists($path)) {
            require_once($path);
        } else {
            die("The file {$class_name}.php could not be found.");
        }
    }
    
    spl_autoload_register('my_autoloader');
    
    function currentpage_public(){
        $this_page = $_SERVER['SCRIPT_NAME']; 
        $bits = explode('/',$this_page);
        return $bits[2];
    }
    
    function currentpage_admin(){
        $this_page = $_SERVER['SCRIPT_NAME']; 
        $bits = explode('/',$this_page);
        return $bits[4];
    }
    
    function curPageName() {
        return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
    }
    
    function msgBox($msg=""){
        ?>
        <script type="text/javascript">
             alert(<?php echo $msg; ?>)
        </script>
        <?php
    }
?>
