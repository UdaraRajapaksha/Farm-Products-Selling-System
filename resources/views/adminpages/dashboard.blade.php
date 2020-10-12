@extends('pageLayouts.adminlayout')

@section('content')
        <div class="row">
                <div class="col-sm-4">
                        <div class="countbox">
                                <p class="count">{{count($supplierData)}}</p>
                                <p class="countname">Total Suppliers</p>
                        </div>
                </div>
                <div class="col-sm-4">
                        <div class="countbox">
                                <p class="count">{{count($customerData)}}</p>
                                <p class="countname">Total Customers</p>
                        </div>
                </div>
                <div class="col-sm-4">
                        <div class="countbox">
                                <p class="count">{{count($orderData)}}</p>
                                <p class="countname">Total Orders</p>
                        </div>
                </div>
        </div>

        <div class="row">
                <div class="col-sm-6">
                        <div class="recent">
                                <div class="">
                                        <h4>Most Recent SignUps</h4>
                                        <div class="dash" style="background-color:#ccffe6;width:100%;padding:0.5vh;"> Customers</div>
                                        @if (count($clogin)>0)
                                        <table class="table">
                                                @foreach ($clogin as $clogin)
                                                        <tr>
                                                                <td> 
                                                                        <a href="/admin/viewuser/customer/{{$clogin->customerId}}">
                                                                               <strong style="color:gray">{{$clogin->name}}</strong> 
                                                                        </a>
                                                                </td>
                                                                <td> 
                                                                        {{$clogin->address}}
                                                                </td>
                                                        </tr>      
                                                @endforeach
                                        </table>
                                        @else
                                                <p>No Suppliers found</p>
                                        @endif
                                        <div class="dash" style="background-color:#ccffe6;width:100%;padding:0.5vh;"> Suppliers</div>
                                        @if (count($slogin)>0)
                                        <table class="table">
                                                @foreach ($slogin as $slogin)
                                                        <tr>
                                                                <td> 
                                                                        <a href="/admin/viewuser/supplier/{{$slogin->supplierId}}">
                                                                                <strong style="color:gray">{{$slogin->name}}</strong>
                                                                        </a>
                                                                </td>
                                                                <td> {{$slogin->address}}</td>
                                                        </tr>       
                                                @endforeach
                                        </table>
                                        @else
                                                <p>No Suppliers found</p>
                                        @endif
                                </div>   
                        </div>
                </div>
                <div class="col-sm-6">
                        <div class="recent">
                                <div class="">
                                        <h4>Today's Summery</h4>
                                        <table class="table">
                                                <tr>
                                                        <td>
                                                             <strong>Total Orders</strong>   
                                                        </td>
                                                        <td>
                                                                800
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                             <strong>New SignUps</strong>   
                                                        </td>
                                                        <td>
                                                                80
                                                        </td>
                                                </tr>
                                        </table>
                                </div>   
                        </div>
                </div>
        </div>


        
@endsection
