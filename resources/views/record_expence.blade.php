@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Record Expence
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
    
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<div class="form-box" id="form-box">
<form class="form">
  <div>
    <label class="expense-label">Njia ya Malipo</label>
    <select name="type" class="select form-control">
        <option value="cash">Cash</option>
        <option value="card">Kadi</option>
        <option value="cryptocoin">Mkopo</option>
        <option value="other">QR Code</option>
    </select>
  </div>
  
  <div>
    <label class="expense-label">Bidhaa/Huduma</label>
    <input type="text" class="expense-input form-control" name="item_name" placeholder="">
  </div>
  
  <div>
    <label class="expense-label">Tarehe ya Manunuzi</label>
    <input type="date" class="expense-input form-control" name="date">
  </div>
  
  <div>
    <label class="expense-label">Kiasi Gani</label>
    <input type="number" class="expense-input form-control" name="amount" placeholder="0">
  </div>
  
</form>
</div>

<!-- <div id="button"><span>Add a new expense</span></div> -->
<button id="button" class="expense-button btn-success">Nakili</button>

<table class="table">
  <tr>
    <th id="type" class="center">Aina ya malipo</th>
    <th>Bidhaa/Huduma</th>
    <th id="date">Tarehe</th>
    <th style="text-align: right" id="amount">Kiasi</th>
  </tr>
  <tr id="if-empty">
    <td colspan="4"><span>Matumizi yako yataonekana hapa</span></td>
  </tr>

</table>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
<!-- page level js starts-->
    <script type="text/javascript">
      //jQuery
        $(document).ready(function (){
          
          //Variable declarations that use or refer to jquery should be INSIDE the ready function to make sure jquery is instanciated. 
          $item_name = $('input[name="item_name"'); //notice the different declaration…
          $amount = $('input[name="amount"'); 
          $type = $('select[name="type"');
          $date = $('input[name="date"');
          
          var formatDate = function(d) {
            //2014-07-09
            /*var d = d.split('-');//Since we know the value comes yyyy-mm-dd…
            
            var dt = new Date(d[0],d[1],d[2]);//Note: The month is off by +1 - for JS Date object, 
            
            var formattedDate = '';
            
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];//Now we can get the month like this:
            
            formattedDate += months[ dt.getMonth()-1 ]; //Months are 0-11 for getDate

            var formattedDay;//We are gonna store the formatted day here.
            
            switch( d[2].substring(1) ) {//We can use the string of the day (dd format) to access the last number, which determines what we append...
              case '1':
                formattedDay = parseInt(d[2]) + "st"; //1st, 21st, etc
                break;        
              case '2':
                formattedDay = parseInt(d[2]) + "nd"; //2nd
                break;        
              case '3':
                formattedDay = parseInt(d[2]) + "rd"; //etc…
                break;  
              default:
                formattedDay = parseInt(d[2]) + "th";
            }
            //Add a space and the day, now correctly appended
            formattedDate += ' ' + formattedDay;*/
            formattedDate = d;
            //Return nice formatted date!
            return formattedDate;
          }
          
          //Notice the $varname - Now each of these is is a jquery object corresponding to the DOM element and can be used to call the .val() method directly at any time. The way you had it before would only grab the value at the time of the declarations - ie before the values are set.
          
          $('#button').click(function () {
            // Making it always add a icon in the type row
            var type_icon; //Store the html fragment to a variable when needed.
            if ($type.val() == 'card') {
              type_icon = "<i class='fa fa-credit-card'></i>";
            } else if ($type.val() == 'cash') {
              type_icon = "<i class='fa fa-money'></i>";
            } else if ($type.val() == 'cryptocoin') {
              type_icon = "<i class='fa fa-bitcoin'></i>";
            } else if ($type.val() == 'other') {
              type_icon = "<i class='fa fa-question-circle'></i>";
            }
            
            var form_validated = true;
            //Add your validation tests, have them set form_validated to false if they fail
            //TODO
            
            if(form_validated) {
              var client_id = 1;
              var item = $item_name.val();
              var amount = $amount.val();
              var paid_on = $date.val();
              /*console.log("client_id: "+amount);*/


              //Now we can use our references we made before
              $("table tr:first").after('<tr><td>'+type_icon+'</td><td>'+$item_name.val()+'</td><td>'+formatDate($date.val())+'</td><td class="amount">TShs. '+$amount.val()+'</td></tr>');
              
              $date.val(null);
              $amount.val(null);
              $item_name.val(null);
              $("#if-empty").remove();
              //['client_id', 'item', 'paid_on', 'payment_method', 'amount'];
              $.ajax({
                url:"{{route('api_new_expense')}}",
                method: "POST",
                dataType:'JSON',
                data: {
                  _token:"{{csrf_token()}}",
                  client_id:client_id,
                  item:item,
                  amount:amount,
                  paid_on:paid_on,
                }
              }).done( function(data){
                    console.log('Ajax was Successful!')
                    console.log(data)
                }).fail(function(){
                    console.log('Ajax Failed')
                });

              }
            });

        });
                     
    </script>
    <!--page level js ends-->

@stop