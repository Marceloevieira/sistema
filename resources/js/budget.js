jQuery(function($) {

    function Budget() {
        var _                  = this;
        _.API                  = $('meta[name="app-url"]').attr('content');  
        _.activeComplementType = ['4', '5', '6'];
         _.aSelect2             = []; 

        _.aSelect2.push({ field : 'client_id'           , pathname : '/api/client/search' });
        _.aSelect2.push({ field : 'payment_condition_id', pathname : '/api/payment-condition/search' });
        _.aSelect2.push({ field : 'product_id[]'        , pathname : '/api/product/search' });

        //Events
        $("#btn-add-produtions-itens").on("click", function(e){
        	e.preventDefault();

        	if(!$(this).is( ":disabled" )) {
        		$(this).attr("disabled", true);
        	 	_.addRowProduct(this);
        	}        	
        });

        $(document).on("click", "[name=btn-delete-produtions-itens]", function(e){
            e.preventDefault();
            _.removeRowProduct(this);           
        });

        $(document).on("change", ".input_calc", function(e){
            e.preventDefault();

            _.calcRowProduct(this);
           
        });



        $.ajaxSetup({
          headers:{
            'Accept' : "application/json",
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 

        //Events
        $.each(_.aSelect2, function(index, value) {

            $("select[name='"+value.field+"']" ).select2({
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
 
    };

    Budget.prototype.addRowProduct =  function(el) {

        var _                 =  this;
        var trTotal           = $(document).find("#produtions-itens tbody tr:last").data('row');
        var nRows             = (isNaN(trTotal)) ? 0 : (trTotal + 1);
        _.API                  = $('meta[name="app-url"]').attr('content');    
     

        $(document).find("select[name='product_id[]']").select2('destroy');

        html = '<tr data-row="'+nRows+'" >'+$(document).find("#produtions-itens tbody tr:last")[0].innerHTML.replace( /\[(\w+)\]/gm ,'['+nRows+']')+'</tr>';	

		    $(document).find("#produtions-itens tbody").append(html);	

        $("select[name='product_id[]']" ).select2({
          theme: "bootstrap",
          placeholder: 'Selecione',
          ajax: {
            url: _.API+'/api/product/search',
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

        //Atribui os valores calculados aos  campos
        $(document).find("select[name='product_id[]']").last().val('').trigger('change');
        $(document).find("input[name='amount[]']").last().val(0);
        $(document).find("input[name='unitary_value[]']").last().val(0);
        $(document).find("input[name='discount[]']").last().val(0);
        $(document).find("input[name='total_value[]']").last().val(0);
        $(document).find("input[name='deleted[]']").last().val('');
        $(document).find("input[name='id[]']").last().val('');
        
        $(document).find(el).attr("disabled", false);

    };


    Budget.prototype.removeRowProduct =  function(el) {
        var _  = this;

    	if($("#produtions-itens tbody tr").length > 1) {
           _tr =  $(document).find(el).parent('td').parent('tr');
           $(_tr).css("display","none");
          _Row =  $(_tr).data('row');
          $(document).find("input[name='deleted[]']").eq(_Row).val('*'); 
    	}    	
    };



    Budget.prototype.calcRowProduct =  function(el) {
        var _               =  this,
        nValueDiscount      = 0.00,
        nPercentageDiscount = 0.00,
        trRow               = $(document).find(el).closest('tr'),
        rowId               = $(document).find(trRow).data('row'),
        nAmount             = $(document).find("input[name='amount[]']").eq(rowId).val(),
        nUnitary_value      = $(document).find("input[name='unitary_value[]']").eq(rowId).val(),
        nTotal_value        = $(document).find("input[name='total_value[]']").eq(rowId).val(),
        nDiscount           = $(document).find("input[name='discount[]']").eq(rowId).val();

        

        //Atribui os valores as variaveis padrão
        nAmount         = (!nAmount)        ? 0.00 : nAmount;
        nUnitary_value  = (!nUnitary_value) ? 0.00 : nUnitary_value;
        nTotal_value    = (!nTotal_value)   ? 0.00 : nTotal_value;
        nDiscount       = (!nDiscount)      ? 0.00 : nDiscount;

        //Converte todas as variaveis para string
        nAmount        = nAmount.toString();
        nUnitary_value = nUnitary_value.toString();
        nTotal_value   = nTotal_value.toString();
        nDiscount      = nDiscount.toString();

        //Formata todas as variaveis
        nAmount        = nAmount.replace('.','');
        nUnitary_value = nUnitary_value.replace('.','');
        nTotal_value   = nTotal_value.replace('.','');
        nDiscount      = nDiscount.replace('.','');

        nAmount        = nAmount.replace(',','.');
        nUnitary_value = nUnitary_value.replace(',','.');
        nTotal_value   = nTotal_value.replace(',','.');
        nDiscount      = nDiscount.replace(',','.');

        //Transformas todas as variaveis em float
        nAmount        = parseFloat(nAmount);
        nUnitary_value = parseFloat(nUnitary_value);
        nTotal_value   = parseFloat(nTotal_value);
        nDiscount      = parseFloat(nDiscount);

        //Calcula o valor unitario x quantidade
        nTotal_value     = (nAmount * nUnitary_value);               

        nDiscount     = nDiscount.toFixed(2);
        nTotal_value     = nTotal_value.toFixed(2);
       
      


        //Verifica se o valor do desconto é maior que o item
        if(parseFloat(nDiscount) > parseFloat(nTotal_value)) {
            nDiscount      = 0;
            $(document).find(trRow).find("input[name='discount[]']").eq(rowId).val('');
        }

        //Aplica o Desconto    
        nTotal_value -= nDiscount;    

        nAmount        = parseFloat(nAmount);
        nUnitary_value = parseFloat(nUnitary_value);
        nDiscount      = parseFloat(nDiscount);
        nTotal_value   = parseFloat(nTotal_value);

        //Formata as casas decimais
        nAmount        = nAmount.toFixed(2);
        nUnitary_value = nUnitary_value.toFixed(2);
        nDiscount      = nDiscount.toFixed(2);
        nTotal_value   = nTotal_value.toFixed(2);

        //Converte novamente para string os valores das variaveis 
        nAmount        = nAmount.toString();
        nUnitary_value = nUnitary_value.toString();
        nDiscount      = nDiscount.toString();
        nTotal_value   = nTotal_value.toString();


        //Formata os valores das variaveis
        nAmount        = nAmount.replace('.',',');
        nUnitary_value = nUnitary_value.replace('.',',');
        nDiscount      = nDiscount.replace('.',',');
        nTotal_value   = nTotal_value.replace('.',',');


        //Atribui os valores calculados aos  campos
        $(document).find("input[name='amount[]']").eq(rowId).val(nAmount);
        $(document).find("input[name='unitary_value[]']").eq(rowId).val(nUnitary_value);
        $(document).find("input[name='discount[]']").eq(rowId).val(nDiscount);
        $(document).find("input[name='total_value[]']").eq(rowId).val(nTotal_value);


  
    };


    new Budget();
});