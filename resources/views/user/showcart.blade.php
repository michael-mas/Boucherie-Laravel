<!DOCTYPE html>
<html lang="en">
    <base href="/public">
  <head>


  @include('user.css')
  <style>
      @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
  </style>

  </head>

  <body>
    @include('user.navbar')




        <div
        style=
    "position: relative;
    text-align: center;
    padding-top: 90px;
    margin-bottom:30px;"
         class="container ">
         <h2 class="font-weight-bold mb-5 mt-3" style="font-size: 35px">Panier</h2>
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="w-80 border border-secondary rounded">
                <div class=" p-4">

                    <div class="row d-flex justify-content-center"> <img width="10%" src="assets/images/petit-panier.png" alt=""></div>
                    <hr class="mb-2"> <div class="row">

                    <div class="col-lg-12">
                      <h5 class="mb-3"><a href="{{url('/shop')}}" class="text-body">
                        <i class="fa fa fa-long-arrow-left me-2"></i>Revenir à la boutique</a></h5>
                      <hr>

                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="col-12">
                          <h6 class="mb-1 mt-1 font-weight-bold">Votre panier</h6>


                          <p class="mb-0">Tu as {{$count}} produits</p>
                          <hr>
                          @if(session()->has('message'))

                          <div class="alert alert-success">

                          <button type="button" class="close" data-bs-dismiss="alert">x</button>

                          {{session()->get('message')}}

                          </div>

                          @endif
                        </div>
                      </div>
                      <form action="{{url('order')}}" method="POST">

                        @csrf
                        @php $sum = 0;  @endphp
                      @foreach ($cart as $carts)
                      @php $sum = $sum + $carts->price;  @endphp

                      <div class="cardx mb-3 mb-lg-0">
                        <div class="card-bodyx">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <div>
                                <img
                                src="/productimage/{{$carts->image}}"
                                  class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                              </div>
                              <div class="ms-3">
                                <h5>

                                    <input style="width:10px" type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">

                                    {{$carts->product_title}}

                                </h5>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">

                                    <input style="width:10px" type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="">

                                    {{$carts->quantity}}

                                </h5>
                              </div>
                              <div style="width: 80px;">
                                <h5 class="mb-0">

                                    <input style="width:10px" type="text" name="price[]" value="{{$carts->price}}" hidden="">

                                    {{$carts->price}}€

                                </h5>
                              </div>
                              <a onclick="return confirm('Etes vous sur?')" href="{{url('deletecart',$carts->id)}}" style="color: #cecece;"><i class="fa fa-trash"></i></a>

                            </div>
                          </div>
                        </div>
                      </div>

                      @endforeach
                      <hr class="mt-2 mb-1">
                      <div class="row d-flex justify-content-end mr-2"> <span>Total: {{$sum}} €</span></div>
                      <div class="row d-flex justify-content-center "> <button class="btn btn-primary mt-3 mr-2">Payer à la boutique</button>
                        <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">Payer via Paypal</a>
                        <a href="{{ route('user.stripe', $sum) }}" class="btn btn-primary mt-3 ml-2">Payer via Stripe</a>
                    </div>


                    </form>




                    </div>


                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>




    @include('user.footer')


    @include('user.script')
    @include('admin.script')



  </body>

</html>
