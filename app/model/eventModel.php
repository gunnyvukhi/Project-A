<?php


require_once 'config/db.php';

class eventModel{
    // event_id,user_id, event_name,	event_date,	date_time
    public function createEvent($user_id, $event_name, $event_date, $date_time){
        $sql = "INSERT INTO events (user_id, event_name, event_date, date_time) VALUES ($user_id, '$event_name', '$event_date', '$date_time')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //insert events of vietnamese
    // INSERT INTO important_events (event_name, event_date, event_description)
    // VALUES
    // ('Ngày thành lập Đảng Cộng sản Việt Nam', '1930-02-03', 'Ngày 3 tháng 2 năm 1930, Đảng Cộng sản Việt Nam được thành lập.'),
    // ('Cách mạng tháng Tám', '1945-08-19', 'Ngày 19 tháng 8 năm 1945, nhân dân Hà Nội tiến hành khởi nghĩa giành chính quyền, mở đầu cho cuộc Tổng khởi nghĩa tháng Tám.'),
    // ('Ngày Quốc khánh', '1945-09-02', 'Ngày 2 tháng 9 năm 1945, Chủ tịch Hồ Chí Minh đọc Tuyên ngôn Độc lập, khai sinh nước Việt Nam Dân chủ Cộng hòa.'),
    // ('Chiến thắng Điện Biên Phủ', '1954-05-07', 'Ngày 7 tháng 5 năm 1954, quân đội Việt Nam giành chiến thắng tại Điện Biên Phủ, kết thúc chiến tranh Đông Dương.'),
    // ('Hiệp định Genève', '1954-07-21', 'Ngày 21 tháng 7 năm 1954, Hiệp định Genève được ký kết, chia đôi Việt Nam thành hai miền với giới tuyến tại vĩ tuyến 17.'),
    // ('Chiến dịch Mậu Thân', '1968-01-30', 'Ngày 30 tháng 1 năm 1968, Quân Giải phóng miền Nam Việt Nam phát động cuộc tổng tiến công và nổi dậy trên toàn miền Nam.'),
    // ('Giải phóng miền Nam', '1975-04-30', 'Ngày 30 tháng 4 năm 1975, quân đội Giải phóng miền Nam tiến vào Sài Gòn, giải phóng hoàn toàn miền Nam, thống nhất đất nước.'),
    // ('Ngày thành lập Hội Liên hiệp Phụ nữ Việt Nam', '1930-10-20', 'Ngày 20 tháng 10 năm 1930, Hội Liên hiệp Phụ nữ Việt Nam được thành lập.'),
    // ('Ngày nhà giáo Việt Nam', '1958-11-20', 'Ngày 20 tháng 11 hàng năm được chọn làm Ngày nhà giáo Việt Nam để tôn vinh các thầy cô giáo.'),
    // ('Việt Nam gia nhập ASEAN', '1995-07-28', 'Ngày 28 tháng 7 năm 1995, Việt Nam chính thức gia nhập Hiệp hội các quốc gia Đông Nam Á (ASEAN).');


    //get all events
    public function getAllEvents(){
        $sql = "SELECT * FROM events";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }   

    //thong bao cac su kien trong ngay
    public function getEventsByDate($event_date){
        $sql = "SELECT * FROM events WHERE date_time = '$event_date'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    //thong bao su kien truoc 2 ngay
    public function getEventsBeforeDate($event_date){
        $sql = "SELECT * FROM events WHERE date_time = '$event_date'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }



}