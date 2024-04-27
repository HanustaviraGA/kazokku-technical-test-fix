<script type="text/javascript">
    $(document).ready(function() {

        let searchDelay;
        let $searchInput = $('#customSearchInput');
        // Bind keyup event to custom search input with a delay
        $searchInput.keyup(function() {
            clearTimeout(searchDelay);
            let searchText = $searchInput.val();
            searchDelay = setTimeout(function() {
                table.search(searchText).draw();
            }, 300); // Adjust the delay time (in milliseconds) as needed
        });

        let searchDelayDetail;
        let $searchInputDetail = $('#customSearchInputDetail');
        // Bind keyup event to custom search input with a delay
        $searchInputDetail.keyup(function() {
            clearTimeout(searchDelayDetail);
            let searchTextDetail = $searchInputDetail.val();
            searchDelayDetail = setTimeout(function() {
                table.search(searchTextDetail).draw();
            }, 300); // Adjust the delay time (in milliseconds) as needed
        });

        init_table();
    });

    function init_table() {
        if ($.fn.DataTable.isDataTable('#tableExchange')) {
			$('#tableExchange').DataTable().destroy();
		}
        let roles = (SUPER.get_role_access('userupdate') || SUPER.get_role_access('userdelete'));
        table = $('#tableExchange').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            pageLength: 10,
            // select: 'single',
            ajax: {
                url: '{{ route('exchange.init_table') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function (d) {
                    d.search.value = $('#customSearchInput').val();
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 419 || xhr.status === 401) {
                        SUPER.showMessage({
                            success: false,
                            message: 'Sesi telah berakhir',
                            title: 'Gagal'
                        });
                        setLogout();
                    } else {
                        // Handle other error cases
                        // For example, you can display an error message to the user
                        console.error(error);
                    }
                }
            },
            columns: [
                {
                    data: 'no',
                    name: 'no',
                    orderable: true,
                },
                {
                    data: 'timestamp',
                    name: 'timestamp',
                    orderable: true,
                },
                {
                    data: 'base',
                    name: 'base',
                    orderable: true,
                },
                {
                    data: null,
                    name: 'created_at',
                    orderable: true,
                    render: function (data, type, full, meta) {
                        return SUPER.formatDate(full.created_at);
                    }
                },
                {
                    data: null,
                    orderable: false,
                    visible: true,
                    render: function (data, type, full, meta) {
                        var btn_aksi = '';

                        // if(SUPER.get_role_access('userupdate')){
                        //     btn_aksi += `<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md mr-2" title="Edit" onclick="onEdit(this)" data-id="` + full.id + `">
                        //         <i class="la la-edit"></i> Edit
                        //     </a>`;
                        // }

                        // if(SUPER.get_role_access('userdelete')){
                        //     btn_aksi += `<a href="javascript:;" class="btn ml-3 btn-sm btn-clean btn-icon btn-icon-md kt-font-bold kt-font-danger" onclick="onDestroy(this)" data-id="` + full.id + `" title="Hapus" >
                        //         <span class="la la-trash"></span> Hapus
                        //     </a>`;
                        // }

                        btn_aksi += `<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md mr-2" title="Detail" onclick="onDetail(this)" data-id="` + data.id_exchange + `">
                            <i class="la la-edit"></i> Detail
                        </a>`;

                        // btn_aksi += `<a href="javascript:;" style="margin-left: 25px" class="btn ml-5 btn-sm btn-clean btn-icon btn-icon-md kt-font-bold kt-font-danger" onclick="onDestroy(this)" data-id="` + data.id_exchange + `" title="Hapus" >
                        //     <span class="la la-trash"></span> Hapus
                        // </a>`;

                        return btn_aksi;
                    }
                }
            ],
            // fnDrawCallback: function(oSettings) {
            //     var cnt = 0;
            //     $("tr", this).css('cursor', 'pointer');
            //     $("tbody tr", this).each(function(i, v) {
            //         $(v).on('click', function() {
            //             if ($(this).hasClass('selected')) {
            //                 --cnt;
            //                 $(v).removeClass('selected');
            //                 $(v).removeAttr('checked');
            //                 $('input[name=checkbox]', v).prop('checked', false);
            //                 $(v).removeClass('row_selected');
            //             } else {
            //                 ++cnt;
            //                 $('input[name=checkbox]', v).prop('checked', true);
            //                 $('input[name=checkbox]', v).data('checked', 'aja');
            //                 $(v).addClass('selected');
            //                 $(v).addClass('row_selected asli');
            //             }

            //             if (cnt > 0) {
            //                 $('.disable').attr('disabled', false);
            //             } else {
            //                 $('.disable').attr('disabled', true);
            //             }
            //         });
            //     });
            // },
        });
    }

    function init_table_detail(id) {
        if ($.fn.DataTable.isDataTable('#tableExchangeDetail')) {
			$('#tableExchangeDetail').DataTable().destroy();
		}
        let roles = (SUPER.get_role_access('userupdate') || SUPER.get_role_access('userdelete'));
        table = $('#tableExchangeDetail').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            pageLength: 10,
            // select: 'single',
            ajax: {
                url: '{{ route('exchange.init_table_detail') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function (d) {
                    d.id_exchange = id;
                    d.search.value = $('#customSearchInputDetail').val();
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 419 || xhr.status === 401) {
                        SUPER.showMessage({
                            success: false,
                            message: 'Sesi telah berakhir',
                            title: 'Gagal'
                        });
                        setLogout();
                    } else {
                        // Handle other error cases
                        // For example, you can display an error message to the user
                        console.error(error);
                    }
                }
            },
            columns: [
                {
                    data: 'no',
                    name: 'no',
                    orderable: true,
                },
                {
                    data: 'currency_name',
                    name: 'currency_name',
                    orderable: true,
                },
                {
                    data: 'exchange_rate',
                    name: 'exchange_rate',
                    orderable: true,
                },
            ],
        });
    }

    function onDetail(element){
        var id = $(element).data('id');
        blockPage();
        $.ajax({
            url: '{{ route('exchange.read') }}',
            type: 'POST',
            data:{
                id_exchange: id
            },
            headers:{
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    init_table_detail(id);
                    $('#title-detail-exchange').html('Detail Exchange - ' + SUPER.formatDate(response.parent.created_at));
                    SUPER.switchForm({
                        tohide: 'table_data',
                        toshow: 'table_data_detail'
                    });
                    unblockPage(500);
                }else{
                    unblockPage(500);
                    SUPER.showMessage();
                }
            },
            error: function(error) {
                unblockPage(500);
                console.error(error);
                SUPER.showMessage();
            }
        });
    }

    function onBack(){
        blockPage();
        SUPER.switchForm({
			tohide: 'table_data_detail',
			toshow: 'table_data'
		});
        init_table();
        unblockPage();
    }

    function onSave(form){
        SUPER.saveForm({
            element: form,
            checker: 'id_event',
            add_route: '',
            update_route: '',
            onBack: true,
            // reInitTable: true,
        });
    }

    function onDestroy(element){
        var id = $(element).data('id');
        SUPER.confirm({
			message: "Apa Anda yakin ingin menghapus data ini?",
			callback: (result) => {
				if (result) {
                    $.ajax({
                        url: '',
                        type: 'DELETE',
                        headers:{
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            'id_event': id
                        },
                        success: function(response) {
                            if(response.success) {
                                SUPER.showMessage({
                                    success: true,
                                    message: 'Berhasil melakukan penghapusan data',
                                    title: 'Berhasil'
                                });
                            }else{
                                SUPER.showMessage();
                            }
                            init_table();
                        }
                    });
                }
			}
		});
    }

    function onSync(){
        SUPER.confirm({
			message: "Apa Anda yakin ingin melakukan sinkronisasi data?",
			callback: (result) => {
				if (result) {
                    blockPage();
                    $.ajax({
                        url: '{{ route('exchange.sync') }}',
                        type: 'POST',
                        headers:{
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response.success) {
                                unblockPage(500);
                                SUPER.showMessage({
                                    success: true,
                                    message: 'Berhasil melakukan sinkronisasi data',
                                    title: 'Berhasil'
                                });
                            }else{
                                unblockPage(500);
                                SUPER.showMessage();
                            }
                            init_table();
                        }
                    });
                }
			}
		});
    }

</script>
