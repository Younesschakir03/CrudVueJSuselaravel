url = "/";
var app = new Vue({
    el: "#body",
    page: 1,
    data: {
        message: url,
        test: [],
        cont: 0,
        open: false,
        Tests: {
            id: 0,
            title: "",
            body: "",
        },
        edit: false,
    },

    methods: {
        // getTest: function () {
        //     axios
        //         .get(`${url}getcont`)
        //         .then((resposne) => {
        //             this.test = resposne.data;
        //         })
        //         .catch((error) => {
        //             console.log("error:", error);
        //         });
        // },
        pagination: function (page) {
            axios
                .get(`${url}getcont?page=` + page)
                .then((resposne) => {
                    cont = 0;
                    if (
                        resposne.data["last_page"] >=
                        resposne.data["current_page"]
                    ) {
                        $("#next").removeAttr("disabled style");
                        this.test = resposne.data;
                    } else {
                        $("#next").attr({
                            disabled: "disabled",
                            style: "background-color:#20262c;cursor: not-allowed;",
                        });

                        return false;
                    }
                })
                .catch((error) => {
                    console.log("error:", error);
                });
        },
        // add
        addtest: function () {
            axios
                .post(url + "addcont", this.Tests)
                .then((resposne) => {
                    this.Tests.id = resposne.data.id;
                    if (resposne.data.etat) {
                        this.open = false;
                        this.test.data.unshift(this.Tests);
                        this.Tests = {
                            title: "",
                            body: "",
                        };
                    } else {
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        position: "top",
                        icon: "error",
                        title: "حدث مشكل أثناء عملية الإضافة",
                        showConfirmButton: false,
                        timer: 1200,
                    });
                });
        },
        // edite
        editTest: function (Test) {
            this.open = true;
            this.edit = true;
            this.Tests = Test;
        },
        // update
        updateTest: function () {
            Swal.fire({
                title: "Are you sure update?",
                text: "You won't be able to revert this update!",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Update it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .put(url + "updatecont", this.Tests)
                        .then((resposne) => {
                            if (resposne.data.etat) {
                                this.open = false;
                                this.Tests = {
                                    title: "",
                                    body: "",
                                };
                            }
                            Swal.fire({
                                position: "center",

                                icon: "success",
                                title: "Update.",
                                text: "You won't be able to revert this update!",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            // alert(resposne.data);
                        })
                        .catch((error) => {
                            Swal.fire({
                                position: "top",
                                icon: "error",
                                title: "update is filde",
                                showConfirmButton: false,
                                timer: 1200,
                            });
                        });
                } else {
                    this.Tests.roolback(Tests);
                }
            });
        },
        // delete
        deletTest: function (Tests) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Delete",
                        text: "You won't be able to revert this delete!",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    axios
                        .delete(url + "deletecont/" + Tests.id)
                        .then((resposne) => {
                            if (resposne.data.etat) {
                                pos=this.test.data.indexOf(Tests);
                                // console.log(this.test.indexOf(Tests));
                                this.test.data.splice(pos, 1);
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                position: "top",
                                icon: "error",
                                title: "delete is filde",
                                showConfirmButton: false,
                                timer: 1200,
                            });
                            // alert("test");
                        });
                }
            });
        },
    },

    mounted: function () {
        this.pagination(0);
    },
});
