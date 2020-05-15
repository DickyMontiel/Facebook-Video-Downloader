<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DickyMontiel</title>
    <link rel="shortcut icon" href="ico.jpg" type="image/x-icon">
    <style>
        *{
            font-family: sans-serif arial;
        }

        body,html{
            height: 100%;
            background: url("img.jpg");
            background-size: 100% 100%;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        input{
            width: 100%;
            font-size: 18px;
            padding: 5px 10px;
        }
        form{
            position: relative;
            top: 180px;
        }

        button, a{
            font-size: 20px;
            padding: 5px 20px;
            background: black;
            color: white;
            border: solid 1px gray;
            margin: 0px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form method="get">
        <center>
            <h1 style="color: white; font-weight: bolder;">Facebook Video Downloader by DickyM</h1>
            <input type="text" name="url" value="<?php if(isset($_GET['url'])){echo $_GET['url'];} ?>">
            <br><br>
            <button type="submit">Obtener URL</button>
            <?php
                if(isset($_GET['url'])){
                    //https://www.facebook.com/AnimesWorld7u7/videos/206426820459935/
                    $url = $_GET['url'];
                    $agente = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36";
            
                    $ch =   curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_USERAGENT, $agente);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    $resultado = curl_exec($ch);
                    if(preg_match_all('/<meta property="og:video" content="(.*)" \/>/', $resultado, $matches)){
                        
                    
                    $mp4 = substr($matches[1][0], 0, strpos($matches[1][0], '" />'));
            
                    echo "<br><br><br><a href='$mp4' target='_blank'>Descargar</a>";
                    }
                }
            ?>
        </center>
    </form>
</body>
</html>