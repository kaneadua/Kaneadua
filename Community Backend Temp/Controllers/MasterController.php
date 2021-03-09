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
                $NUMBER_OF_REPLIES = $number_of_replies;


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
                    'latest_replyer'=>$REPLYER,
                    'date_replied'=>$DATE_REPLIED
                );
            }
            return $topics;

        }

    public static function  insert_topics($db,$author,$title,$details,$image){

        //check to verify if topic isn't already posted
        $query = "SELECT title FROM topic WHERE title = \"$title\"";
        $result = $db->query($query);
        $row = $result->num_rows;

        if($row){
            echo json_encode("Topic already exist!!");
            exit();
        }


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

//        $info = getimagesize($uploaded_file);
//        if($info["mime"]=="image/jpeg") $compressed= imagecreatefromjpeg($uploaded_file);
//         elseif($info["mime"]=="image/gif") $compressed= imagecreatefromgif($uploaded_file);
//        elseif($info["mime"]=="image/png") $compressed= imagecreatefromgif($uploaded_file);
//
//        imagejpeg($compressed,$uploaded_file,50);


        $IMAGE = $baseUrl."/".$uploaded_file;

        }

        //insert values into the table
        $query="INSERT INTO topic(author,title,details,image) VALUES(\"$author\",\"$title\",\"$details\",\"$IMAGE\")";

        if($db->query($query))
            return "OK";
        else return "ERROR";
    }

    public static function  start_discussion_topic($db,$id){

        $query = "SELECT * FROM topic WHERE id = \"$id\"";
        $result = $db->query($query);
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $title = $row['title'];
        $author= "Topic posted by ".$row['author'];
        $details=$row['details'];
        $date_created=ago($row['date_created']);

        $query = "SELECT * FROM reply WHERE title = \"$title\"";
        $result2 = $db->query($query);
        $number_of_replies = $result2->num_rows;
        $number_of_replies.= $number_of_replies > 1 ? " replies": " reply";


        return array("id"=>$id,
                     "title"=>$title,
                     "author"=>$author,
                     "details"=>$details,
                     "date_created"=>$date_created,
                     "number_of_replies"=>$number_of_replies
                    );
    }

    public static function  discussion_topic_replies($db,$title){

        $replies = array(); //will hold all the replies together

        $query = "SELECT * FROM reply WHERE title = \"$title\" ORDER BY id DESC";
        $result = $db->query($query);
        $count = $result->num_rows;

        for($j=0;$j<$count;$j++)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $message = $row['message'];  /// replied message
            $replyer = $row['replyer'];  /// replier
            $date_replied= ago($row['date_replied']);  ///replied date
            $image = $row['image'];   /// image should be included in case someone uploaded it as a reply

            $replies[]=array(
                'message'=>$message,
                'replier'=>$replyer,
                'image'=>$image,
                'date_replied'=>$date_replied
            );

        }

        return $replies;
    }

    public static function  reply_to_topic($db,$replyer,$title,$message,$image){
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

//        $info = getimagesize($uploaded_file);
//        if($info["mime"]=="image/jpeg") $compressed= imagecreatefromjpeg($uploaded_file);
//         elseif($info["mime"]=="image/gif") $compressed= imagecreatefromgif($uploaded_file);
//        elseif($info["mime"]=="image/png") $compressed= imagecreatefromgif($uploaded_file);
//
//        imagejpeg($compressed,$uploaded_file,50);


            $IMAGE = $baseUrl."/".$uploaded_file;

        }

        //insert reply into table
        $query="INSERT INTO reply(title,message,replyer,image) VALUES(\"$title\",\"$message\",\"$replyer\",\"$IMAGE\")";

        if($db->query($query))
            return "OK";
        else return "ERROR";


    }

    public static function  update_topic($db,$id,$details,$image){

        return "OK";
    }
}

