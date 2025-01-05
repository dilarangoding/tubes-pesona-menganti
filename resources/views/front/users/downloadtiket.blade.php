<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$tiket->invoice}}</title>

    <style>
        h3{
            text-align: center;
        }
        p{
            font-size: 14px;
            margin-top: -12px;
            text-align: center;
            font-weight: 300;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;

        }
        td,
        th {
        font-size: 15px;
        text-align: left;
        padding: .2em;
        }
        tr th:first-child,
        tr td:first-child {
        text-align: left;
        width: 100%;
        }
        tfoot tr td {
        font-weight: bold;
        border-top: 1px black dashed;
        border-bottom: 1px black dashed;
        }
    </style>
</head>
<body>

    <h3>TIKET MASUK WISATA</h3>
    <p>Pantai Menganti</p>
    <p>{{$tiket->invoice}}</p>
    <hr style="border: 1px black dashed;">
      <table >
        <tbody>
          <tr>
            <td>{{date('d-m-Y', strtotime($tiket->booking_date))}} {{date('H:i', strtotime($tiket->created_at))}}</td>
            <td>Pantai Menganti</td>
          </tr>

          <tr>
            <td>Inv #{{$tiket->invoice}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <hr style="border: 1px black dashed;">
      <table >
        <tbody>

          <tr>
            <td>TIKET MASUK Pantai Menganti</td>
            <td></td>
          </tr>
          <tr>
            @foreach ($tiket->ticketDetail as $item)
            <td> {{$item->qty}} x Rp{{number_format($item->price)}}</td>
            @endforeach

            <td>Rp{{number_format($tiket->subtotal)}}</td>
          </tr>
        </tbody>
      </table>
      <hr style="border: 1px black dashed;">
      <table >
        <tbody>
          <tr>
            <td>Sub Total</td>
            <td>Rp{{number_format($tiket->subtotal)}}</td>
          </tr>
          <tr>
            <td><strong>Total</strong></td>
            <td><strong>Rp{{number_format($tiket->subtotal)}}</strong></td>
          </tr>
          <tr>
            <td></td>
            <td><strong>LUNAS</strong></td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <p>Harga tiket sudah</p>
      <p>termasuk asuransi.</p>
      <p>Terimakasih atas kunjungan anda!</p>
      <p>Jangan lupa tag fotomu di</p>
</body>
</html>
