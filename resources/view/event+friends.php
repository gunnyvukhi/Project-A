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

echo '<div class="ListContainer">
        <h3>Người liên hệ</h3>
        <ul>';

        echo '<li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="ContentContainer">
                    <p class="FriendsName">' . $currentUserName . '</p>
                </div>
                </a>
            </li>';
        echo '</ul>
            </div>
        </div>';