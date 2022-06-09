<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
         .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
    </style>
  </head>
  <body>

    @include('admin.sidebar')
      <!-- partial -->

        @include('admin.navbar')





        <div class="main-panel">
            <div class="content-wrapper w-100">

               <h1 style="font-size:25px" class="text-center mt-5">Toutes les commandes</h1>

               @if(session()->has('message'))

               <div class="alert alert-success">

               <button type="button" class="close" data-bs-dismiss="alert">x</button>

               {{session()->get('message')}}

               </div>

               @endif

               <table class="center">

                <tr style="background-color: gray; text-align:center;">

                    <td  class="border border-white" style="padding:20px;">N°</td>
                    <td  class="border border-white" style="padding:20px;">Nom du client</td>
                    <td  class="border border-white" style="padding:20px;">Téléphone</td>
                    <td  class="border border-white" style="padding:20px;">Adresse</td>
                    <td  class="border border-white" style="padding:20px;">Nom des produits</td>
                    <td  class="border border-white" style="padding:20px;">Quantité</td>
                    <td  class="border border-white" style="padding:20px;">Prix</td>
                    <td  class="border border-white" style="padding:20px;">Status</td>
                    <td  class="border border-white" style="padding:20px;">Réceptionné</td>
                </tr>


                @foreach($order as $order)
                <tr align="center" style="background-color: black;">

                    <td class="border border-white" >{{$order->id}}</td>
                    <td class="border border-white" >{{$order->name}}</td>
                    <td class="border border-white" >{{$order->phone}}</td>
                    <td class="border border-white" >{{$order->address}}</td>
                    <td class="border border-white" >{{$order->product_name}}</td>
                    <td class="border border-white" >{{$order->quantity}}</td>
                    <td class="border border-white" >{{$order->price}}</td>
                    <td class="border border-white" >{{$order->status}}</td>
                    <td class="p-4 border border-white">

                        @if($order->status== "non receptionné et non payé")

                        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Etes vous sur que ce produit a été délivré ?')" class="btn btn-danger" >Réceptionné</a>

                        @elseif($order->status== "non receptionné et payé")

                        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Etes vous sur que ce produit a été délivré ?')" class="btn btn-danger" >Réceptionné</a>

                        @else

                        <p style="color:red;">Délivré</p>

                        @endif

                    </td>
                </tr>
                @endforeach

            </table>

            </div>
        </div>


          <!-- partial -->
       @include('admin.script')
    <!-- End custom js for this page -->
       @include('admin.footer')
  </body>
</html>
