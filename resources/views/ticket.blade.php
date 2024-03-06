<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ asset('evento_logo.jpg') }}" alt="logo" width="200" />
            </td>
            <td class="w-half">
                <h2>Ticket ID: </h2>
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>Buyer:</h4></div>
                    <div>John Doe</div>
                    <div>email</div>
                </td>
                <td class="w-half">
                    <div><h4>Event:</h4></div>
                    <div>Event name</div>
                    <div>Location</div>
                    <div>Date</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="">
            <tr>
                <th>id</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr class="items">
               
                    <td>
                       
                    </td>
                    <td>
                       
                    </td>
                    <td>
                       
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total:  MAD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Evento</div>
    </div>
</body>
</html>