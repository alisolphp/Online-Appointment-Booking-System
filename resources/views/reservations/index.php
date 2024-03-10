<?php
// var_dump($data);

$jdf = $data['JDF'];
$currentReservations = $data['currentReservations'];

$map = getMap($currentReservations);

function getMap($currentReservations){
    $map = [];
    foreach($currentReservations as $reservation){
        $type = 'readonly';
        if( $_COOKIE['user_id'] == $reservation['user_id'] ){
            $type = 'removable';
        }
        $map[ $reservation['datetime'] ] = $type;
    }

    return $map;
}

function displayFloatAsHour($i){
	$hour = floor($i);
	$min = ($i - $hour) * 60;
	
	$hour = str_pad($hour,2,'0',STR_PAD_LEFT);
	$min = str_pad($min,2,'0',STR_PAD_LEFT);
	
	return "$hour:$min";
}
?>

<?php
$pageTitle = 'مدیریت رزروها';
require_once __DIR__."/../components/header.php";
?>

<style>
    table {
        display: block;
        margin: auto;
        width: fit-content;
        border-collapse: collapse;
    }
    table th.dateCell{
        border: 1px solid #ddd;
    }
    table th:nth-of-type(2){
        background: rgb(40, 52, 68);
        color: #fff;
    }
    table th{
        padding: 0.5em;
        text-align: center;
    }
    table td{
        padding: 0.5em;
    }
    table td.selectableCell {
        border: 1px solid silver;
        padding: 0;
    }
    table td.selectableCell.readonly {
        background: #b4cad5;
    }
    table td.selectableCell.readonly a::before{
        content: 'توسط دیگران رزرو شده است';
    }
    table td.selectableCell.removable {
        background: rgb(24, 190, 120);
    }
    table td.selectableCell.removable a::before{
        content: 'توسط شما رزرو شده است ';
    }
    table td.selectableCell .selectCell{
        width: 100px;
        height: 50px;
        display: table-cell;
        text-align: center;
        text-decoration: none;
        font-size: 11pt;
        color: gray;
    }
    table td.selectableCell .selectCell:hover{
        background-color: #daffda;
    }
    table th.holiday {
        color: red;
    }
    table .time {
        position: relative;
        top: -27px;
    }
</style>


<?php

$messages = [
    1 => "رزرو با موفقیت انجام شد!",
    2 => "رزرو با موفقیت حذف شد!",
    3 => "با عرض پوزش، این بازه زمانی، قبلا توسط شخص دیگری رزرو شده و امکان رزرو مجدد توسط شما وجود ندارد.",
    4 => "با عرض پوزش، امکان رزرو در روزهای تعطیل وجود ندارد!",
];

$msg = input('msg');
if( isset($messages[$msg]) ){
    echo '<p class="alert alert-primary">'.$messages[$msg].'</p>';
}
?>



<table>
    <tr>
        <th></th>
        <?php
        for($dayOffset = 0; $dayOffset < 7; $dayOffset++){
            $timestamp = time() + $dayOffset * 86400;

            $dayNumber = $jdf::jdate("d", $timestamp,'','','en');
            $dayName = $jdf::jdate("l", $timestamp);

            $class = "";

            if( $dayName == "جمعه" ){
                $class .= " holiday ";
            }

            ?>
            <th class="dateCell <?php echo $class; ?>"><?php echo $dayNumber; ?><br><?php echo $dayName; ?></th>
            <?php
        }
        ?>
        
    </tr>
    <?php
    for($i=7; $i < 15.5; $i+=0.5){
        ?>
        <tr>
            <td><span class="time"><?php echo displayFloatAsHour($i); ?></span></td>
            
            <?php
            for($dayOffset = 0; $dayOffset < 7; $dayOffset++){
                $timestamp = time() + $dayOffset * 86400;

                $datetime = $jdf::jdate('Y-m-d', $timestamp,'','','en') . '-' . $i;
                
                $dayName = $jdf::jdate("l", $timestamp);

                $link = url('reservation.toggle').'?toggle='.$datetime;
                $type = $map[$datetime] ?? 'reservable';

                if( $dayName == "جمعه" ){
                    $link = url('reservations').'?msg=4';
                    $type = 'holiday';
                }

                ?>

                <td class="selectableCell <?php echo $type; ?>"><a class="selectCell" href="<?php echo $link; ?>"></a></td>

                <?php
            }
            ?>
            
            
            
        <tr>
        <?php
    }
    ?>
    
</table>


<?php
require_once __DIR__."/../components/footer.php";
?>