<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/ticket-style.css')}}"> --}}
    <title>Ticket</title>
    <style>

h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
}
.margin-top {
    margin-top: 1.25rem;
}
.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
}
table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

    </style>

</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h1>Evento</h1>
            </td>
            {{-- <td class="w-half">
                <h2>Ticket ID: </h2>
            </td> --}}
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>Buyer:</h4></div>
                    <div>{{$userName}}</div>
                    <div>email:{{$userEmail}}</div>
                </td>
                <td class="w-half">
                    <div><h4>Event:</h4></div>
                    <div>Event name : {{$eventTitle}}</div>
                    <div>Location : {{$eventLocation}}</div>
                    <div>Date : {{$eventDate}}</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>id</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr class="items">
                <td>{{$eventId}}</td>
                <td>{{$eventDescription}}</td>
                <td>{{$eventPrice}}</td>
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total: {{$eventPrice}}  MAD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Evento</div>
    </div>
</body>
</html>