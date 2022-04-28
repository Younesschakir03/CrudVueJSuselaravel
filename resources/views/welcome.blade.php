<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

  <title>Laravel</title>

  <!-- <script type="text/javascript" src="{{asset('asset/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"></script> -->


  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->

</head>

<body class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  <div>
  </nav>

    <div id="body">
      <p class=" overflow-hidden mt-2">
        <button class="btn btn-outline-primary" @click="open=true;edit=false;Tests={title:'',body:''}">Add</button>
      </p>
      <div class="border border-danger" v-if="open">
        <div class="m-5">
          <div class="form-group mt-2">
            <lable>Title</lable>
            <input type="text" name="title" v-validate="'required'" id="title" class="form-control border border-dark" placeholder="title" v-model='Tests.title'  >
            <span v-show="errors.has('title')">jhjh</span>
          </div>
          <div class="form-group mt-2">
            <lable>body</lable>
            <textarea name="body" id="bodyf" class="form-control border border-dark" placeholder="body" v-model='Tests.body' required></textarea>
          </div>
          <div class="mt-2 " dir="rtl">

            <input type="submit" v-if='edit' name="" id="" class="btn btn-info " @click="updateTest" value="Edite">
            <input type="submit" v-else name="" id="" class="btn btn-primary " @click="addtest" value="Add">
            <input type="button" name="" id="" class="btn btn-secondary " @click="open=false" value="close">
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
              <input type="submit" href="#" class="btn btn-danger" @click='deletTest(item)' value="🗑">
              <btntun href="#" class="btn btn-success " @click='editTest(item)'>📝</btntun>
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