@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Party Order</h2>
</div>

</div>
</div>

<div class="col-sm-12">
                <br>
            </div>


<table class="table table-bordered">
<tr>

<th>Index</th>
            <th>Total Paid</th>
            <th>Order Date</th>
            <th>Order Status </th>
            <th>User ID</th>          

</tr>
@foreach ($Party_Orders as $order)
<tr>

<td>{{ $order->id }}</td>
                <td>£{{ number_format($order->Total, 2) }}</td>              
                <td>{{ $order->Order_Date }}

                </td>                   
                    <td>
                        @if($order->Order_Status_ID  == 3 )
                        @php
                        echo 'ordered';
                        @endphp

                        @elseif($order->Order_Status_ID  ==  6)

@php
                        echo 'pending';
                        @endphp
                        @elseif($order->Order_Status_ID  == 9)

@php
                        echo 'processing';
                        @endphp
                        @elseif($order->Order_Status_ID  == 12)

@php
                        echo 'dispatch';
                        @endphp
                        @elseif($order->Order_Status_ID  == 15)

@php
                        echo 'delivered';
                        @endphp
                        @elseif($order->Order_Status_ID  == 18)

@php
                        echo 'collected';
                        @endphp
                        @elseif($order->Order_Status_ID  == 21 )

@php
                        echo 'completed';
                        @endphp
                        @endif
                    </td>                               
                <td>{{ $order->User_ID }}</td>                

</tr>
@endforeach
</table>
{!! $Party_Orders->links() !!}

@endsection