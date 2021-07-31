<!DOCTYPE html>
<html>
<head>
	<style type ="text/css" >
   .footer{ 
       position: fixed;         
       bottom: 100px; 
       width: 100%;
   }  
</style>
	<title>Invoice</title>
</head>
<body>
	<h2 style="text-align:center; color: #4e73df; padding-bottom: 5px; margin-left: 20px;" class="text-primary"><strong>Mim Drinking Water</strong></h2>
	<h5 style="text-align: center; color: black; padding-bottom: 0">
	  <strong>Mobile:- 01738333441</strong>
	</h5>
	<h5 style="text-align: center; color: black; padding-bottom: 0">
	  <strong>Lamabazar,Sylhet</strong>
	</h5>
    <hr style="padding-bottom: 0px;">
    <h4 style="color: black; padding-bottom: 0">
	  <strong>Daily Invoice Report:-
	   ( {{ date('d-m-Y', strtotime($stime)) }} - {{ date('d-m-Y', strtotime($etime)) }} ) 
	</strong>
	</h4>
<table border="1" width="100%" style="text-align: center;">
	<thead>
		<tr>
			<td>Customer Name-Mobile</td>
			<td>Invoice No</td>
			<td>Date</td>
			<td>Description</td>
			<td>Amount</td>
		</tr>
	</thead>
	<tbody>
		@php 
		$subTotal = '0';
		@endphp
		@foreach($invoices as $invoice)
		<tr>
			<td>
				{{ $invoice->payment->customer->name }} -
				{{ $invoice->payment->customer->mobile }}
			</td>
			<td>{{ $invoice->invoice_no }}</td>
			<td>{{ $invoice->date }}</td>
			<td>{{ $invoice->description }}</td>
			<td>{{ $invoice->payment->total_amount }}</td>
		</tr>
		@php
		$subTotal += $invoice->payment->total_amount;
		@endphp
		@endforeach
		<tr>
			<td style="text-align: right; color:green;" colspan="4">Sub Total:-</td>
			<td style="color:green;">{{ $subTotal }}</td>
		</tr>
	</tbody>
</table>
<div class="footer">
<hr>
<table width="100%">
	<br>
	<br>
	<tbody>
		<tr>
			<td style="text-align: left;">Shop Signature</td>
			<td style="text-align: right;">Owner Signature</td>
		</tr>
	</tbody>
</table>
@php 
$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
@endphp
<br>
<strong>
	Printing Time:- {{ $date->format('F j, Y, g:i a') }}
</strong>
</div>

</body>
</html>