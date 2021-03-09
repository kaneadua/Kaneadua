<?php

require_once "date.php";

class MasterController {

    public static function display_topics_count($db){

        $query = 'SELECT * FROM topic';
        $result = $db->query($query);

        return $result->num_rows;

    }

    public static function  retrieve_or_filter_topics($db,$search_string){


            $NUMBER_OF_REPLIES=null;
            $REPLYER=null;
            $DATE_REPLIED=null;

            $query = "SELECT * FROM topic ORDER BY id DESC";

            if($search_string != "") $query = "SELECT * FROM topic WHERE MATCH(author,title,details) AGAINST (\"$search_string\" IN BOOLEAN MODE) ORDER BY id DESC";

           $result = $db->query($query);
           $count = $result->num_rows;
           $topics=array();


            for($j=0;$j<$count;++$j)
            {


                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $id = $row['id']; ///search id later appended to url;
                $title = $row['title']; ///topic title
                $author= "posted by ".$row['author']; ///topic author

                $query = "SELECT * FROM reply WHERE title = \"$title\"";
                $result2 = $db->query($query);
                $number_of_replies = $result2->num_rows;

                if($number_of_replies != 0)
                {
                    $result2->data_seek($number_of_replies - 1);
                    $row= $result2->fetch_array(MYSQLI_ASSOC);


                    $REPLYER = $row['replyer'] ; //////latest replyer
                    $DATE_REPLIED =$row['date_replied'];
                    $DATE_REPLIED=ago($DATE_REPLIED); //replied date
                    $NUMBER_OF_REPLIES.= $number_of_replies > 1 ? " replies": " reply";  ///number of replies
                } else{
                    $REPLYER = "not replied yet";
                    $NUMBER_OF_REPLIES = "zero replies";
                    $DATE_REPLIED = "Unavailable";
                }

                $topics[]=array(
                    'id'=>$id,
                    'title'=>$title,
                    'author'=>$author,
                    'number_of_replies'=>$NUMBER_OF_REPLIES,
                    'replyer'=>$REPLYER,
                    'date_replied'=>$DATE_REPLIED
                );
            }
            return $topics;

        }

    public static function  insert_topics($db,$author,$title,$details,$image){

        $image_name=$image["name"];  ///no image is uploaded if name is empty
        $image_size=$image["size"];
        $image_type=$image["type"];
        $baseUrl=$image["baseURl"];

        $IMAGE=""; //image url to be inserted into the database

        if(!($image_name == "" || $image_size == 0 )) {  //If an image is uploaded execute this block

        ///file checking is taking place here
        if($image_size/1024 > "2048"){
            echo "Image size must not be greater than 2MB";
            exit();
        }

        if($image_type != "image/png"   &&
            $image_type != "image/gif"  &&
            $image_type != "image/jpg"   &&
            $image_type != "image/jpeg"
        ) {
            echo "Sorry this file is not supported";
            exit();
        }


        $uploaded_file="ImageUploads/".date("Y_m_d_H_i_s").$image_name;

        if(is_uploaded_file($image["tmp_name"])){
            if(!move_uploaded_file($image["tmp_name"],$uploaded_file)){
                echo "Something went wrong";
                exit();
            }
        }

        $IMAGE = $baseUrl."/".$uploaded_file;

        }

        //insert values into the table
        $query="INSERT INTO topic(author,title,details,image) VALUES(\"$author\",\"$title\",\"$details\",\"$IMAGE\")";

        if($db->query($query))
            return "OK";
        else return "ERROR";
    }
    }
