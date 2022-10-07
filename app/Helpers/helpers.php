<?php
   
   // Módosítás esetén a "composer dump-autoload" parancsot le kell futtatni.

   
    /* It checks if the user is on a mobile device. */
    if (! function_exists('isMobile')) {
        function isMobile(): bool
        {
            return isset($_SERVER['HTTP_USER_AGENT']) && (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $_SERVER['HTTP_USER_AGENT']) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($_SERVER['HTTP_USER_AGENT'], 0, 4))) ? true : false;
        }
    }

    
    /**
     * It returns the name of the user with the given id
     * 
     * @param userId The id of the user you want to get the name of.
     * 
     * @return The name of the user with the given id.
     */
    function getUsername($userId)
    { 
        if(\DB::table('users')->where('id', $userId)->first()){
            return \DB::table('users')->where('id', $userId)->first()->name;
        }else{
            return 'Nem létező felhasználó';
        }
        
    }

    /**
     * It returns all the pages that have a parent_id of  and a status of 1.
     * 
     * @param parent_id The id of the parent menu item
     * 
     * @return An array of objects.
     */
    function getSubMenusByParentId($parent_id)
    {
        $result =  \DB::table('pages')
                                ->where('parent_id', $parent_id)
                                ->where('status', 1)
                                ->get();

        return $result;
    }

    /**
     * It takes a string, decodes it to UTF-8, then replaces all the accented characters with their
     * non-accented counterparts.
     * 
     * @param str The string to be stripped of accents.
     * 
     * @return the string with the accents removed.
     */
    function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüűýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

    /**
     * It takes a date in the format of YYYY-MM-DD and returns the Hungarian month name and day number.
     * 
     * @param date The date you want to convert
     * 
     * @return the month and day of the date in Hungarian.
     */
    function getHunMonthFromDate($date){
        $monthsName = ['01'=>'Január','02'=>'Február','03'=>'Március','04'=>'Április','05'=>'Május','06'=>'Június','07'=>'Július','08'=>'Augusztus','09'=>'Szeptember','10'=>'Október','11'=>'November','12'=>'December'];
        $dateValue=strtotime($date);
        $month = date('m',$dateValue);
        $day = date('d',$dateValue);
        return $monthsName[$month].'-'.$day;
    }

   /**
    * It returns the value of the column with the name of the variable , where the column
    * datum has the value of the variable .
    * 
    * @param date the date of the food
    * @param category the column name in the database
    * 
    * @return The name of the food.
    */
    function getFoodName($date,$category){
        $result =  \DB::table('products')->where('datum', $date)->pluck($category)->first();
        return $result;
    }

   /**
    * It returns the name of a post category based on the category id.
    * 
    * @param category_id The id of the category you want to get the name of.
    * 
    * @return The name of the category.
    */
    function getPostCategoryName($category_id){
        $result =  \DB::table('post_categories')->where('id','=', $category_id)->value('name');
        return $result;
    }

    /**
     * 
     * @param set_bytes The file size in bytes.
     * 
     * @return the size of the file in bytes, kilobytes, megabytes, gigabytes, or terabytes.
     */
    function format_Size($set_bytes){
        $set_kb = 1024;
        $set_mb = $set_kb * 1024;
        $set_gb = $set_mb * 1024;
        $set_tb = $set_gb * 1024;
        if (($set_bytes >= 0) && ($set_bytes < $set_kb)){
            return $set_bytes . ' B';
        }elseif (($set_bytes >= $set_kb) && ($set_bytes < $set_mb)){
            return ceil($set_bytes / $kb) . ' KB';
        }elseif (($set_bytes >= $set_mb) && ($set_bytes < $set_gb)){
            return ceil($set_bytes / $set_mb) . ' MB';
        }elseif (($set_bytes >= $set_gb) && ($set_bytes < $set_tb)){
            return ceil($set_bytes / $set_gb) . ' GB';
        }elseif ($set_bytes >= $set_tb){
            return ceil($set_bytes / $set_tb) . ' TB';
        } else {
            return $set_bytes . ' Bytes';
        }
    }

    /**
     * It takes a directory as an argument, and returns the total size of all files in that directory
     * and all subdirectories.
     * 
     * @param set_dir The directory you want to get the size of.
     * 
     * @return The total size of the folder in bytes.
     */
    function folder_Size($set_dir){
        $set_total_size = 0;
        $set_count = 0;
        $set_dir_array = scandir($set_dir);
        foreach($set_dir_array as $key=>$set_filename){
            if($set_filename!=".." && $set_filename!=".") {
                if(is_dir($set_dir."/".$set_filename)){
                    $new_foldersize = folder_Size($set_dir."/".$set_filename);
                    $set_total_size = $set_total_size+ $new_foldersize;
                }else if(is_file($set_dir."/".$set_filename)){
                    $set_total_size = $set_total_size + filesize($set_dir."/".$set_filename);
                    $set_count++;
                }
            }
        }
        return $set_total_size;
    }
