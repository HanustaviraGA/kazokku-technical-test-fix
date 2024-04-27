<script type="text/javascript">
    $(document).ready(function() {
        init();
    });

    function init() {
        var t, e, i;
        t = document.querySelector("#kt_sign_in_form");
        e = document.querySelector("#kt_sign_in_submit");
        i = FormValidation.formValidation(t, {
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: "Email address is required",
                        },
                        emailAddress: {
                            message: "The value is not a valid email address",
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: "The password is required",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                }),
            },
        });

        e.addEventListener("click", function (n) {
            n.preventDefault();
            i.validate().then(function (i) {
                if ("Valid" == i) {
                    e.setAttribute("data-kt-indicator", "on");
                    e.disabled = true;
                    // setTimeout(function () {
                    // }, 2000);
                    e.removeAttribute("data-kt-indicator");
                    e.disabled = false;

                    $.ajax({
                        type: "POST",
                        url: "{{ route('login_aksi') }}",
                        data: {
                            email: t.querySelector('[name="email"]').value,
                            password: t.querySelector('[name="password"]').value,
                        },
                        success: function (data) {
                            // Swal.fire({
                            //     text: "You have successfully logged in!",
                            //     icon: "success",
                            //     buttonsStyling: false,
                            //     confirmButtonText: "Tutup",
                            //     customClass: {
                            //         confirmButton: "btn btn-primary",
                            //     },
                            // }).then(function (e) {
                            //     t.querySelector('[name="email"]').value = "";
                            //     t.querySelector('[name="password"]').value = "";
                            //     redirect_url();
                            // });
                            t.querySelector('[name="email"]').value = "";
                            t.querySelector('[name="password"]').value = "";
                            redirect_url();
                        },
                        error: function (data) {
                            // Swal.fire({
                            //     text: "Silakan periksa kembali inputan anda.",
                            //     icon: "error",
                            //     buttonsStyling: false,
                            //     confirmButtonText: "Tutup",
                            //     customClass: {
                            //         confirmButton: "btn btn-primary",
                            //     },
                            // });
                            $.confirm({
                                title: 'Gagal',
                                content: 'Silakan periksa kembali inputan anda.',
                                theme: 'material',
                                type: 'red',
                                buttons: {
                                    ok: {
                                        text: "ok!",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        // action: function () {
                                        //     config.callback(true);
                                        // }
                                    }
                                }
                            });
                        },

                    });
                } else {
                    // Swal.fire({
                    //     text: "Silakan periksa kembali inputan anda.",
                    //     icon: "error",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Tutup",
                    //     customClass: {
                    //         confirmButton: "btn btn-primary",
                    //     },
                    // });
                    $.confirm({
                        title: 'Gagal',
                        content: 'Silakan periksa kembali inputan anda.',
                        theme: 'material',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "ok!",
                                btnClass: 'btn-primary',
                                keys: ['enter'],
                                // action: function () {
                                //     config.callback(true);
                                // }
                            }
                        }
                    });
                }
            });
        });
    }

    function redirect_url(){
        var currentURL = window.location.href;
        window.location.href = currentURL;
    }
</script>
