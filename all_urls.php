<?php
include_once('model.php');
$obj = new Model;

if ($data = $obj->get_all_urls()) {
    ?>
    <html>
        <head>
        <title>URL Shortner</title>
            <style>
                th {background-color: #f7f7f7;color: #bd0309;font-weight:bold}
                tr:nth-child(even) {background-color: #f2f2f2;}
                tr:hover {background-color: #cbb5b5;}
                th, td {border: 1px solid #100f0f;}
                table {width:100%; border-collapse: collapse;}
                .sh-right {float:right}
            </style>
        </head>
    <body>

        <center>
            <h1>Shorten URLs</h1>
            <div class="sh-right"><a href="index.php">Back To Home</a></div>
            <table>
            <thead>
               <tr><th>Sl No</th><th>URL</th><th>Short URL</th></tr>
            </thead>
            <?php
                $i = 1;
                while($row = mysqli_fetch_assoc($data)) {
                    $url = $obj->buid_shorturl($row['short_url']);
                    echo "<tr><td>".$i++."</td><td>".$row['url']."</td><td><a href='".$url."' target='_blank'>".$url."</a></td></tr>";
                }
            ?>    
            </table>
        </center>

    </body>
    </html>    
<?php  
} else {
    echo "No data found";
}
?>