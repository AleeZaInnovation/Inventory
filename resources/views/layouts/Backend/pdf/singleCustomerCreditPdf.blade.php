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
    <h3 style="color: black; padding-bottom: 0">
	  <strong>All Customer Credit List</strong>
	</h3>
	<table  width="100%" border="1" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Info</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Due Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $totalSum = '0';
                    @endphp
                    @foreach($creditCustomer as $key => $payment)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>
                        {{ $payment->customer->name }} -
                        {{ $payment->customer->mobile }}
                      </td>
                      <td>Invoice No #{{ $payment['invoice']['invoice_no'] }}</td>
                      <td>{{ date('d-m-Y', strtotime($payment['invoice']['date'])) }}</td>
                      <td>{{ $payment->due_amount }} TK.</td>       
                    </tr>
                    @php
                    $totalSum += $payment->due_amount;
                    @endphp
                  @endforeach
                  <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold; color: red;">Sub Total</td>
                    <td style="text-center: right; font-weight: bold; color: red;">{{ $totalSum }} TK.</td>
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