<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

  <title>Laravel</title>

 {{-- <script type="text/javascript" src="{{asset('asset/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"></script> --}}


  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->

</head>

<body class="container">

    <div id="body">
      <p class=" overflow-hidden mt-2">
        <button class="btn btn-outline-primary" v-on:click="open=true;edit=false;Tests={title:'',body:''}">Add</button>
      </p>
      <div class="border border-danger" v-if="open">
        <div class="m-5">
          <div class="form-group mt-2">
            <label>Title</label>
            <input type="text" name="title"  id="title" class="form-control border border-dark" placeholder="title" v-model='Tests.title'  >
            {{-- <span v-show="errors.has('title')">jhjh</span> --}}
          </div>
          <div class="form-group mt-2">
            <label>body</label>
            <textarea name="body" id="bodyf" class="form-control border border-dark" placeholder="body" v-model='Tests.body' required></textarea>
          </div>
          <div class="mt-2 " dir="rtl">

            <input type="submit" v-if='edit' name="" id="" class="btn btn-info " v-on:click="updateTest" value="Edite">
            <input type="submit" v-else name="" id="" class="btn btn-primary " v-on:click="addtest" value="Add">
            <input type="button" name="" id="" class="btn btn-secondary " v-on:click="open=false" value="close">
          </div>
        </div>
      </div>
      <div class='row'>
        <div class="col-4 mt-2 " v-for="item in test">
          <div class="card alert-info  h-100">
            <div class="card-body">
              <h5 class="card-title"> @{{item.title}}</h5>
              <p class="card-text "> @{{item.body}}</p>
              <span class="float-right">🕓{{date("Y-m-d")}}</span>
              <input type="submit" href="#" class="btn btn-danger" v-on:click='deletTest(item)' value="🗑">
              <button href="#" class="btn btn-success " v-on:click='editTest(item)'>📝</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript" src="{{asset('asset/js/jquery.min.js')}} "></script>
<script type="text/javascript" src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/cdnjs/VeeValidate.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/unpkg/axios.min.js')}}"></script>
<script type="text/javascript">
      Vue.use(VeeValidate);
</script>
<script src="{{asset('asset/js/CrudTest.js')}}"></script>
</html>