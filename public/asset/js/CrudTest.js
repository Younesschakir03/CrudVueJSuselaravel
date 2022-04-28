  url = "/";
  var app = new Vue({
    el: '#body',
    data: {
      message: url,
      test: [],
      open: false,
      Tests: {
        id: 0,
        title: '',
        body: '',
      },
      edit: false,
    },

    methods: {
      getTest: function() {

        axios.get(url + 'getcont')
          .then(resposne => {
            this.test = resposne.data;
          }).catch(error => {
            console.log("error:", error);
          })
      },
      // add
      addtest: function() {
        axios.post(url + 'addcont', this.Tests)
          .then(resposne => {
            this.Tests.id = resposne.data.id;
            if (resposne.data.etat) {
              this.open = false;
              this.test.unshift(this.Tests);
              this.Tests = {
                title: '',
                body: ''
              }

            } else {
              
            }
          })
          .catch(error => {
              Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'حدث مشكل أثناء عملية الإضافة',
            showConfirmButton:false,
            timer: 1200,
            });
          });
      },
      // edite
      editTest: function(Test) {
        this.open = true;
        this.edit = true;
        this.Tests = Test;


      },
      // update
      updateTest:function() {
                Swal.fire({
        title: 'Are you sure update?',
        text: "You won't be able to revert this update!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
        if (result.isConfirmed) {
        axios.put(url + 'updatecont', this.Tests)
          .then(resposne => {
            if (resposne.data.etat) {
              this.open = false;
              this.Tests = {
                title: '',
                body: ''
              }
            }
               Swal.fire({
         position: 'center',
      
        icon: 'success',
        title: 'Update.',
        text: "You won't be able to revert this update!",
        showConfirmButton:false,
        timer: 1500,

          });
            // alert(resposne.data);
          })
          .catch(error => {
               Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'update is filde',
            showConfirmButton:false,
            timer: 1200,
            });
          });
        }
        else{
            this.Tests.roolback(Tests);
        }
});
      

      
      },
      // delete
      deletTest: function(Tests) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
           Swal.fire({
         position: 'center',
        icon: 'success',
        title: 'Delete',
        text: "You won't be able to revert this delete!",
        showConfirmButton:false,
        timer: 1500,

          });
            axios.delete(url + 'deletecont/' + Tests.id)
              .then(resposne => {
                if (resposne.data.etat) {
                  // pos=this.test.indexOf(Tests);
                  this.test.splice(this.test.indexOf(Tests), 1);

                }
              })
              .catch(error => {
                   Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'delete is filde',
            showConfirmButton:false,
            timer: 1200,
            });
              });
          }
        })

      }

    },

    mounted: function() {
      this.getTest();
    }

  });
 