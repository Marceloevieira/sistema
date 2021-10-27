jQuery(function($) {

    function Product() {
        var _                  = this;
        _.API                  = $('meta[name="app-url"]').attr('content');  
        _.activeComplementType = ['4', '5', '6'];
        _.aSelect2             = []; 

        _.aSelect2.push({ field : 'type_id'     , pathname : '/api/type-of-product/search' });
        _.aSelect2.push({ field : 'group_id'    , pathname : '/api/product-group/search' });
        _.aSelect2.push({ field : 'um_id'       , pathname : '/api/unit-of-measure/search' });
        _.aSelect2.push({ field : 'um2_id'      , pathname : '/api/unit-of-measure/search' });
        _.aSelect2.push({ field : 'warehouse_id', pathname : '/api/Warehouse/search' }); 


        //Events
        $.each(_.aSelect2, function(index, value) {

            $("#"+value.field ).select2({
              theme: "bootstrap",
              placeholder: 'Selecione',
              ajax: {
                url: _.API+value.pathname,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                  return {
                    results:  $.map(data, function (item) {
                          return {
                              text: item.description,
                              id: item.id
                          }
                      })
                  };
                },
                cache: true
              }
            });
        });
  
        $.ajaxSetup({
          headers:{
            'Accept' : "application/json",
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 


    };
  



    new Product();
});