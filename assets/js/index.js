(function($){    
    $("#form").submit(function(ev){
        $('#wait').attr('hidden', false);  
        $('#myDiv').attr('hidden', true);  
        ev.preventDefault();
        $.ajax({
            url: "index/getData/"+$("#select1").val(),
            type: 'POST',
            success: function(data){
                $('#wait').attr('hidden', true);  
                $('#myDiv').attr('hidden', false);  
                var json = JSON.parse(data)
                console.log(json);
                function unpack(rows, key) {
                    return rows.map(function(row) { return row[key]; });
                }
        
                var trace1 = {
                type: "scatter",
                mode: "lines",
                name: 'AAPL High',
                x: unpack(json.serie, 'fecha'),
                y: unpack(json.serie, 'valor'),
                line: {color: '#17BECF'}
                }
        
                var data = [trace1];
        
                var layout = {
                title: 'Grafico de "'+json.nombre+'"',
                };
        
                Plotly.newPlot('myDiv', data, layout);
            },
            error: function(){
                console.log("Error")
           },
        });
        
    });
})(jQuery)