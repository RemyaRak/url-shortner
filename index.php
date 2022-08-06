<html>
    <head>
        <title>URL Shortner</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    </head>
    <body>

        <center>
            <h1>Enter URL to shorten</h1>
            
            <form >
                <p><input style="width:500px" type="text" id="txturl" required /></p>
                <p>
                    <input type="button" onclick="generate_url();"   value="Generate short url">
                    <input type="button" onclick="clear_field();" value="Clear">
                </p>
                
            </form>
        </center>

        <div style="float:right"><a href="all_urls.php">View generated URL's</a></div>
        <div class="error" style="color: #bd0309;font-weight:600"></div>
        <div id="genurl" style="display:none"><h3>Tiny URL:</h3><a id="tinylink" href='#' target='_blank'><span id="tinyurl"></span></a></div>
    <script>

        function clear_field() {
            $("#txturl").val('');
            $("#genurl").css("display", "none");
            $(".error").html('');
        }

        function generate_url() {
            $.ajax({
                url: "action.php",
                method: "post",
                data: {
                    url: $("#txturl").val()
                },
                success: function( result ) {
                    result = $.parseJSON(result);  
                    
                    if (result.status == 1) {
                        $(".error").html('');
                        $("#genurl").css("display", "block");
                        $("#tinyurl").html(result.url);
                        $(".tinylink").attr("href", result.url);
                    } else {
                        clear_field();
                        $(".error").html(result.Message);
                       
                    }
                    
                }
            });

        }
   
    </script>

    </body>
</html>