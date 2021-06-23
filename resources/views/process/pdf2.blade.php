<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }

    body {
        font-family: "THSarabunNew";
    }
    .header{
      text-align: center;
    }
    .headerlogo{
      /* display: block;
      margin-left: 250%; */
      width: 150px;
      height: 60px;
    }
    .title-page{
      text-align: center;
    }
    .title-list{
      
      text-align: center
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    td {
      padding: 15px;
    }
    .footeruser{
      text-align: right
    }
    .header-date{
      text-align: right
    }
</style>
</head>
<body>
  <div class="header">
    <img src="{{asset('assets/images/logo.jpg')}}" alt="Logo" class="headerlogo">
    <h3>องค์การพิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ</h3>
    <h4>พิพิธภัณฑ์เทคโนโลยีสารสนเทศ</h4>
    <h4>เทคโนธานี ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</h4>
    <br>
    <h4 class="title-list">จำนวนการยืมครุภัณฑ์</h4>
  </div>
  <p class="header-date">พิมพ์วันที่ {{ $day }} เดือน {{ $month }} พ.ศ. {{ $year }}</p>
  <div class="table-responsive">
    <table class="table" style="width:100%">
      <thead class="thead-light">
        <tr>
                        <th scope="col" style="width: 50px"><h4>ลำดับ</h4></th>
                        <th scope="col" ><h4>รหัสครุภัณฑ์</h4></th>
                        <th scope="col" style="width: 150px"><h4>ชื่อครุภัณฑ์</h4></th>
                        <th scope="col"><h4>หมวดหมู่</h4></th>
                        <th scope="col"><center><h4>จำนวนที่ถูกยืม/ครั้ง</h4></center></th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp

        @foreach($logs2 as $key => $order)
        <tr>
          <td style="width: 50px"><h5>{{$key + 1}}</h5></td>
          <td><h5>{{$order->duID}}</h5></td>
          <td style="width: 150px"><h5>{{$order->item_name}}</h5></td>
          <td><h5>{{$order->item_category}}</h5></td>
          <td style="text-align: center"><h5>{{$order->total}}</h5></td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="footeruser">
    <h4>ลงชื่อเจ้าหน้าที่กองนิทรรศการ</h4>
    <h4> </h4>
    <h4>(...........{{ Auth::user()->names }}...........)</h4>
    <h4>ตำแหน่ง {{ Auth::user()->position }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
  </div>
</body>
</html>
