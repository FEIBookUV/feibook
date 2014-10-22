<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/activityStats/vendors/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/activityStats/vendors/protovis.min.js"></script>
<link rel="stylesheet" href="<?php echo $vars['url']; ?>mod/activityStats/vendors/css/blitzer/jquery-ui-1.8.14.custom.css" type="text/css" media="all">
<style type="text/css">

    #mode-select-buttons .selected {
        border:2px solid gray;
    }
    #histogram1 {
        width: 680px;
        height: 300px;
        display:block;
        padding:5px;
        margin:5px;
    }
    #histogram2 {
        width: 680px;
        height: 300px;
        display:block;
        padding:5px;
        margin:5px;
    }

    #activity-stats-header {
        background: #E4E4E4;
        color: #333;
        font-size: 1.1em;
        line-height: 1em;
        margin: 0 0 10px 0;
        padding: 5px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
    }

</style>
<div>


    <p></p>

    <p id="mode-select-buttons">
        <input id="last_week_button" name="" type="button" class="submit_button" value="last week"></input>
        <input id="last_month_button" name="" type="button" class="submit_button" value="last month"></input>
        <input id="all_time_button" name="" type="button" class="submit_button selected" value="all time"></input>        
    </p>
    <p><a id="export-link">Export to .csv</a></p>

    <script>
        
        
        
        $('#export-link').click(function(){
            tabSelected = $('#tabs').tabs('option', 'selected');
            modeid = $('#mode-select-buttons input.selected').attr('id');
            mode = 'all';
            switch (modeid){
                case 'last_week_button':
                    mode='week';
                    break;
                case 'last_month_button':
                    mode='month';
                    break;
                case 'all_time_button':
                    mode='all';
                    break;                       
            }            
            window.open('<?php echo $vars['url']; ?>pg/activityStats/pages/export?mode='+mode+'&type='+tabSelected,'export window');
            return false;
        });
        
        $('#last_week_button').click(function(){
            $('#mode-select-buttons input').removeClass('selected');
            $(this).addClass('selected');
            index = $('#tabs').tabs('option', 'selected');
            refreshData(index);
        });
    
        $('#last_month_button').click(function(){
            $('#mode-select-buttons input').removeClass('selected');
            $(this).addClass('selected');      
            index = $('#tabs').tabs('option', 'selected');
            refreshData(index);
        });
        
        $('#all_time_button').click(function(){
            $('#mode-select-buttons input').removeClass('selected');
            $(this).addClass('selected');            
            index = $('#tabs').tabs('option', 'selected');
            refreshData(index);
        });
        
        $('#last_week_button').click();//first time loading - execute once
    
    
        function refreshData(index){
            input_mode = $('#mode-select-buttons .selected').val();
            mode = "";
            switch (input_mode){
                case 'last week':
                    mode = "week";
                    break;
                case 'last month':
                    mode = "month";
                    break;
                case 'all time':
                    mode = "all";
                    break;
            }
            tabSelected = index;
            $.ajax({
                url : '<?php echo $vars['url']; ?>/pg/activityStats/ajax/?mode='+mode+'&type='+tabSelected,        
                type: 'get',
                dataType: 'json',
                success:function(m){
                    if ($('#tabs').tabs('option', 'selected')==0){
                        $('#histogram1').html("");                    
                        if (m['total_results']==0){
                            $('#histogram1').html("No activity recorded"); 
                        }else {
                            //console.log('#histogram1 before h='+$('#histogram1').height());
                            $('#tabs-1').height(12*m['total_results']+200);
                            //console.log('#histogram1 after  h='+$('#histogram1').height());
                            rerender(m);
                        }
                    }else if ($('#tabs').tabs('option', 'selected')==1){
                        $('#histogram2').html("");                    
                        if (m['total_results']==0){
                            $('#histogram2').html("No activity recorded"); 
                        }else {
                            $('#tabs-2').height(12*m['total_results']+200);
                            rerender2(m);
                        }
                    }
                },
                error:function(a,b,c){
                    ////console.log('error:'+a+" "+b+" "+c);
                },
                complete:function(){
                    ////console.log('complete');
                }
            });
        }
    
    </script>

    <script type="text/javascript+protovis">


        function rerender(data){     

        //console.log('rerendering 1');

        var freq = data["freq"];
        var labels = data["labels"];

        height = 12*data['total_results']+150;

        //console.log(height);

        /* Sizing and scales. */
        var w = 700,
        h = height,
        x = pv.Scale.linear(0, freq[0]+150).range(0, w),
        y = pv.Scale.ordinal(pv.range(data['total_results'])).splitBanded(0,12*data['total_results']+150,0.75);

        /* The root panel. */
        var vis = new pv.Panel()
        .canvas('histogram1')
        .width(w)
        .height(h+50)
        .bottom(10)
        .left(20)
        .right(10)
        .top(5);

        /* The bars. */
        var bar = vis.add(pv.Bar)
        .data(freq).top(function() y(this.index))
        .height(y.range().band)
        .left(160)
        .width(x);


        /* The value label. */
        bar.anchor("right").add(pv.Label)
        .textStyle("white")
        .text(function(d) d.toFixed(0));

        /* The variable label. */
        bar.anchor("left").add(pv.Label)
        //.textMargin(55)
        .textAlign("right")
        //.right(155)
        .text(function() {
        return labels[this.index];
        });

        /* X-axis ticks. */
        vis.add(pv.Rule)
        .data(x.ticks(5))
        .left(x)
        .strokeStyle(function(d) d ? "rgba(255,255,255,.3)" : "#000")
        .add(pv.Rule)
        .bottom(0)
        .height(5)
        .strokeStyle("#000")
        .anchor("bottom").add(pv.Label)
        .text(x.tickFormat);

        vis.render();


        $('#histogram1').css('height',''+data['total_results']+'px');


        }







        function rerender2(data){    

        //       console.log(data);
        //        console.log('rerendering 2');
        ////console.log(data);
        var freq = data["freq"];
        var labels = data["labels"];

        //console.log(freq);     
        //console.log(labels);   

        height = 12*data['total_results']+150;
        //console.log('rerendering2');
       /* Sizing and scales. */
        var w = 500,
        h = height,
        x = pv.Scale.linear(0, freq[0]).range(0, w),
        y = pv.Scale.ordinal(pv.range(data['total_results'])).splitBanded(0,12*data['total_results']+150,0.75);

        
        //console.log(x);

        /* The root panel. */
        var vis = new pv.Panel()
        .canvas('histogram2')
        .width(w+200)
        .height(h)
        .bottom(10)
        .left(20)
        .right(10)
        .top(5);

        /* The bars. */
        var bar = vis.add(pv.Bar)
        .data(freq).top(function() y(this.index))
        .height(y.range().band)
        .left(160)
        .width(x);

        /* The value label. */
        bar.anchor("right").add(pv.Label)
        .textStyle("white")
        .text(function(d) d.toFixed(0));

        /* The variable label. */
        bar.anchor("left").add(pv.Label)
        //.textMargin(55)
        .textAlign("right")
        //.right(15)
        .text(function() {
            return labels[this.index];
        });

        /* X-axis ticks. */
        vis.add(pv.Rule)
        .data(x.ticks(5))
        .left(x)
        .strokeStyle(function(d) d ? "rgba(255,255,255,.3)" : "#000")
        .add(pv.Rule)
        .bottom(0)
        .height(5)
        .strokeStyle("#000")
        .anchor("bottom").add(pv.Label)
        .text(x.tickFormat);

        vis.render();

        $('#histogram2').css('height',''+data['total_results']+'px');

        }

    </script>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Individual activity</a></li>
            <li><a href="#tabs-2">Friends activity</a></li>		
        </ul>
        <div id="tabs-1">
            <div id="histogram1"></div>
        </div>
        <div id="tabs-2">
            <div id="histogram2"></div>
        </div>	
    </div>

    <script>
        $(function() {
            $tabs = $( "#tabs" ).tabs();
            $tabs.bind('tabsselect', function(event, ui) {                     
                refreshData(ui.index);
            });            
        });
    </script>

</div>
