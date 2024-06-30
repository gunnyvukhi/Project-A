<?php
$event_data = $data['event'];
echo '<link rel="stylesheet" href="resources\css\event+friends.css" type="text/css">
        <div id="mainContentRightContainer">';
if (count($event_data)>0){
    echo '<div class="ListContainer">
        <h3>Sự kiện</h3>
        <ul>';
        foreach ($event_data as $event){
            echo '<li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' />
                <div class="ContentContainer">
                    <p class="EventContent">'.$event["event"].'</p>
                </div>
                </a>
            </li>';
        }
            
        echo '</ul>
        </div>';
}
$displayed_Friends = array();
echo '<div class="ListContainer">
        <h3>Người liên hệ</h3>
        <ul>';
        foreach ($friends as $friend_data){
            if (in_array($friend_data["user_id"], $displayed_Friends)) {continue;}
            if (!isset($friend_data["isFriend"])){continue;}

            if (isset($friend_data['avatar'])){
                $friend_data['avatar'] = 'resources\image\userAvater\\' . $friend_data['avatar'];
            } else {
                $friend_data['avatar'] = 'resources\image\demoPersonIcon.png';
            }
            
            echo '<li>
                    <a href="#" class="ContentLink">
                    <img class="contentPic" src=' . $friend_data['avatar'] . ' />
                    <div class="ContentContainer">
                        <p class="FriendsName">' . $friend_data['last_name'] . '</p>
                    </div>
                    </a>
                </li>';
                array_push($displayed_Friends, $friend_data["user_id"]);
        }
        echo '</ul>
            </div>
        </div>';