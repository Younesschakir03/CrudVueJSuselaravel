@extends('master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
@endsection
@section('content')
    <div id="body">
        <p class=" overflow-hidden mt-2 mb-2">
            <button class="btn btn-outline-primary" v-on:click="open=true;edit=false;Tests={title:'',body:''}">إضافة <i
                    class="xl xy" data-feather="plus"></i>
            </button>
        </p>
        <div class="border border-danger" v-if="open">
            <div class="m-5">
                <div class="form-group mt-2">
                    <label>العنوان</label>
                    <input type="text" name="title" id="title" class="form-control border border-dark"
                        placeholder="ادخل العنوان...." v-model='Tests.title'>
                </div>
                <div class="form-group mt-2">
                    <label>الوصف</label>
                    <textarea name="body" id="bodyf" class="form-control border border-dark" placeholder=" ادخل الوصف" v-model='Tests.body'
                        required></textarea>
                </div>
                <div class="mt-2 ">
                    <input type="submit" v-if='edit' name="" id="" class="btn btn-info " v-on:click="updateTest"
                        value="تعديل">
                    <input type="submit" v-else name="" id="" class="btn btn-primary " v-on:click="addtest" value="إضافة">
                    <input type="button" name="" id="" class="btn btn-secondary " v-on:click="open=false" value="إغلاق">
                </div>
            </div>
        </div>
        <div class="dataTables_wrapper dt-bootstrap5 no-footer" id="dataTableExample_wrapper">

            <div class="row mt-3">
                <div class="col-3">#</div>
                <div class="col-3">عنوان</div>
                <div class="col-3">الوصف</div>
                <div class="col-3">الإعدادات</div>
            </div>
            <div v-if="test['last_page']>=test['current_page']">
                <div class="" v-for="(item,index) in test.data">
                    <hr>

                    <div class="row">
                        <div class="col-3">@{{ index + 1 }}</div>
                        <div class="col-3">@{{ item.title }}</div>
                        <div class="col-3">@{{ item.body }}</div>
                        <div class="col-3">

                            <button class="btn btn-outline-danger" @click='deletTest(item)'>
                                <i class="fa-solid fa-trash-can "></i>
                            </button>
                            <button class="btn btn-outline-info " @click='editTest(item)'>
                                <i class="fa-regular fa-pen-to-square"></i> </button>

                        </div>

                    </div>

                </div>
            </div>

            <nav aria-label="..." class="mt-2">
                <ul class="pagination float-right">
                    <li class="page-item ">

                        <a class="page-link" v-on:click='pagination(test["current_page"]-1)'>السابق</a>

                    </li>
                    <ul class="pagination" v-for='nbpage in test["last_page"]'>
                        <li class="page-item">
                            <a class="page-link" v-on:click='pagination(nbpage)'>@{{ nbpage }}</a>
                        </li>
                    </ul>
                    <li class="page-item">
                        <button class="page-link " id="next"
                            v-on:click='pagination(test["current_page"]+1)'>التالي</button>
                    </li>
                    <li class="m-auto">
                        <span class="page-link">page : @{{ test["current_page"] }}</span>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
@endsection
@section('js')
    {{-- <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> --}}
    <script src="https://kit.fontawesome.com/bf87562ac9.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('asset/sweetalert2/sweetalert2.all.min.js') }}"></script> --}}
    <script src="{{ asset('asset/vue.js') }}"></script>
    <script src="{{ asset('asset/unpkg/axios.min.js') }}"></script>
    <script src="{{ asset('asset/js/CrudTest.js') }}"></script>
    {{-- <script>
        feather.replace();
    </script> --}}
@endsection
