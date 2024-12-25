<!DOCTYPE html >
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>فاتورة</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .receipt {
      width: 80mm;
      margin: 0 auto;
      padding: 10px;
      background: #fff;
      border: 1px solid #ddd;
    }

    .header {
      text-align: center;
      margin-bottom: 10px;
    }

    .header h1 {
      font-size: 16px;
      margin: 0;
    }

    .header p {
      font-size: 12px;
      margin: 5px 0;
    }

    .details {
      margin-bottom: 10px;
      font-size: 12px;
    }

    .details p {
      margin: 5px 0;
    }

    .items {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 10px;
    }

    .items th,
    .items td {
      font-size: 12px;
      border: 1px solid #ddd;
      padding: 5px;
      text-align: left;
    }

    .total {
      text-align: right;
      font-size: 14px;
      margin-top: 10px;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 12px;
    }

    .footer p {
      margin: 5px 0;
    }
  </style>
</head>
<body dir="rtl">
  <div class="receipt">
    <div class="header">
      <h1>العالمية للحوم الفاخرة    </h1>
      <p>العنوان: شارع القاهرة - مقابل فندق ايجل</p>
      <p style=>الهاتف:783870260</p>
    </div>

    <div class="details">
      <p>التاريخ:{{$main->created_at}}</p>
      <p>رقم الفاتورة: {{$main->id}}</p>
    </div>

    <table class="items" >
      <thead>
        <tr>
          <th>المنتج</th>
          <th>الكمية</th>
          <th>السعر</th>
          <th>الإجمالي</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($sub as $item)
       <tr>
        <td>{{$item->prodect->name??""}}</td>
        <td>{{$item->count}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->count*$item->price}}</td>
      </tr>
       @endforeach
        
      </tbody>
    </table>

    <div class="total">
      <p><strong>الإجمالي: {{$main->total}} ريال</strong></p>
      <p><strong>الخصم: {{$main->dis}} ريال</strong></p>
    </div>

    <div class="footer">
      <p>شكراً لتعاملكم معنا!</p>
      <p>نتمنى لكم يومًا سعيدًا!</p>
    </div>
  </div>
</body>
</html>
